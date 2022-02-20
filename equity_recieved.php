<?php 
include ('inc/database.php');
// print_r($db);
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$z=$_POST['acc'];
$x=$_POST['txn'];
$y=$_POST['pol'];
print_r($_POST);
// $sql="INSERT INTO equity(title,note,amount,date)VALUES('$a','$b',$c,'$d')";
$tan="INSERT INTO `transactions`(`id`, `account_head_id`, `note`, `txn_type`, `people_id`, `amount`, `date`) VALUES (NULL,$z,'$b','$x',$y,$c,'$d')";
$db->query($tan);
$s=$db-> insert_id;
echo $s;

  $sql="INSERT INTO `equity`(`id`, `title`, `note`, `amount`, `date`,`txn_id`) VALUES (NULL,'$a','$b',$c,'$d',$s)";

  $db->query($sql);



  header('Location:equity_list.php');
 ?>