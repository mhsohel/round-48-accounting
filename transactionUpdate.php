<?php 
$accountHeadID = $_POST['accountHead'];
$note = $_POST['note'];
$txnType = $_POST['txnType'];
$peopleID = $_POST['peopleId'];
$amount = $_POST['amount'];
$date = $_POST['date'];
if($accountHeadID!='' && $note!='' && $txnType!='' && $amount!='' && $date!=''){
    $conn = new mysqli('localhost','root','','accounting');
    $conn->query("UPDATE `transactions` SET `account_head_id`=$accountHeadID,`note`='$note',`txn_type`='$txnType',`people_id`=$peopleID,`amount`=$amount,`date`='$date' WHERE id=".$_POST['id']);
    header('Location: transactionList.php');
}else{
    header('Location: transactionList.php');
}