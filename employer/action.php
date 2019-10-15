<?php
if(isset($_GET['aId'])){
 include_once("../class/crud.php"); 
	$getID=$_GET['aId'];
  $getID = filter_var($getID, FILTER_SANITIZE_STRING);
     $getID = preg_replace("/&#?[a-z0-9]{2,8};/i","",$getID);
	$appStatus="Approved";
              $crud = new Crud();

$result = $crud->execute("UPDATE application SET appStatus='$appStatus' WHERE appId=$getID");
              if($result){
                header('location:applications.php');
              }

}
elseif(isset($_GET['dId'])){
	include_once("../class/crud.php"); 
	$getID=$_GET['dId'];
   $getID = filter_var($getID, FILTER_SANITIZE_STRING);
     $getID = preg_replace("/&#?[a-z0-9]{2,8};/i","",$getID);
	$appStatus="Declined";
              $crud = new Crud();

$result = $crud->execute("UPDATE application SET appStatus='$appStatus' WHERE appId=$getID");
              if($result){
                header('location:applications.php');
              }
}
else
{
	header('location:applications.php?m=error dId not set or aId not set');
	
}
?>