<?php
session_start();
if(!isset($_SESSION['eEmail'])){
header('location:login.php');
}
?>