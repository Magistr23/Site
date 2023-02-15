<?php
define('__ROOT__', dirname(__DIR__));

require_once __ROOT__.'/engine/classes/Main.class.php';

$Engine = new Engine;

$filename = __ROOT__."/engine/ajax/{$_REQUEST['type']}.php";

if(preg_match('/^[\w\/\-]+$/i', $_REQUEST['type']) && is_file($filename)){
	include($filename);
}