

<?php 
include('inc/database.php');
$id=$_POST['id'];
$name=$_POST['name']; 
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address']; 
$company=$_POST['company'];
$status=$_POST['status'];
// $conn=new mysqli('localhost','root','','accounting');
$infor="update people set name='$name',email='$email',phone='$phone',address='$address',company='$company',status='$status' where id=$id";
$con=$db->query($infor);
echo($infor);
header('Location:people_show.php');
