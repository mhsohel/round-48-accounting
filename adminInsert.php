<?php
include 'inc/database.php';
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$status=$_POST['status'];
$query="insert into admin values (NULL,'$name','$email','$password','$status')";
$db->query($query);
header("location:admin.php");

?>

