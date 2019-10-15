<?php
include_once("../../class/crud.php");

 $crud = new Crud();

$query ="SELECT eId,eName,eWebsite,eLogo FROM employer";
$result = $crud->getData($query);

if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
     $eId= $res['eId'] ; 
     $eName= $res['eName'] ; 
     $eWebsite= $res['eWebsite'] ;
     $eLogo= $res['eLogo'] ;
     $eLogo=substr($eLogo, 3);

        echo "<div class='col-md-3'>	
					   	<a href='employer.php?id=$eId'>
							<div class='card EmployersCard'>
							     <img class='card-img-top' src='$eLogo'>
									    <h6 class='card-title'>$eName</h6>
									  
									 </div>
							</div>
						</a>
						</div>";



     }
 }

?>