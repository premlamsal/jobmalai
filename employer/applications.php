<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<div class="alert alert-primary" role="alert">
Please review the application. Accpet or Decline the Job sent by Job Seeker.
</div>
<?php
//including the database connection file
include_once("../class/crud.php");
 $eId=$_SESSION['eId'];
$crud = new Crud();
$appStatus="Sent";

//fetching data in descending order (lastest entry first)
$query ="SELECT * FROM application WHERE eId='$eId' and appStatus='$appStatus'";
$result = $crud->getData($query);

?>
<div class="row">
  <?php

if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) { 
     $appId= $res['appId'] ; 

       $appTitle= $res['appTitle'] ; 
   $appDate= $res['appDate'] ;    
   $appSubject= $res['appSubject'] ;    
   $appStatus= $res['appStatus'] ;    
   $jsId= $res['jsId'] ;    
   echo "<div class='col-sm-6'>
    <div class='card'>
      <div class='card-body'>
        <h5 class='card-title'>$appTitle</h5>
        <p class='card-text'>$appSubject</p>
        <p style='color:gray;'>$appDate</p>
         
     <a href='action.php?aId=$appId' class='btn btn-success'>Approve</a>
  
    
  <a href='action.php?dId=$appId' class='btn btn-danger'>Decline</a>
    
    <a href='jsprofile.php?jsId=$jsId' class='btn btn-primary'>View Applicat Profile</a>

</div>
</div>
</div>";
 }
}
else{
  echo "No data fetched";
}
?>


<?php include('includes/footer.php'); ?>