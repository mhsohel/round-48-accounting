<?php
include 'inc/database.php'; 
if (isset($_POST['submit'])) {
	$category_id = $_POST['category_id'];
	$people_id = $_POST['people_id'];
	$date = $_POST['date'];
	$title = $_POST['title'];
	$amount = $_POST['amount'];
	$head_id = $_POST['head_id'];
	$note = $_POST['note'];

	$insertTransectionSql = "INSERT INTO transactions(account_head_id,note,txn_type,people_id,amount,date) VALUES($head_id,'$note','credit',$people_id,$amount,'$date')";
	$db->query($insertTransectionSql);
	$txn_id=$db->insert_id;

	$insertExpensSql = "INSERT INTO expense(category_id,title,note,people_id,amount,date,txn_id) VALUES($category_id,'$title','$note',$people_id,$amount,'$date',$txn_id)";
	$insertRes = $db->query($insertExpensSql);

	if($insertRes) {
		header('Location:expense_list.php');
	}
}
?>