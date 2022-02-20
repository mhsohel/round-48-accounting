<?php
include 'inc/database.php';
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$status=$_POST['status'];
$query="UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password',`status`='$status' WHERE id=$id";
$db->query($query);
header("location:admin.php");

?>
