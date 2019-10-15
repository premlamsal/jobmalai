<?php
session_start();
if(!isset($_SESSION['jsEmail'])){
header('location:login.php');
}
?>