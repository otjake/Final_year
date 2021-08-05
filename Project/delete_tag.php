<?php
include("includes/header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //selects all from posts where id is post id

    //deletes from posts table
    $delete_sql = "DELETE FROM masters_tb WHERE master_id={$id} LIMIT 1";
    $result_delete = mysqli_query($connection, $delete_sql);
    if ($result_delete == 1) {
        echo "<script>alert('tag deleted')</script>";
        page_redirect('all_tags.php?dmessage=correct');
    } else {
        echo "<script>alert('unable to delete')</script>";
        page_redirect('all_tags.php?dmessage=error');
    }
}
