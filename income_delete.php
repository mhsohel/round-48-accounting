<?php 
include 'inc/database.php';

?>

<?php

$G = $_GET['id'];

// $show = $db->query("delete from income where id=$G");


$show = $db->query("delete from transactions where id=$G");

// $qw = $db->query("DELETE FROM `transactions` WHERE 0")


header('Location:income_show.php');

?>

