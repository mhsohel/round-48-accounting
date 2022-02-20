<?php 
include('inc/database.php');
 $name=$_POST['name']; 
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $address=$_POST['address']; 
 $company=$_POST['company'];
 $status=$_POST['status'];


// $conn=new mysqli('localhost','root','','accounting');
$infor="INSERT INTO `people` (`id`, `name`, `email`, `phone`,`address`,`company`,`status`) values(null,'$name','$email','$phone','$address','$company','$status')";
$db->query($infor);
echo($infor);
header('Location:people_show.php');
