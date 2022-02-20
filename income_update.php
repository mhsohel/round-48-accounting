<?php 
include 'inc/database.php';


// $Z = $_POST['stivejobs'];
// $Y = $_POST['title'];
// $X = $_POST['note'];
// $W = $_POST['people_id'];
// $v = $_POST['amount'];
// $u = $_POST['date'];
// $t = $_POST['txn_id'];



// $db->query("update income set title='$Y',note='$X',people_id=$W,amount=$v,date='$u',txn_id=$t where id=$Z");

// header('Location:income_show.php');
?>

<?php
                           $title = $_POST['title'];
                           // $id = $_POST['id'];
                           $txn_id = $_POST['txn_id'];
                           $note = $_POST['note'];
                           $people_id = $_POST['people_id'];
                           $amount = $_POST['amount'];
                           $date = $_POST['date'];
                           $account_head = $_POST['account_head'];
    
    $del = "DELETE FROM transactions WHERE id='$txn_id'";
    $q = $db->query($del);

     $sql = "INSERT INTO transactions(account_head_id, note, txn_type, people_id,amount, date) VALUES ('$account_head','$note','credit','$people_id','$amount','$date')";
    $query = $db->query($sql);
   $txn_id = $db->insert_id;


    $db->query("INSERT INTO `income`(title,note, people_id, amount, date, txn_id) VALUES ('$title','$note','$people_id','$amount','$date','$txn_id')");

                           header('Location:income_show.php');
                        ?>
