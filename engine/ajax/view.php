<?php
$nick  = $_REQUEST['nick'];
$group = $_REQUEST['group'];
$promo = $_REQUEST['promo'];
$way   = $_REQUEST['payment_way'];
$method = $_REQUEST['method'];
echo $Engine->buy_price($nick, $group, $promo, $way, $method);
