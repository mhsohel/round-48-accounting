<?php
include('inc/database.php');
$db->query('delete from transactions where id=' . $_POST['txn_id']);
$id = $_POST['id'];
$title = $_POST['title'];
$note = $_POST['note'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$type = $_POST['type'];
$dep_rate = $_POST['Fixed_type'];
$head=$_POST['account_head'];
$txn_type=$_POST['txn_type'];
$people=$_POST['people_id'];
//echo ($title.$note.$amount.$date.$type);
 $p="insert into transactions values(null,'$head','$note','$txn_type','$people','$amount','$date')";
 $db->query($p);
 $txn_id=$db->insert_id;
 
//echo ($title.$note.$amount.$date.$type);
$q = "insert into assets values(null,'$title','$note',$amount,'$date','$type','$Fixed_type','$txn_id')";
$db->query($q);

header('Location:asset_list.php');

?>