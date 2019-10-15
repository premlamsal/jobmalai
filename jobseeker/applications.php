<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<div class="alert alert-primary" role="alert">
You will see sent Application & It's status here. You will get call or Notification once your application is approved.
</div>
<?php
//including the database connection file
include_once("../class/crud.php");
 $jsId=$_SESSION['jsId'];
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query ="SELECT application.appId, application.appTitle, application.appDate,application.appSubject,application.appStatus, employer.eName, employer.eWebsite FROM application INNER JOIN employer ON application.eId=employer.eId WHERE application.jsId='$jsId'";
$result = $crud->getData($query);

?>

<div class="row">
  <?php

if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
       $appTitle= $res['appTitle'] ; 
       $appId= $res['appId'] ; 
   $appDate= $res['appDate'] ;    
   $appSubject= $res['appSubject'] ;    
   $appStatus= $res['appStatus'] ;    
   $eWebsite= $res['eWebsite'] ;    
   $eName= $res['eName'] ;    
   echo "<div class='col-sm-6'>
    <div class='card'>
      <div class='card-body'>
        <h5 class='card-title'>$appTitle</h5>";
          echo "<p><a href='$eWebsite' style='color:blue;font-size:12px'> $eName</a></p>";
       echo  "<p class='card-text'>$appSubject</p>
        <p style='color:gray;'>$appDate</p>";
      
                if($appStatus=="Approved"){
                echo "<a href='#' class='btn btn-success' style='margin-left:5px'>$appStatus</a>";
              }
              elseif($appStatus=="Declined"){
                echo "<a href='#' class='btn btn-danger' style='margin-left:5px'>$appStatus</a>";
              }
              else{
                echo "<a href='#' class='btn btn-primary' style='margin-left:5px'>$appStatus</a>";
              }
               echo "<a href='deleteApplication.php?delAppId=$appId' class='btn btn-primary' style='margin-left:5px'>Delete Application</a>";
      echo "</div>
    </div>
  </div> ";


 }
}
else{
  echo "No data fetched";
}
?>

 
<?php include('includes/footer.php'); ?>