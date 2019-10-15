<?php
if(isset($_GET['id'])){
//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();

//getting id of the data from url
$id = $crud->escape_string($_GET['id']);

 
//deleting the row from table
$result = $crud->execute("DELETE FROM jobseeker WHERE jsId=$id");

 
if ($result) {
    //redirecting to the display page (index.php in our case)
    header("Location:jobseeker.php");
}
}
?>


 