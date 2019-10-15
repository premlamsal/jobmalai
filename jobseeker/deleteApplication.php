<?php
if (isset($_GET['delAppId'])) {
//including the database connection file
include_once("../class/crud.php");
$crud = new Crud();
//getting id of the data from url
$id = $crud->escape_string($_GET['delAppId']);
$id = filter_var($id, FILTER_SANITIZE_STRING);
$id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);
 
//deleting the row from table
$result = $crud->execute("DELETE FROM application WHERE appId=$id");

 
if ($result) {
    //redirecting to the display page (index.php in our case)
    header("Location:applications.php");
}


}

?>