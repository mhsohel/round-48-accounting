<?php 
include 'inc/database.php';

$db->query("DELETE FROM `transactions` WHERE id=".$_GET['id']);
header('Location: transactionList.php');




?>