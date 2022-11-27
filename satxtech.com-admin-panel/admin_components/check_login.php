<?php
session_start();
if (!isset($_SESSION['loggedin']) && $_SERVER['loggedin'] != true) {
  header('location:login.php');
  exit();
}
?>
