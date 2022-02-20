<?php 
include 'inc/database.php';
$accountHeadID = $_POST['accountHead'];
$note = $_POST['note'];
$txnType = $_POST['txnType'];
$peopleID = $_POST['peopleId'];
$amount = $_POST['amount'];
$date = $_POST['date'];
if($accountHeadID!='' && $note!='' && $txnType!='' && $amount!='' && $date!=''){
   
    $db->query("INSERT INTO transactions VALUES(NULL,$accountHeadID,'$note','$txnType',$peopleID,$amount,'$date')");
    header('Location: transactionList.php');
}else{
    header('Location: transactions.php');
}





?>