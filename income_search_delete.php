<?php 
include 'inc/database.php';

?>

<?php

$G = $_GET['id'];

$show = $db->query("delete from transactions where id=$G");

header('Location:income_show.php');

?>
