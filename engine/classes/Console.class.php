<?php
session_start();
include 'Main.class.php';

/**
 * Class Console
 */
class Console
{

    /**
     * Console constructor.
     */
    public function __construct()
    {
        $this->engine = new Engine;
    }

    /**
     * @return bool
     */
    public function is_auth()
    {
        if (!$_SESSION['phpmc_id']) return false;
        $query = $this->engine->db->query_result("SELECT `id`, `hash`, `uid` FROM `console_users` WHERE `id` = '" . (int)$_SESSION['phpmc_id'] . "'");
        if ($query == null) return false;

        if (($query->id == $_SESSION['phpmc_id']) AND ($query->uid == $_SESSION['phpmc_uid']) AND ($query->hash == $_SESSION['phpmc_hash'])) return true;

        return false;
    }

    /**
     * @param $url
     */
    public function redirect($url)
    {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
    }

    /**
     * @param $page
     * @return bool
     */
    public function is_perm($page)
    {
        $query = $this->engine->db->query_result("SELECT * FROM `console_access` WHERE `user` = '" . (int)$_SESSION['phpmc_uid'] . "' ORDER BY id DESC");

        if (!isset($query)) return false;
        if ($query->access == "*") {
            return true;
        } else {
            foreach (explode(',', $query->access) as $p) {
                if ($p == $page) {
                    return true;
                }
            }
        }
    }

    /**
     * @return string|null
     */
    public function generate_hash()
    {
        $chars = "qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max = 10;
        $size = StrLen($chars) - 1;
        $hash = null;
        while ($max--) $hash .= $chars[rand(0, $size)];
        return $hash;
    }

    /**
     * @return string
     */
    public function get_buttons()
    {
        if ($this->is_perm("console")) $form .= '<li><a href="/console/"><i class="fa fa-plug"></i> <span>Консоль</span></a></li>';
        if ($this->is_perm("cmd")) $form .= '<li><a href="/console/?page=cmd"><i class="fa fa-list"></i> <span>Лог</span></a></li>';

        return $form;
    }

    /**
     * @param string $user
     * @return mixed
     */
    public function get_nick($user = '')
    {
        if (!$user) $user = (int)$_SESSION['phpmc_uid'];

        $query = $this->engine->db->query_result("SELECT * FROM `console_access` WHERE `user` = '" . (int)$user . "' ORDER BY id DESC");

        return $query->nick;
    }

    /**
     * @param string $user
     * @return array
     */
    public function user($user = '')
    {
        if (!$user) $user = (int)$_SESSION['phpmc_id'];
        $info = $this->engine->db->query_result("SELECT * FROM `console_users` WHERE `id` = '" . (int)$user . "' ORDER BY id DESC");
        return array(
            'id' => $info->id,
            'first_name' => $info->first_name,
            'last_name' => $info->last_name,
            'uid' => $info->uid,
            'nick' => $this->get_nick((int)$info->uid)
        );
    }

    /**
     * @param $cmd
     * @return object|stdClass
     */
    public function get_cmd($cmd)
    {
        return $this->engine->db->query_result("SELECT * FROM `console_cmd` WHERE `cmd` = '" . $this->engine->db->escape($cmd) . "'");
    }

    /**
     * @param $id
     * @return object|stdClass
     */
    public function get_cmd_id($id)
    {
        return $this->engine->db->query_result("SELECT * FROM `console_cmd` WHERE `id` = '" . $id . "'");
    }

    /**
     * @return bool|mysqli_result
     */
    public function get_blocks()
    {
        return $this->engine->db->query("SELECT * FROM `console_block`");
    }

    /**
     * @param $msg
     * @param string $type
     * @return false|string
     */
    public function json_ajax($msg, $type = 'ok')
    {
        return json_encode(array('msg' => $msg, 'type' => ($type == "err") ? 'error' : 'ok'));
    }

