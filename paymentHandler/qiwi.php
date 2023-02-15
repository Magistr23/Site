<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Main.class.php';

$Engine = new Engine;

$body = json_decode(file_get_contents('php://input'), true);
if($body && isset($body['bill'])) {
    $body = $body['bill'];
} else {
    $body = null;
}
file_put_contents('testlog_qiwi.txt',serialize($body));
echo $Engine->payment_action_qiwi($body);
exit();
