<?php
include_once("../../class/crud.php");

 $crud = new Crud();

$query ="SELECT catId,catName FROM jobcat";
$result = $crud->getData($query);

if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
     $catId= $res['catId'] ; 
     $catName= $res['catName'] ; 

     echo "<div class='col-md-2'>
					 
							 	<a href='jobs.php?cat=$catName'>
						<div class='card carCard'>
							  <div class='card-body custom-card-body '>
							    $catName
							   
							  </div>
							</div>
						</a>
				</div>";
     }
 }

?>