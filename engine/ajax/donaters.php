<?php

$json = [];

if($_SERVER['REQUEST_METHOD'] != 'POST'){
	exit(json_encode($json, JSON_PRETTY_PRINT));
}

$donaters = $Engine->db->query("SELECT * FROM `orders` WHERE `status` = 1 ORDER BY `id` DESC LIMIT 5");

if(!$donaters || !$donaters->num_rows){
	exit(json_encode($json, JSON_PRETTY_PRINT));
}

while($donater = $donaters->fetch_assoc()){
	$json[] = [
		'username' => $donater['nick'],
		'image' => "https://minotar.net/avatar/{$donater['nick']}/80",
		'date' => $donater['date'],
		'time' => $donater['time']
	];
}

exit(json_encode($json, JSON_PRETTY_PRINT));