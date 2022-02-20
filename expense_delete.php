<?php
include 'inc/database.php'; 
if (isset($_GET['delId'])) {
    $delId = $_GET['delId'];
    $delSql = "DELETE FROM expense WHERE id = $delId";
    $delRes = $db->query($delSql);
    if($delRes) {
        header("Location:expense.php");
    }
}
?>