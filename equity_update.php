<?php 

include ('inc/database.php');

$title=$_POST['a'];
$note=$_POST['b'];
$amount=$_POST['c'];
$date=$_POST['d'];
$id=$_POST['id'];


 //$db->query("update equity set title='$title',note='$note',amount=$amount,date='$date'where id=$id");
$db->query("UPDATE `equity` SET `title`='$title',`note`='$note',`amount`='$amount',`date`='$date' WHERE id=$id");


header('Location:equityy.php');


?>