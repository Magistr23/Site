<?php
session_start();
include 'Main.class.php';

/**
 * Class Admin
 */
class Admin
{

    /**
     * Admin constructor.
     */
    public function __construct()
    {
        $this->engine = new Engine;
        $this->events();
    }

    /**
     *
     */
    public function events()
    {
        if ($this->auth()) {
            if (isset($_POST['add_server'])) $this->server_action("new", $_POST);
            if (isset($_POST['edit_server'])) $this->server_action("edit", $_POST);
            if (isset($_POST['add_group'])) $this->group_action("new", $_POST);
            if (isset($_POST['edit_group'])) $this->group_action("edit", $_POST);
            if (isset($_POST['add_coupon'])) $this->promo_action("new", $_POST);
            if (isset($_POST['edit_coupon'])) $this->promo_action("edit", $_POST);
            if (isset($_POST['add_sort'])) $this->sort_action("new", $_POST);
            if (isset($_POST['edit_sort'])) $this->sort_action("edit", $_POST);
            if (isset($_GET['logout'])) {
                session_unset();
                session_destroy();
            }
        }
    }

    /**
     * @param $user
     */
    public function send_auth($user)
    {
        if ($this->auth) return $this->engine->add_message('Вы уже авторизованы.', true);
        if (in_array($user['uid'], $this->engine->cfg['admin']['access'])) {
            $_SESSION['uid'] = $user['uid'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $this->engine->add_message('Вы авторизовались.');
            $this->engine->redirect("/admin/");
        } else {
            $this->engine->add_message('У вас нет доступа.', true);
        }
    }

    /**
     * @return bool
     */
    public function auth()
    {

        if (in_array($_SESSION['uid'], $this->engine->cfg['admin']['access']) && $_SESSION['first_name'] && $_SESSION['last_name']) return true;
        return false;
    }

    /**
     * @param $text
     * @param $action
     * @return string
     */
    public function alert($text, $action)
    {
        return '<div class="alert alert-dismissible alert-' . $action . '">
				  ' . $text . '
				</div>';
    }

    ###СТАТИСТИКА###

    /**
     * @return array
     */
    public function statistics()
    {
        $query = $this->engine->db->query("SELECT * FROM `orders` WHERE `date` = '" . date("Y-m-d") . "'");
        $array = array("profit" => 0, "buyers" => 0, "wait" => 0);
        while ($pr = $query->fetch_object()) {
            if ($pr->status == 1) {
                $array['profit'] += $pr->profit;
                $array['buyers'] += 1;
            } elseif ($pr->status == 0) {
                $array['wait'] += 1;
            }
        }

        return array(
            "orders" => $query->num_rows,
            "profit" => $array['profit'],
            "buyers" => $array['buyers'],
            "wait" => $array['wait']
        );
    }

    ###СЕРВЕРА СОРТИРОВКИ###

    /**
     * @return bool|mysqli_result
     */
    public function sorting()
    {
        return $this->engine->db->query("SELECT * FROM `sorting`");
    }

    /**
     * @param $id
     * @return array|null
     */
    public function sort($id)
    {
        return $this->engine->db->query_array("SELECT * FROM `sorting` WHERE `id` = '" . (int)$id . "'");
    }

    /**
     * @param $type
     * @param string $post
     * @param string $id
     */
    public function sort_action($type, $post = '', $id = '')
    {
        if (!$this->auth()) return $this->engine->add_message("Вы не авторизованы.", true);

        if ($type == "new" || $type == "edit") {
            if (!$post['name'] || !$post['perms']) return $this->engine->add_message("Необходимо заполнить все поля.", true);
            if ($type == "new") {
                $this->engine->db->query("INSERT INTO `sorting`(`name`, `perms`) VALUES ('{$this->engine->db->escape($post['name'])}', '{$this->engine->db->escape($post['perms'])}')");
                return $this->engine->add_message("Сервер сортировки был добавлен.");
            } elseif ($type == "edit") {
                if (!$this->sort($post['id'])) return $this->engine->add_message("Сервер не обнаружен.", true);
                $this->engine->db->query("UPDATE `sorting` SET `name`='{$this->engine->db->escape($post['name'])}',`perms`='{$this->engine->db->escape($post['perms'])}' WHERE id = '" . (int)$post['id'] . "'");
                return $this->engine->add_message("Сервер сортировки был обновлен.");
            }
        } elseif ($type == "remove") {
            $this->engine->db->query("DELETE FROM `sorting` WHERE `id` = '" . (int)$id . "'");
            return $this->engine->add_message("Сервер сортировки был удален.");
        }
    }

    ###ДОНАТЕРЫ###

    /**
     * @return bool|mysqli_result
     */
    public function donaters()
    {
        return $this->engine->db->query("SELECT * FROM `orders` WHERE `status` = 1");
    }

    ###КУПОНЫ###

    /**
     * @return bool|mysqli_result
     */
    public function promos()
    {
        return $this->engine->db->query("SELECT * FROM `promo`");
    }

    /**
     * @param $id
     * @return array|bool
     */
    public function promo($id)
    {
        $query = $this->engine->db->query_result("SELECT * FROM `promo` WHERE `id` = '" . (int)$id . "'");
        if (!$query) return false;
        return array(
            "id" => $query->id,
            "name" => $query->name,
            "disc" => $query->disc
        );
    }

    /**
     * @param $type
     * @param string $post
     * @param string $id
     */
    public function promo_action($type, $post = '', $id = '')
    {
        if (!$this->auth()) return $this->engine->add_message("Вы не авторизованы.", true);

        if ($type == "new" || $type == "edit") {
            if (!$post['name'] || !$post['disc']) return $this->engine->add_message("Необходимо заполнить все поля.", true);
            if ($type == "new") {
                $this->engine->db->query("INSERT INTO `promo`(`name`, `disc`) VALUES ('{$this->engine->db->escape($post['name'])}', '{$this->engine->db->escape($post['disc'])}')");
                return $this->engine->add_message("Купон был добавлен.");
            } elseif ($type == "edit") {
                if (!$this->promo($post['id'])) return $this->engine->add_message("Сервер не обнаружен.", true);
                $this->engine->db->query("UPDATE `promo` SET `name`='{$this->engine->db->escape($post['name'])}',`disc`='{$this->engine->db->escape($post['disc'])}' WHERE `id`='" . (int)$post['id'] . "'");
                return $this->engine->add_message("Купон был обновлен.");
            }
        } elseif ($type == "remove") {
            $this->engine->db->query("DELETE FROM `promo` WHERE `id` = '" . (int)$id . "'");
            return $this->engine->add_message("Купон был удален.");
        }
    }

    ###СЕРВЕРА###

    /**
     * @return bool|mysqli_result
     */
    public function servers()
    {
        return $this->engine->db->query("SELECT * FROM `servers`");
    }

    /**
     * @param $id
     * @return array|bool
     */
    public function server($id)
    {
        $query = $this->engine->db->query_result("SELECT * FROM `servers` WHERE `id` = '" . (int)$id . "'");
        if (!$query) return false;
        return array(
            "id" => $query->id,
            "ip" => $query->ip,
            "port" => $query->port,
            "pass" => $query->pass,
            "name" => $query->name,
			"server" => $query->server
        );
    }

    /**
     * @param $type
     * @param string $post
     * @param string $id
     */
    public function server_action($type, $post = '', $id = '')
    {
        if (!$this->auth()) return $this->engine->add_message("Вы не авторизованы.", true);

        if ($type == "new" || $type == "edit") {
            if (!$post['name'] || !$post['ip'] || !$post['port'] || !$post['pass'] || !$post['sorting']) return $this->engine->add_message("Необходимо заполнить все поля.", true);
            if ($type == "new") {
                $this->engine->db->query("INSERT INTO `servers`(`ip`, `port`, `pass`, `name`, `server`) VALUES ('{$this->engine->db->escape($post['ip'])}', '{$this->engine->db->escape($post['port'])}', '{$this->engine->db->escape($post['pass'])}', '{$this->engine->db->escape($post['name'])}', '{$this->engine->db->escape($post['sorting'])}')");
                return $this->engine->add_message("Сервер был добавлен.");
            } elseif ($type == "edit") {
                if (!$this->server($post['id'])) return $this->engine->add_message("Сервер не обнаружен.", true);
                $this->engine->db->query("UPDATE `servers` SET `ip`='{$this->engine->db->escape($post['ip'])}',`port`='{$this->engine->db->escape($post['port'])}',`pass`='{$this->engine->db->escape($post['pass'])}',`name`='{$this->engine->db->escape($post['name'])}',`server`='{$this->engine->db->escape($post['sorting'])}' WHERE id = '" . (int)$post['id'] . "'");
                return $this->engine->add_message("Сервер был обновлен.");
            }
        } elseif ($type == "remove") {
            $this->engine->db->query("DELETE FROM `servers` WHERE `id` = '" . (int)$id . "'");
            return $this->engine->add_message("Сервер был удален.");
        }
    }

    ###ГРУППЫ###

    /**
     * @return array
     */
    public function groups()
    {
        $list = array();
        $groups = $this->engine->db->query("SELECT * FROM `groups`");
        while ($group = $groups->fetch_object()) {
            $server = $this->sort($group->server)['name'] ?? "-1";
            if (!is_array($list[$server])) {
                $list[$server] = array();
            }
            $list[$server][] = (array)$group;
        }
        return $list;
    }

    /**
     * @param $id
     * @return array|bool
     */
    public function group($id)
    {
        $query = $this->engine->db->query_result("SELECT * FROM `groups` WHERE `id` = '" . (int)$id . "'");
        if (!$query) return false;
        return array(
            "id" => $query->id,
            "name" => $query->name,
            "price" => $query->price,
            "cmd" => $query->cmd,
            "category" => $query->category,
            "surcharge" => $query->surcharge,
            "pex" => $query->pex,
            "server" => $query->server,
			"text" => $query->text,
			"image" => $query->image
        );
    }

    /**
     * @param $type
     * @param string $post
     * @param string $id
     */
    public function group_action($type, $post = '', $id = '')
    {
        if (!$this->auth()) return $this->engine->add_message("Вы не авторизованы.", true);

        if ($type == "new" || $type == "edit") {
            if (!$post['name'] || !$post['price'] || !$post['cmd'] || !$post['category'] || !$post['sorting']) return $this->engine->add_message("Необходимо заполнить все поля.", true);
            if ($post['surcharge'] != 1 && $post['surcharge'] != 0) return $this->engine->add_message("Доплата указана не верно.", true);
            if ($post['surcharge'] == 1 && !$post['pex']) return $this->engine->add_message("Укажите PeX.", true);
            if ($type == "new") {
                $this->engine->db->query("INSERT INTO `groups`(`name`, `price`, `cmd`, `category`, `surcharge`, `pex`, `server`, `text`, `image`) VALUES ('{$this->engine->db->escape($post['name'])}', '{$this->engine->db->escape($post['price'])}', '{$this->engine->db->escape($post['cmd'])}', '{$this->engine->db->escape($post['category'])}', '{$this->engine->db->escape($post['surcharge'])}', '{$this->engine->db->escape($post['pex'])}', '{$this->engine->db->escape($post['sorting'])}', '{$this->engine->db->escape($post['text'])}', '{$this->engine->db->escape($post['image'])}')");
                return $this->engine->add_message("Товар был добавлен.");
            } elseif ($type == "edit") {
                if (!$this->group($post['id'])) return $this->engine->add_message("Товар не обнаружен.", true);
                $this->engine->db->query("UPDATE `groups` SET `name`='{$this->engine->db->escape($post['name'])}',`price`='{$this->engine->db->escape($post['price'])}',`cmd`='{$this->engine->db->escape($post['cmd'])}',`category`='{$this->engine->db->escape($post['category'])}',`surcharge`='{$this->engine->db->escape($post['surcharge'])}',`pex`='{$this->engine->db->escape($post['pex'])}',`server`='{$this->engine->db->escape($post['sorting'])}',`text`='{$this->engine->db->escape($post['text'])}',`image`='{$this->engine->db->escape($post['image'])}' WHERE id = '" . (int)$post['id'] . "'");
                return $this->engine->add_message("Товар был обновлен.");
            }
        } elseif ($type == "remove") {
            $this->engine->db->query("DELETE FROM `groups` WHERE `id` = '" . (int)$id . "'");
            return $this->engine->add_message("Товар был удален.");
        }
    }
}
	