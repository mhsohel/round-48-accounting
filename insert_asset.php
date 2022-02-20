<?php
include('inc/database.php');
$title = $_POST['title'];
$note = $_POST['note'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$type = $_POST['type'];
$txn_type = $_POST['txn_type'];
$head = $_POST['account_head'];
$people = $_POST['people_id'];
$Fixed_type=$_POST['Fixed_type'];
//echo $Fixed_type;


 $p="insert into transactions values(null,'$head','$note','$txn_type','$people','$amount','$date')";
 $db->query($p);
$txn_id=$db->insert_id;
 
// //echo ($title.$note.$amount.$date.$type);
if(isset($Fixed_type)){
    $q = "insert into assets values(null,'$title','$note',$amount,'$date','$type','$Fixed_type','$txn_id')";
    $db->query($q);
}else{
    $q = "insert into assets values(null,'$title','$note',$amount,'$date','$type','NULL','$txn_id')";
    $db->query($q);
}
 
 header('Location:asset_list.php');



?>