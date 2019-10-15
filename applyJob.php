<?php
if (isset($_GET['jobid'])) {
		$jobid=$_GET['jobid'];
		$jobid = filter_var($jobid, FILTER_SANITIZE_STRING);
		$jobid = preg_replace("/&#?[a-z0-9]{2,8};/i","",$jobid);

session_start();
		if(isset($_SESSION['jsEmail'])){
 
 			$jobid=$_SESSION['jobId'];

			//including the database connection file
			include_once("class/crud.php");
			$crud = new Crud(); 
			//fetching data in descending order (lastest entry first)
			$query ="SELECT * FROM jobs WHERE jId='$jobid'";
			$result = $crud->getData($query);

			 if($result){
			         foreach ($result as $key => $res) {

		
			            //while($res = mysqli_fetch_array($result)) {  
			               $jId= $res['jId'];
			               $jName= $res['jName'];      
			               $catName= $res['catName'];   
			               $eId= $res['eId'];   
			               $appDate=date('Y-m-d h:m:s');
			               $jsId=$_SESSION['jsId'];
			               $appSubject="I would like to Apply for this Job. Please review my CV. Thank You!";
			               $appStatus="Sent"; 
			               }  

			      //including the database connection file
			include_once("class/crud.php");
			$crud = new Crud(); 

			//fetching data in descending order (lastest entry first)
			
$result = $crud->execute("INSERT INTO application(appTitle,appSubject,appDate,appStatus,eId,jsId,catName,jId) VALUES('$jName','$appSubject','$appDate','$appStatus','$eId','$jsId','$catName','$jId')");       
						if($result){

							header('location:jobseeker/index.php?appliedJob=ok');

						}


			           } 





		
		}
		else{
			$action="ApplyJobOk";
			$_SESSION['jobId']=$jobid;
		   header('location:jobseeker/login.php');
		

		}
}
else{
	header('location:error.php');
}

?>