    /**
     * @param $cmd
     * @return bool
     */
    public function check_cmd($cmd)
    {
        $array = array();

        $cm = explode(" ", $cmd);
        $blocks = $this->get_blocks();

        foreach ($this->engine->db->query("SELECT * FROM `console_cmd`") as $cmd_query) {
            $array['cmd'] = array();
            $i = 0;
            foreach (explode(" ", $cmd_query['query']) as $q) {
                foreach ($blocks as $n) {
                    if ($n['nick'] == $cm[$i]) return false;
                }
                $array['cmd'][] = str_replace("[argument]", $cm[$i], $q);
                $i++;
            }
            $end = implode(" ", $array['cmd']);
            if ($end == $cmd) return $cmd_query['id'];
        }
        return false;
    }

    /**
     * @param $cmd
     * @return false|string
     */
    public function send_cmd($cmd)
    {
        $cmd = $this->engine->db->escape($cmd);
        $check = $this->check_cmd($cmd);
        if (!$check) return $this->json_ajax("Неизвестная команда или неверные параметры, или запрещенный ник.", "err");
        $get_cmd = $this->get_cmd_id($check);
        if (!$get_cmd) return $this->json_ajax("Неизвестная команда.", "err");
        if ($get_cmd->use != "-1") {
            if (!$this->get_timeout($get_cmd->query, $get_cmd->use)) return $this->json_ajax("Вы исчерпали лимит выполнения за сутки, попробуйте позже.", "err");;
        }
        require_once($_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Rcon.class.php');
        $rcon = new Rcon($this->engine->cfg['console']['server']['ip'], $this->engine->cfg['console']['server']['port'], $this->engine->cfg['console']['server']['password'], 5);
        if (@$rcon->connect()) {
            if ($get_cmd->use != "-1") $this->add_timeout($get_cmd->query, $get_cmd->use);

            $rcon->send_command($cmd);
            $user = $this->user();
            $response = $this->minetext($rcon->get_response());

            $this->engine->db->query("INSERT INTO `console_log`(`fio`, `nick`, `time`, `cmd`, `reply`) VALUES ('{$user['first_name']} {$user['last_name']}', '{$user['nick']}', '" . date("Y-m-d H:i:s") . "', '{$cmd}', '{$this->engine->db->escape($response)}')");

            return $this->json_ajax($response);
        }
        return $this->json_ajax("Увы, сервер недоступен. Попробуйте позднее...", "err");
    }

    /**
     * @return string
     */
    public function get_log()
    {
        foreach ($this->engine->db->query("SELECT * FROM `console_log` ORDER BY id DESC LIMIT 15") as $l) {
            $log .= "<li class=\"list-group-item list-group-item-info\">{$l['fio']} ({$l['nick']}) [" . $this->engine->date($l['time']) . "]<br>Команда: <code>{$l['cmd']}</code><br>Ответ: <em>{$l['reply']}</em></li>";
        }

        return $log;
    }

    /**
     * @return array
     */
    public function commands()
    {
        $array = array();

        foreach ($this->engine->db->query("SELECT * FROM `console_cmd`") as $q) {
            if ($q['use'] == "-1") $uses = "Неограниченно";
            else {
                $use = explode("|", $q['use']);
                $time = ($use[1] == 'month') ? 'месяц' : 'сутки';
                $uses = $use[0] . " раз в " . $time;
            }
            $array[] = array("cmd" => $q['cmd'], "query" => $q['example'], "use" => $uses);
        }

        return $array;
    }

    /**
     * @return array
     */
    public function commands_log()
    {
        $array = array();

        foreach ($this->engine->db->query("SELECT * FROM `console_log`") as $q) {
            $array[] = array("user" => $q['fio'], "nick" => $q['nick'], "time" => $this->engine->date($q['time']), "cmd" => $q['cmd'], "reply" => $q['reply']);
        }

        return $array;
    }

    /**
     * @param $cmd
     * @param $limit
     */
    public function add_timeout($cmd, $limit)
    {
        $limit = explode("|", $limit);
        $time = ($limit[1] == 'month') ? '30' : '1';
        $this->engine->db->query("INSERT INTO `console_timeout`(`date`, `command`, `user`) VALUES (NOW()+INTERVAL {$time} DAY, '" . $cmd . "', '" . $this->user()['id'] . "')");
    }

    /**
     * @param $cmd
     * @param $limit
     * @return bool
     */
    public function get_timeout($cmd, $limit)
    {
        $limit = explode("|", $limit);
        $query = $this->engine->db->query("SELECT * FROM `console_timeout` WHERE `date` > NOW() AND `command` = '{$cmd}' AND `user` = '{$this->user()['id']}'");
        if ($query->num_rows < $limit[0]) return true;
        return false;
    }

    /**
     * @param $minetext
     * @return string
     */
    public function minetext($minetext)
    {
        preg_match_all("/[^§&]*[^§&]|[§&][0-9a-z][^§&]*/", $minetext, $brokenupstrings);
        $returnstring = "";
        foreach ($brokenupstrings as $results) {
            $ending = '';
            foreach ($results as $individual) {
                $code = preg_split("/[&§][0-9a-z]/", $individual);
                preg_match("/[&§][0-9a-z]/", $individual, $prefix);
                if (isset($prefix[0])) {
                    $actualcode = substr($prefix[0], 1);
                    switch ($actualcode) {
                        case "1":
                            $returnstring = $returnstring . '<FONT COLOR="0000AA">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "2":
                            $returnstring = $returnstring . '<FONT COLOR="00AA00">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "3":
                            $returnstring = $returnstring . '<FONT COLOR="00AAAA">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "4":
                            $returnstring = $returnstring . '<FONT COLOR="AA0000">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "5":
                            $returnstring = $returnstring . '<FONT COLOR="AA00AA">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "6":
                            $returnstring = $returnstring . '<FONT COLOR="FFAA00">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "7":
                            $returnstring = $returnstring . '<FONT COLOR="AAAAAA">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "8":
                            $returnstring = $returnstring . '<FONT COLOR="555555">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "9":
                            $returnstring = $returnstring . '<FONT COLOR="5555FF">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "a":
                            $returnstring = $returnstring . '<FONT COLOR="55FF55">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "b":
                            $returnstring = $returnstring . '<FONT COLOR="55FFFF">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "c":
                            $returnstring = $returnstring . '<FONT COLOR="FF5555">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "d":
                            $returnstring = $returnstring . '<FONT COLOR="FF55FF">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "e":
                            $returnstring = $returnstring . '<FONT COLOR="FFFF55">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "f":
                            $returnstring = $returnstring . '<FONT COLOR="FFFFFF">';
                            $ending = $ending . "</FONT>";
                            break;
                        case "l":
                            if (strlen($individual) > 2) {
                                $returnstring = $returnstring . '<span style="font-weight:bold;">';
                                $ending = "</span>" . $ending;
                                break;
                            }
                        case "m":
                            if (strlen($individual) > 2) {
                                $returnstring = $returnstring . '<strike>';
                                $ending = "</strike>" . $ending;
                                break;
                            }
                        case "n":
                            if (strlen($individual) > 2) {
                                $returnstring = $returnstring . '<span style="text-decoration: underline;">';
                                $ending = "</span>" . $ending;
                                break;
                            }
                        case "o":
                            if (strlen($individual) > 2) {
                                $returnstring = $returnstring . '<i>';
                                $ending = "</i>" . $ending;
                                break;
                            }
                        case "r":
                            $returnstring = $returnstring . $ending;
                            $ending = '';
                            break;
                    }
                    if (isset($code[1])) {
                        $returnstring = $returnstring . $code[1];
                        if (isset($ending) && strlen($individual) > 2) {
                            $returnstring = $returnstring . $ending;
                            $ending = '';
                        }
                    }
                } else {
                    $returnstring = $returnstring . $individual;
                }

            }
        }

        return $returnstring;
    }
}