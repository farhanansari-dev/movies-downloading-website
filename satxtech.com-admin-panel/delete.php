<?php
require('admin_components/check_login.php');
require('./admin_components/_dbconnect.php');
if ($_SERVER['REQUEST_METHOD']=='GET') {
  $movie_id = htmlspecialchars(mysqli_real_escape_string($conn,$_GET['movie_id']));
  $sql_delete_query = 'DELETE FROM movies_details WHERE movie_id = '.$movie_id.'';
  $del_result = mysqli_query($conn,$sql_delete_query); 
  header('location : manage.php');
}
?>