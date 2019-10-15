<?php
if(isset($_GET['id'])){
//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 
//getting id of the data from url
$id = $crud->escape_string($_GET['id']);
 $id = filter_var($id, FILTER_SANITIZE_STRING);
     $id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);
 
//deleting the row from table
$result = $crud->execute("DELETE FROM jobs WHERE jId=$id");

 
if ($result) {
    //redirecting to the display page (index.php in our case)
    header("Location:jobs.php");
}
}
?>


 