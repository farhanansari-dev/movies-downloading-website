<?php
require('admin_components/check_login.php');
require('./admin_components/_dbconnect.php');
if ($_SERVER['REQUEST_METHOD']=='GET') {
  $message_id = htmlspecialchars(mysqli_real_escape_string($conn,$_GET['message_id']));
  $sql_delete_query = 'DELETE FROM user_messages WHERE message_id = '.$message_id.'';
  $del_result = mysqli_query($conn,$sql_delete_query);
  if ($del_result) {
    //header('location : messages.php?message_subject='.htmlspecialchars(mysqli_real_escape_string($conn,$_GET['message_subject'])).'');
    header('location:messages.php');
  }else {
    header('location:index.php');
  }
}
?>
