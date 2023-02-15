<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Main.class.php';

$Engine = new Engine;

$body = file_get_contents('php://input');
file_put_contents('testlog.txt',$body);
parse_str($body, $body);
$body = json_encode($body);
$body = json_decode($body);

echo $Engine->payment_action_yoomoney($body);
exit();
