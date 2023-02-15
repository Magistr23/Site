<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/libs/smarty/Smarty.class.php');
include($_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Admin.class.php');

$admin = new admin();
$smarty = new Smarty;

$smarty->debugging = false;
$smarty->caching = false;
$smarty->setTemplateDir($_SERVER['DOCUMENT_ROOT'] . '/admin/templates/');
if (!$admin->auth()) {
    if (isset($_REQUEST['token'])) {
        $s = file_get_contents('http://ulogin.ru/token.php?token=' . $_REQUEST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($s, true);
        if ($user) $admin->send_auth($user);
    }
    $smarty->assign('messages_list', $admin->engine->messages);
    $smarty->assign('cfg', $admin->engine->cfg['admin']);
    $smarty->display('login.html');
} else {
    switch ($_GET['page']) {
        case "groups":
            if ($_GET['type'] == "edit" && isset($_GET['id'])) {
                $group = $admin->group((int)$_GET['id']);
                if ($group) {
                    $smarty->assign('type', "edit");
                    $smarty->assign('group', $group);
                }
            } elseif ($_GET['type'] == "new") {
                $smarty->assign('type', "new");
            } elseif ($_GET['type'] == "remove" && isset($_GET['id'])) {
                $group = $admin->group((int)$_GET['id']);
                if ($group) {
                    $admin->group_action("remove", "", $group['id']);
                }
            }
            $smarty->assign('page', 'groups');
            $smarty->assign('groups', $admin->groups());
            $smarty->assign('sorting', $admin->sorting());
            break;
        case "servers":
            if ($_GET['type'] == "edit/give" && isset($_GET['id'])) {
                $server = $admin->server((int)$_GET['id']);
                if ($server) {
                    $smarty->assign('type', "edit/give");
                    $smarty->assign('server', $server);
                }
            } elseif ($_GET['type'] == "new/give") {
                $smarty->assign('type', "new/give");
            } elseif ($_GET['type'] == "remove/give" && isset($_GET['id'])) {
                $server = $admin->server((int)$_GET['id']);
                if ($server) {
                    $admin->server_action("remove", "", $server['id']);
                }
            } elseif ($_GET['type'] == "edit/sort" && isset($_GET['id'])) {
                $sort = $admin->sort((int)$_GET['id']);
                if ($sort) {
                    $smarty->assign('type', "edit/sort");
                    $smarty->assign('sort', $sort);
                }
            } elseif ($_GET['type'] == "new/sort") {
                $smarty->assign('type', "new/sort");
            } elseif ($_GET['type'] == "remove/sort" && isset($_GET['id'])) {
                $sort = $admin->sort((int)$_GET['id']);
                if ($sort) {
                    $admin->sort_action("remove", "", $sort['id']);
                }
            }
            $smarty->assign('page', 'servers');
            $smarty->assign('sorting', $admin->sorting());
            $smarty->assign('servers', $admin->servers());
            break;
        case "promo":
            if ($_GET['type'] == "edit" && isset($_GET['id'])) {
                $promo = $admin->promo((int)$_GET['id']);
                if ($promo) {
                    $smarty->assign('type', "edit");
                    $smarty->assign('promo', $promo);
                }
            } elseif ($_GET['type'] == "new") {
                $smarty->assign('type', "new");
            } elseif ($_GET['type'] == "remove" && isset($_GET['id'])) {
                $promo = $admin->promo((int)$_GET['id']);
                if ($promo) {
                    $admin->promo_action("remove", "", $promo['id']);
                }
            }
            $smarty->assign('page', 'promo');
            $smarty->assign('promos', $admin->promos());
            break;
        default:
            $smarty->assign('statistics', $admin->statistics());
            $smarty->assign('donaters', $admin->donaters());
            $smarty->assign('page', 'index');
    }
    $smarty->assign('messages_list', $admin->engine->messages);
    $smarty->assign('cfg', $admin->engine->cfg);
    $smarty->display('main.html');
}
