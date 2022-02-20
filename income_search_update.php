<?php 
include 'inc/database.php';


$Z = $_POST['stivejobs'];
$Y = $_POST['title'];
$X = $_POST['note'];
$W = $_POST['people_id'];
$v = $_POST['amount'];
$u = $_POST['date'];
$t = $_POST['txn_id'];



$db->query("update income set title='$Y',note='$X',people_id=$W,amount=$v,date='$u',txn_id='$t' where id=$Z");

header('Location:income_show.php');
?>