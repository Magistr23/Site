<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Main.class.php';

$Engine = new Engine;

echo $Engine->payment_action_anypay($_REQUEST['pay_id'] ?? 0, $_REQUEST['amount'] ?? 0, $_REQUEST['profit'] ?? 0);
exit();
