<?php
include('inc/database.php');
$id=$_GET['id'];
// $conn=new mysqli('localhost','root','','accounting');
$db->query("delete from people where id=$id");
//print_r($infor);
header('Location:people_show.php');  