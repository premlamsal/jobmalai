
<?php
include_once("../../class/crud.php");

 $crud = new Crud();

$query ="SELECT jobs.jId,jobs.jName,employer.eId,employer.eName FROM jobs INNER JOIN employer ON jobs.eId=employer.eId ORDER BY jobs.jId DESC LIMIT 12";
$result = $crud->getData($query);

if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
     $jId= $res['jId'] ; 
     $jName= $res['jName'] ; 
     $eId= $res['eId'] ; 
     $eName= $res['eName'] ; 
   
   echo "<div class='col-md-3'>
				 
				<div class='card customCard'>

				  <div class='card-body custom-card-body '>
				    <h6 class='card-title'>$jName</h6>
				    <h6 class='card-subtitle mb-2 text-muted'>$eName</h6>
				
				    <a href='applyJob.php?jobid=$jId' class='card-link'>Apply</a>
				    <a href='showjobs.php?id=$jId' class='card-link'>View</a>
				  </div>
				</div>
			</div>";
     }
 }

?>