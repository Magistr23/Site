<?
$id = $_GET['id'];
include("../engine/classes/Db.class.php");
$qr = $db->query_result("SELECT * FROM `orders` WHERE `id` = '$id'");
echo "status: " . $qr->status;
?>