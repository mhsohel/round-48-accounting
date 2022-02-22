<?php 

include 'inc/database.php';
$category=$_POST['category'];

$status=$_POST['status'];
$query="insert into expense_category values (NULL,'$category','$status')";
$db->query($query);
header("location:expense_category.php");

?>