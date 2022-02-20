<?php
include('inc/database.php');
$id=$_GET['id'];
$q = "delete from assets where id='$id'";
$data = $db->query($q);
header('Location:asset_list.php');

?>