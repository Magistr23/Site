<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/engine/classes/Main.class.php';

$engine = new Engine();

$config = array(
	'status' => true, //true / false - включение / выключение
	'dateStart' => '2019-05-06', //Формат даты: ГОД-МЕСЯЦ-ЧИСЛО
);

if($config['status'] !== true) die("Выключено.");
if(!$config['dateStart']) die("Укажите дату!");

$donaters = $engine->db->query("SELECT * FROM `orders` WHERE `date` >= '{$config['dateStart']}' AND `status` = '1' ORDER BY id ASC");

foreach ($donaters as $donater) {
	echo "Перевыдача игроку: {$donater['nick']}<br>";
	echo $engine->payment_rcon($donater['id']);
	echo "<br>";
}
