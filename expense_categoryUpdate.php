<?php 

include 'inc/database.php';
$id=$_POST['id'];
$name=$_POST['c_name'];

$status=$_POST['status'];
$query="UPDATE `expense_category` SET `category`='$name',`status`='$status' WHERE id=$id";
$db->query($query);
header("location:expense_category.php");

?>
