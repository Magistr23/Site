<?php
define('__ROOT__', __DIR__);

require_once('libs/smarty/Smarty.class.php');
include('engine/classes/Main.class.php');

$engine = new Engine();
$smarty = new Smarty;

$smarty->debugging = false;
$smarty->caching = false;
$smarty->setTemplateDir(__ROOT__."/templates/{$engine->cfg['template']}/");

$smarty->assign([
	'messages_list' => $engine->messages,
	'cfg' => $engine->cfg,
	'theme_url' => "/templates/{$engine->cfg['template']}/",
]);


if(isset($_GET['page']) && preg_match('/^[\w\-]+$/i', $_GET['page'])) {
    if(is_file(__ROOT__. "/templates/{$engine->cfg['template']}/pages/{$_GET['page']}.html")){
        $smarty->assign('page', $_GET['page']);
    } else {
        $smarty->assign('page', '404');
    }
} else {
    $smarty->assign([
		'groups' => $engine->groups(),
		'online' => $engine->online(),
		'page' => 'index'
	]);
}

$smarty->display('main.html');
