<?php
include 'inc/database.php';
$id=$_GET['id'];
$query="delete from admin where id=$id";
$db->query($query);
header("location:admin.php");

?>