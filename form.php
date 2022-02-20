<?php
include 'inc/database.php';
 $type = $_POST['type'];
 $name = $_POST['name'];
$q = "insert into account_heads values(null,'$type','$name')";
$db->query($q);
header("Location:account_heads_list.php");
?>