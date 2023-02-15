<?php
/*
 * Скрипт авто-доната Майнкрафт
 * vk.com/phpmc
 * PHPMC.RU
*/
require 'Db.class.php';
date_default_timezone_set('Europe/Moscow');

/**
 * Class Engine
 */
class Engine
{

    /**
     * @var
     */
    /**
     * @var array
     */
    public $cfg, $messages = [];

    /**
     * Engine constructor.
     */
    public function __construct()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/engine/config.php');
        $this->cfg = $config;
        $this->db = new Db($this->cfg['db']);
        $this->perms = ($this->cfg['db'] === $this->cfg['perms']) ? $this->db : new Db($this->cfg['perms']);
        $this->events();
    }

    /**
     * Events listener
     */
    public function events()
    {
        if(isset($_POST['buy'])) {
            $buy = explode("|", $this->buy_price($_POST['nick'], $_POST['group'], $_POST['promo'], "buy"));
            if($buy[0] == "error") {
                return $this->add_message($buy[3], true);
            }
            return $this->add_message('Переходим к оплате...!');
        }
        if(isset($_REQUEST['success'])) {
            $this->add_message("Вы купили привилегию!");
        }
        if(isset($_REQUEST['error'])) {
            $this->add_message("Во время покупки привилегии произошла ошибка!", true);
        }
    }

    /**
     * @param        $text
     * @param  bool  $err
     */
    public function add_message($text, $err = false)
    {
        $this->messages[] = ['text' => $text, 'err' => $err];
    }

    /**
     * @param $url
     */
    public function redirect($url)
    {
        echo '<script type="text/javascript">';
        echo 'window.location.href=\'' . $url . '\';';
        echo '</script>';
    }

    /**
     * @return array
     */
    public function groups()
    {
        $list = $this->db->query("SELECT * FROM `sorting`");
        $products = [];
        if(!$list || !$list->num_rows) {
            return $products;
        }

        while($l = $list->fetch_object()) {
            if(!is_array($products[$l->id])) {
                $products[$l->id] = [];
                $products[$l->id]['name'] = $l->name;
            }
            $products_list = $this->sorting_groups($l->id);
            if(!$products_list || !$products_list->num_rows) {
                continue;
            }
            while($product_info = $products_list->fetch_object()) {
                if(!is_array($products[$l->id]['groups'][$product_info->category])) {
                    $products[$l->id]['groups'][$product_info->category] = [];
                }
                $products[$l->id]['groups'][$product_info->category][] = $product_info;
            }
        }
        return $products;
    }

    /**
     * @param $server
     *
     * @return bool|mysqli_result
     */
    public function sorting_groups($server)
    {
        return $this->db->query("SELECT * FROM `groups` WHERE `server` = '" . (int) $server . "'");
    }

    /**
     * @param $id
     *
     * @return bool|mysqli_result
     */
    public function sorting($id)
    {
        return $this->db->query_result("SELECT * FROM `sorting` WHERE `id` = '" . (int) $id . "'");
    }

    /**
     * @param $id
     *
     * @return object|stdClass
     */
    public function group($id)
    {
        return $this->db->query_result("SELECT * FROM `groups` WHERE `id` = " . (int) $id . " LIMIT 1");
    }

    /**
     * @param $pex
     *
     * @return object|stdClass
     */
    public function group_pex($pex)
    {
        return $this->db->query_result("SELECT * FROM `groups` WHERE `pex` = '" . $pex . "' AND `pex` != '' LIMIT 1");
    }

    /**
     * @param $id
     *
     * @return object|stdClass
     */
    public function order($id)
    {
        return $this->db->query_result("SELECT * FROM `orders` WHERE `id` = '" . (int) $id . "' LIMIT 1");
    }

    /**
     * @param $login
     * @param $cmd
     *
     * @return bool|mysqli_result
     */
    public function rcon_log($login, $cmd)
    {
        return $this->db->query("INSERT INTO `log` (`nick`, `message`) VALUES ('" . $login . "', '" . $cmd . "')");
    }

    /**
     * @param $nick
     * @param $server
     *
     * @return bool|string
     */
    public function surcharge($nick, $server)
    {
        $uuid = $this->uuidConvert($nick);

        $player = @$this->perms->query_result("SELECT * FROM `luckperms_user_permissions` WHERE `uuid` = '{$uuid}' AND `server` = '{$server}' AND `permission` LIKE '%group%' ORDER BY id DESC LIMIT 1");

        if(!$player) {
            return false;
        }
        if(in_array($player->permission, $this->cfg['blocked_groups'])) {
            return "-1";
        }
        $group = $this->group_pex(str_replace("group.", "", $player->permission));
        if(!$group) {
            return false;
        }
        return $group->price;
    }

    private function online_update()
    {
        $filename = "{$_SERVER['DOCUMENT_ROOT']}/online.json";

        require_once($_SERVER['DOCUMENT_ROOT'] . '/engine/classes/MCQuery.class.php');
        $mon = mcraftPing($this->cfg['server']['monic'], $this->cfg['server']['monicPort'], 3);

        if(!$mon) {
            return false;
        }

        $mon['time'] = time();

        file_put_contents($filename, json_encode($mon));

        return $mon;
    }

    /**
     * @return array
     */
    public function online()
    {
        $filename = "{$_SERVER['DOCUMENT_ROOT']}/online.json";

        $time = time();

        if(is_file($filename)) {
            $json = json_decode(file_get_contents($filename), true);

            if($json['time'] + 30 < $time) {
                $json = $this->online_update();
            }
        } else {
            $json = $this->online_update();
        }

        return [
            'online' => !$json ? 0 : intval(@$json['numplayers']), 'slots' => !$json ? 0 : intval(@$json['maxplayers']),
        ];
    }

    /**
     * @param $promo
     * @param $price
     *
     * @return float|int
     */
    public function promo($promo, $price)
    {
        $promo = $this->db->query_result("SELECT * FROM `promo` WHERE `name` = '{$promo}' LIMIT 1");
        if(!$promo) {
            return $price;
        }
        return $price - ($price / 100 * $promo->disc);
    }

    /**
     * @param          $nick
     * @param          $group
     * @param  string  $promo
     * @param  string  $way
     * @param  string  $type
     *
     * @return bool|string
     */
    public function buy_price($nick, $group, $promo = '', $way, $type = 'check')
    {
        $nick = $this->db->escape(trim(strip_tags($nick)));
        $group = $this->db->escape(trim(strip_tags($group)));
        $promo = $this->db->escape(trim(strip_tags($promo)));
        if(!$nick) {
            return "error|Ник не указан||Ник не указан";
        }
        if(!$group) {
            return "error|Выберите товар||Товар не выбран";
        }
        $group = $this->group($group);
        if(!$group) {
            return "error|Выберите товар||Незивестный товар";
        }
        $price = $group->price;
        $sorting = $this->sorting($group->server);
        if(!$sorting) {
            return "error|Системная ошибка||Системная ошибка";
        }
        $surcharge = $this->surcharge($nick, $sorting->perms);

        if($group->surcharge == 1) {
            if($surcharge) {
                if($surcharge == "-1") {
                    return "error|Недоступно||Недоступно";
                }
                $price -= $surcharge;
            }
        }
        if($promo) {
            $price = $this->promo($promo, $price);
        }
        if($price > 0) {
            if($type == "check") {
                if($surcharge == null || $group->surcharge == 0) {
                    return "ok|Купить за " . $price . " ₽|" . $this->alert("Вы собираетесь приобрести донат <b>{$group->name}</b> за <b>{$price}</b> ₽",
                            "info");
                } else {
                    return "ok|Доплатить за " . $price . " ₽|" . $this->alert("Вы собираетесь доплатить до доната <b>{$group->name}</b> за <b>{$price}</b> ₽",
                            "info");
                }
            } elseif($type == "buy") {
                return "ok|" . $this->buy($nick, $price, $group->id, $way);
            } else {
                return false;
            }
        } else {
            return "error|У вас имеется более высокий донат!|" . $this->alert("У вас уже имеется более высокий донат, выберите другой из списка!",
                    "danger") . "|У вас имеется более высокий донат!";
        }
    }

    /**
     * @param $nick
     * @param $price
     * @param $group
     * @param $way
     *
     * @return string
     */
    public function buy($nick, $price, $group, $way)
    {
        $group = $this->group($group);
        $price = (int) $price;
        $this->db->query("INSERT INTO `orders`(`groupid`, `group`, `price`, `nick`, `date`, `time`, `month`) VALUES ('" . $group->id . "','" . $group->name . "','" . $price . "','" . $nick . "', '" . date("Y-m-d") . "', '" . date("G:i:s") . "', '" . date("n") . "')");
        $orderId = $this->db->insert_id();
        $account = json_encode(["id" => $orderId, "nick" => $nick]);
        $desc = "Оплата заказа №{$orderId}. Покупка {$group->name} для игрока {$nick}.";
        $descQiwi = "Пожертвование на поддержку работы проекта от {$nick}";
        $gatewaySettings = $this->cfg['payment_gateways'];
        $method = $this->cfg['payments_methods'][$way];
        $params = [];
        if(isset($method['params'])) {
            $params = $method['params'];
        }

        switch($method['method']) {
            case 'yoomoney':
                $arr = array(
                    "receiver" => $gatewaySettings['yoomoney']['wallet'],
                    "formcomment" => "",
                    "short-dest" => "",
                    "label" => "$nick|$group->id|$orderId",
                    "quickpay-form" => "donate",
                    "targets" => "$descQiwi",
                    "sum" => "$price",
                    "comment" => "",
                    "paymentType" => "PC"
                );
                $fields_string = http_build_query($arr);
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, 'https://yoomoney.ru/quickpay/confirm.xml');
                curl_setopt($ch,CURLOPT_POST, true);
                curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                $result = curl_exec($ch);
                $result = str_replace("Found. Redirecting to ", "", $result);;
                return sprintf("%s",$result);
            case 'yoomoney_card':
                $arr = array(
                    "receiver" => $gatewaySettings['yoomoney']['wallet'],
                    "formcomment" => "",
                    "short-dest" => "",
                    "label" => "$nick|$group->id|$orderId",
                    "quickpay-form" => "donate",
                    "targets" => "$descQiwi",
                    "sum" => "$price",
                    "comment" => "",
                    "paymentType" => "AC"
                );
                $fields_string = http_build_query($arr);
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL, 'https://yoomoney.ru/quickpay/confirm.xml');
                curl_setopt($ch,CURLOPT_POST, true);
                curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                
                curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                $result = curl_exec($ch);
                $result = str_replace("Found. Redirecting to ", "", $result);;
                return sprintf("%s",$result);

            case 'yoomoney_mobile':
                $price_for_mob = $price-($price/100*12);
                    $arr = array(
                        "receiver" => $gatewaySettings['yoomoney']['wallet'],
                        "formcomment" => "$orderId",
                        "short-dest" => "",
                        "label" => "$nick|$group->id|$orderId|$price",
                        "quickpay-form" => "donate",
                        "targets" => "$descQiwi",
                        "sum" => $price_for_mob,
                        "comment" => "",
                        "paymentType" => "MC",
                        "successURL" => "https://mdays.su/paymentHandler/yoomoney_check.php?id=$orderId"
                    );
                    $fields_string = http_build_query($arr);
                    $ch = curl_init();
                    curl_setopt($ch,CURLOPT_URL, 'https://yoomoney.ru/quickpay/confirm.xml');
                    curl_setopt($ch,CURLOPT_POST, true);
                    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                    
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                    $result = curl_exec($ch);
                    $result = str_replace("Found. Redirecting to ", "", $result);;
                    $d_check = date("G:i");
                if ($this->db->query("SELECT * FROM orders WHERE nick = '" . $nick . "'AND groupid = '" . $group->id . "' AND time LIKE '%$d_check%'")->num_rows == 1):
                    foreach ($this->cfg['vk']['users'] as $user) {
                        $this->sendMessage(
                            "Игрок {$nick} использовал Мобилки: {$group->name} за {$price} руб, номер платежа: #{$orderId} \n Команды выдачи: {$group->cmd}", 
                            $user
                        );
                    }
                endif;
                    return sprintf("%s",$result);
            case 'qiwi':
                if(!isset($params['paySourcesFilter'])) {
                    $params['paySourcesFilter'] = '';
                }

                $params = [
                    'publicKey'    => $gatewaySettings['qiwi']['public_key'],
                    'billId'       => $orderId,
                    'amount'       => $price,
                    'account'      => $orderId,
                    'comment'      => $descQiwi,
                    'customFields' => [
                        'themeCode'        => $gatewaySettings['qiwi']['theme_code'],
                        'paySourcesFilter' => $params['paySourcesFilter'],
                    ],
                ];
                return sprintf("https://oplata.qiwi.com/create?%s", http_build_query($params));

            case 'anypay':
                $sign = md5(sprintf("RUB:%s:%s:%s:%s", $price, $gatewaySettings['anypay']['secret_key'], $gatewaySettings['anypay']['merchant_id'], $orderId));

                $params += [
                    'merchant_id' => $gatewaySettings['anypay']['merchant_id'],
                    'pay_id'      => $orderId,
                    'amount'      => $price,
                    'desc'        => $desc,
                    'sign'        => $sign,
                    'currency'    => 'RUB',
                ];

                return sprintf("https://anypay.io/merchant?%s", http_build_query($params));

            case 'unitpay':
            default:
                $sign = $this->sign_form($account, $desc, $price);
                $params += [
                    'sum'       => $price,
                    'account'   => $account,
                    'desc'      => $desc,
                    'signature' => $sign,
                ];

                $code = $params['code'] ?? '';
                unset($params['code']);

                if($code) {
                    $params['hideMenu'] = 'true';
                }

                return sprintf("https://unitpay.money/pay/%s/%s?%s",
                    $gatewaySettings['unitpay']['project_id'], $code, http_build_query($params));
        }
    }

    /**
     * @param          $params
     * @param          $message
     * @param  string  $type
     *
     * @return false|string
     */
    public function payment_replay($params, $message, $type = "error")
    {
        if($type == "success") {
            return json_encode(["jsonrpc" => "2.0", "result" => ["message" => $message], 'id' => $params['projectId']]);
        } else {
            return json_encode([
                "jsonrpc" => "2.0", "error" => ["code" => -32000, "message" => $message], 'id' => $params['projectId'],
            ]);
        }
    }

    /**
     * @param $order
     * @param $desc
     * @param $sum
     *
     * @return string
     */
    public function sign_form($order, $desc, $sum)
    {
        $hashStr = $order . '{up}' . $desc . '{up}' . $sum . '{up}' . $this->cfg['payment_gateways']['unitpay']['key'];
        return hash('sha256', $hashStr);
    }

    /**
     * @param         $method
     * @param  array  $params
     *
     * @return string
     */
    private function get_sign($method, array $params)
    {
        $delimiter = '{up}';
        ksort($params);
        unset($params['sign']);
        unset($params['signature']);
        return hash('sha256',
            $method . $delimiter . join($delimiter, $params) . $delimiter . $this->cfg['payment_gateways']['unitpay']['key']);
    }

    /**
     * @param $text
     * @param $uid
     *
     * @return false|string
     */
    public function sendMessage($text, $uid)
    {
        $request_params = [
            'message' => $text, 'peer_id' => $uid, 'random_id' => time(), 'access_token' => $this->cfg['vk']['token'],
            'v'       => $this->cfg['vk']['v'],
        ];
        $get_params = http_build_query($request_params);
        return file_get_contents('https://api.vk.com/method/messages.send?' . $get_params);
    }

    /**
     * @param $method
     * @param $params
     *
     * @return false|string
     */
    public function payment_action($method, $params)
    {
        if($params['signature'] != $this->get_sign($method, $params)) {
            return $this->payment_replay($params, "Подпись не верна");
        }
        $account = json_decode($params['account']);
        $data = $this->order((int) $account->id);
        $group = $this->group($data->groupid);
        if(!$data) {
            return $this->payment_replay($params, "Счет не обнаружен");
        }
        if($method == 'check') {
            return $this->payment_replay($params, "Счет готов к оплате", "success");
        } elseif($method == 'pay') {
            if($data->status == 1) {
                return $this->payment_replay($params, "Счет уже оплачен");
            }
            $delta = $data->price - ((float) $params['orderSum']);
            if($delta > 1.5) {
                return $this->payment_replay($params, "Некорректная сумма");
            }
            $this->db->query("UPDATE `orders` SET `status` = '1', `profit` = '" . $params['profit'] . "' WHERE `id` = " . (int) $data->id);
            if($group->surcharge == 1) {
                $this->surcharge($data->nick, "add", $group->price);
            }
            $this->payment_rcon($data->id);
            foreach($this->cfg['vk']['users'] as $user) {
                $this->sendMessage("Игрок {$data->nick} купил товар {$group->name}, за: {$params['profit']} ₽. Платёж: #{$params['unitpayId']}",
                    $user);
            }
            return $this->payment_replay($params, "Счет успешно оплачен, выдаем донат...", "success");
        } else {
            return $this->payment_replay($params, "Метод не поддерживается: " . $method);
        }
    }

    public function payment_action_qiwi($bill)
    {
        $account = $bill['customer']['account'];
        $order = $this->order($account);
        $group = $this->group($order->groupid);

        if(!$order) {
            return $this->payment_replay($bill, "Счет не обнаружен");
        }

        if($order->status == 1) {
            return $this->payment_replay($bill, "Счет уже оплачен");
        }

        $payedSum = (float) $bill['amount']['value'];
        $price = $order->price;
        if($payedSum < $price) {
            return $this->payment_replay($bill, "Некорректная сумма");
        }

        $this->db->query("UPDATE `orders` SET `status` = '1', `profit` = '" . $bill['amount']['value'] . "' WHERE `id` = " . (int) $order->id);
        if($group->surcharge == 1) {
            $this->surcharge($order->nick, "add", $group->price);
        }

        $this->payment_rcon($order->id);
        foreach($this->cfg['vk']['users'] as $user) {
            $this->sendMessage("Игрок {$order->nick} купил товар {$group->name}, за: {$bill['amount']['value']} ₽. Платёж: #{$bill['billId']}",
                $user);
        }

        return $this->payment_replay($bill, "Счет успешно оплачен, выдаем донат...", "success");
    }
    public function payment_action_yoomoney($bill)
    {
        $info_bill_label = explode("|", $bill->label);
        $account = $info_bill_label['2'];
        $order = $this->order($info_bill_label['2']);
        $group = $this->group($info_bill_label['1']);

        $payedSum = (float) $bill->withdraw_amount;
        $price = $bill->withdraw_amount;
        if (($this->db->query("SELECT * FROM orders WHERE id = '$account' AND status = '1'")->num_rows) == 1) {
            return;
            exit;
        }
        $this->db->query("UPDATE `orders` SET `status` = '1', `profit` = '" . $bill->amount . "' WHERE `id` = " . (int) $account);
        if($group->surcharge == 1) {
            $this->surcharge($order->nick, "add", $group->price);
        }

        $this->payment_rcon($order->id);
        foreach($this->cfg['vk']['users'] as $user) {
            $for_nick = $info_bill_label['0'];
            $this->sendMessage("Игрок {$for_nick} купил товар {$group->name}, за: {$bill->withdraw_amount} ₽. Платёж: #{$account}",
                $user);
        }

        return $this->payment_replay($bill, "Счет успешно оплачен, выдаем донат...", "success");
    }
    public function payment_action_anypay($payId, $amount, $profit)
    {
        $order = $this->order($payId);
        $group = $this->group($order->groupid);

        if(!$order || !$group) {
            return 'Неизвестный ID';
        }

        if($order->status == 1) {
            return 'Счет уже оплачен';
        }

        if($order->price < $amount) {
            return 'Некорректная сумма платежа';
        }

        $this->db->query("UPDATE `orders` SET `status` = '1', `profit` = '" . $profit . "' WHERE `id` = " . (int) $order->id);
        if($group->surcharge == 1) {
            $this->surcharge($order->nick, "add", $group->price);
        }

        $this->payment_rcon($order->id);
        foreach($this->cfg['vk']['users'] as $user) {
            $this->sendMessage("Игрок {$order->nick} купил товар {$group->name}, за: {$profit} ₽. Платёж: #{$payId}",
                $user);
        }

        return 'OK';
    }

    /**
     * @param $order
     */
    public function payment_rcon($order)
    {
        $data = $this->order($order);
        $group = $this->group($data->groupid);
        $nick = strtr($data->nick, ["&lowbar;" => "_", " " => ""]);
        require_once($_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Rcon.class.php');
        $servers = $this->db->query("SELECT * FROM `servers` WHERE `server` = '{$group->server}'");
        if(!$servers || !$servers->num_rows) {
            $this->rcon_log($nick, "SERVERS NOT FOUND");
        }
        while($s = $servers->fetch_object()) {
            $rcon = new Rcon($s->ip, $s->port, $s->pass, 5);
            if($rcon->connect()) {
                foreach(explode(';', $group->cmd) as $c) {
                    $cmd = str_replace(['[nick]'], [$nick], $c);
                    $rcon->send_command($cmd);
                    $this->rcon_log($nick, "CONNECT ({$s->id}): " . $rcon->get_response());
                }
            } else {
                $this->rcon_log($nick, "CONNECT ERROR ({$s->id}): " . $rcon->get_response());
            }
        }
    }

    /**
     * @param $date
     *
     * @return string
     */
    public function date($date)
    {
        $time = explode(" ", $date);
        $month = explode("-", $time[0]);
        if($month[1] == 1) {
            $month_t = "января";
        } elseif($month[1] == 2) {
            $month_t = "Февраля";
        } elseif($month[1] == 3) {
            $month_t = "марта";
        } elseif($month[1] == 4) {
            $month_t = "апреля";
        } elseif($month[1] == 5) {
            $month_t = "мая";
        } elseif($month[1] == 6) {
            $month_t = "июня";
        } elseif($month[1] == 7) {
            $month_t = "июля";
        } elseif($month[1] == 8) {
            $month_t = "августа";
        } elseif($month[1] == 9) {
            $month_t = "сентября";
        } elseif($month[1] == 10) {
            $month_t = "октября";
        } elseif($month[1] == 11) {
            $month_t = "ноября";
        } elseif($month[1] == 12) {
            $month_t = "декабря";
        } else {
            return $date;
        }
        $sec = explode(":", $time[1]);
        if($time[0] == date("Y-m-d")) {
            return "Сегодня в " . $sec[0] . ":" . $sec[1];
        } elseif($time[0] == date('Y-m-d', strtotime('-1 days'))) {
            return "Вчера в " . $sec[0] . ":" . $sec[1];
        } else {
            return $month[2] . " " . $month_t . " в " . $sec[0] . ":" . $sec[1];
        }
    }

    /**
     * @param $text
     * @param $action
     *
     * @return string
     */
    public function alert($text, $action)
    {
        return '<div class="alert alert-dismissible text-center alert-' . $action . '">
				  ' . $text . '
				</div>';
    }

    /**
     * @param $string
     *
     * @return string
     */
    public function uuidFromString($string)
    {
        $val = md5($string, true);
        $byte = array_values(unpack('C16', $val));

        $tLo = ($byte[0] << 24) | ($byte[1] << 16) | ($byte[2] << 8) | $byte[3];
        $tMi = ($byte[4] << 8) | $byte[5];
        $tHi = ($byte[6] << 8) | $byte[7];
        $csLo = $byte[9];
        $csHi = $byte[8] & 0x3f | (1 << 7);

        if(pack('L', 0x6162797A) == pack('N', 0x6162797A)) {
            $tLo = (($tLo & 0x000000ff) << 24) | (($tLo & 0x0000ff00) << 8) | (($tLo & 0x00ff0000) >> 8) | (($tLo & 0xff000000) >> 24);
            $tMi = (($tMi & 0x00ff) << 8) | (($tMi & 0xff00) >> 8);
            $tHi = (($tHi & 0x00ff) << 8) | (($tHi & 0xff00) >> 8);
        }

        $tHi &= 0x0fff;
        $tHi |= (3 << 12);

        $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x', $tLo, $tMi, $tHi, $csHi, $csLo, $byte[10],
            $byte[11], $byte[12], $byte[13], $byte[14], $byte[15]);
        return $uuid;
    }

    /**
     * @param $string
     *
     * @return string
     */
    public function uuidConvert($string)
    {
        return $this->uuidFromString("OfflinePlayer:" . $string);
    }
}
