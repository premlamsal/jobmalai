<?php
//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM JobSeeker ";
$result = $crud->getData($query);

if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
       $id= $res['jsId'] ; 
   $jsName= $res['jsName'] ;     
}
?>