<?php
include('inc/database.php');
$a=$_POST['title'];
$b=$_POST['note'];
$c=$_POST['people'];
$d=$_POST['amount'];
$e=$_POST['date'];
$f=$_POST['state'];
$gg=$_POST['acc_head'];
$hh=$_POST['type'];
// print_r($_POST);
$insert_txn = "INSERT INTO transactions(account_head_id,note,txn_type,people_id,amount,date) VALUES($gg,'$b','$hh',$c,$d,'$e')";
	$db->query($insert_txn);
	$txn_id = $db->insert_id;
$raw=$db->query("insert into liability values (null,'$a','$b','$c',$d,'$e','$f',$txn_id)"); 
// $raww=$db->query("insert into transactions values (null,$gg,'$b','$hh',$c,$d,'$e',)");
$db->close();
header("Location:liability_show.php");
?>
