<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<div class="alert alert-primary" role="alert">
Please review the application sent by JobSeeker. Approve or Decline as per your requirement.
</div>
<?php
//including the database connection file
include_once("../class/crud.php");
 $eId=$_SESSION['eId'];
 $crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query ="SELECT * FROM jobs WHERE eId='$eId'";
$result = $crud->getData($query);

?>

<div class="row">
  <?php

if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
     $jName= $res['jName'] ; 
     $jEndDate= $res['jEndDate'] ;  
     $jType= $res['jType'];

     $jLevel= $res['jLevel'] ;    
     $jExperience= $res['jExperience'] ;   
     $jLocation= $res['jLocation'] ;   
     $jTotalNo= $res['jTotalNo'] ;   
     $jGenderPreffered= $res['jGenderPreffered'] ;   
     $jQualification= $res['jQualification'] ;   
     $jPosted= $res['jPosted'] ;   
     $jExtraDetails= $res['jExtraDetails'] ;   




   echo "<div class='col-sm-6' style='margin-bottom:30px;'>
    <div class='card'>
      <div class='card-body'>
        <h5 class='card-title'>$jName</h5>
           <p style='color:gray;'>Level: $jLevel</p>
            
        
         <p class='card-text' style='color:gray;'>Gender Preffred: $jGenderPreffered</p>
          <p class='card-text' style='color:gray;'>Qualification: $jQualification</p>
          <p class='card-text' style='color:gray;'>Experience: $jExperience</p>
                    <p class='card-text' style='color:gray;'>Extra Detials: $jExtraDetails</p>
                    <p class='card-text' style='color:gray;'>Location: $jLocation</p>
                    <p class='card-text' style='color:gray;'>No. of Opening: $jTotalNo</p>
          <p class='card-text' style='color:gray;'>Post Date: $jPosted</p>
        <p class='card-text' style='color:gray;'>End Date: $jEndDate</p>
     
    
       
         <a href='#' class='btn btn-primary'>Edit</a>
        

      </div>
    </div>
  </div> ";
 }
}
else{
  echo "No data fetched";
}
?>


<?php include('includes/footer.php'); ?>