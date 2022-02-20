<?php 
include 'inc/database.php';

?>

                        <?php
                           $title = $_POST['title'];
                           $note = $_POST['note'];
                           $people_id = $_POST['people_id'];
                           $amount = $_POST['amount'];
                           $date = $_POST['date'];
                           $account_head = $_POST['account_head'];
                       
                           


               

    $sql = "INSERT INTO transactions(account_head_id, note, txn_type, people_id,amount, date) VALUES ('$account_head','$note','credit','$people_id','$amount','$date')";
    $query = $db->query($sql);
   $txn_id = $db->insert_id;


    $db->query("INSERT INTO `income`(title,note, people_id, amount, date, txn_id) VALUES ('$title','$note','$people_id','$amount','$date','$txn_id')");

                           header('Location:income_show.php');
                        ?>



                   