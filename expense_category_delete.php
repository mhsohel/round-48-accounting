<?php
include 'inc/database.php';
$id=$_GET['id'];
$query="delete from expense_category where id=$id";
$db->query($query);
header("location:expense_category.php");

?>