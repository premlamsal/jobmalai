<?php
session_start();
if(!isset($_SESSION['uEmail'])){
header('location:login.php');
}
?>