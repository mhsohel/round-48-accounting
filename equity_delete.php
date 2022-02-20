<?php 
include('inc/database.php');
$aa=$_GET['id'];
$db->query("delete from equity where id=$aa");
//$db->close();

header('Location:equityy.php');
?>
