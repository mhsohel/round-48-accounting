<?php 
include('inc/database.php');
$aa=$_GET['id'];
$db->query("delete from liability where id=$aa");
$db->close();
header('Location:liability_show.php');
?>

