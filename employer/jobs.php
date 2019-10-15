<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

<div class="alert alert-primary" role="alert">
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Job</a>
</div>
<?php
if (isset($_POST['jName'])) {
    $jName=stripslashes($_POST['jName']);
    $jName=strip_tags($jName);

    $jExperience=stripslashes($_POST['jExperience']);
    $jExperience=strip_tags($jExperience,'<br/><br><ul><li>');

    $jQualification=stripslashes($_POST['jQualification']);
    $jQualification=strip_tags($jQualification,'<br/><br><ul><li>');

    $jExtraDetails=stripslashes($_POST['jExtraDetails']);
    $jExtraDetails=strip_tags($jExtraDetails,'<br/><br><ul><li>');

    $catName=stripslashes($_POST['catName']);
    $catName=strip_tags($catName);

    $jEndDate=stripslashes($_POST['jEndDate']);
    $jEndDate=strip_tags($jEndDate);
    $jPosted=date('Y-m-d h:m:s');

    $jLevel=stripslashes($_POST['jLevel']);
    $jLevel=strip_tags($jLevel);

    $jLocation=stripslashes($_POST['jLocation']);
    $jLocation=strip_tags($jLocation);

    $jTotalNo=stripslashes($_POST['jTotalNo']);
    $jTotalNo=strip_tags($jTotalNo);


    $jRequirement=stripslashes($_POST['jRequirement']);
    $jRequirement=strip_tags($jRequirement,'<br/><br><ul><li>');

    $jSalary=stripslashes($_POST['jSalary']);
    $jSalary=strip_tags($jSalary);


    $jGenderPreffered=stripslashes($_POST['jGenderPreffered']);
    $jGenderPreffered=strip_tags($jGenderPreffered);
   include_once("../class/crud.php");    
              $crud = new Crud();
     $eId=$_SESSION['eId'];
$result = $crud->execute("INSERT INTO jobs(jName,jExperience,jQualification,jExtraDetails,jEndDate,jLevel,jLocation,jGenderPreffered,jTotalNo,catName,jPosted,eId,jSalary,jRequirement) VALUES('$jName','$jExperience','$jQualification','$jExtraDetails','$jEndDate','$jLevel','$jLocation','$jGenderPreffered','$jTotalNo','$catName','$jPosted','$eId','$jSalary','$jRequirement')");
              if($result){
                       echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Hurray!! </strong> You have successfully Added new Job.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div>";

              }



}



?>
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
     $jId= $res['jId'] ; 
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
     $jRequirement= $res['jRequirement'] ;   
     $jSalary= $res['jSalary'] ;   




   echo "<div class='col-sm-6' style='margin-bottom:30px;'>
    <div class='card'>
      <div class='card-body'>
        <h5 class='card-title'>$jName</h5>
           <p style='color:gray;'><span style='color:#000'>Level: </span>$jLevel</p>
             <p class='card-text' style='color:gray;'><span style='color:#000'>Salary: </span>$jSalary</p>
         <p class='card-text' style='color:gray;'><span style='color:#000'>Requirement:</span> $jRequirement</p>
          <hr>
         <p class='card-text' style='color:gray;'><span style='color:#000'>Gender Preffred: </span>$jGenderPreffered</p>
          <hr>
          <p class='card-text' style='color:gray;'><span style='color:#000'>Qualification:</span> $jQualification</p>
           <hr>
          <p class='card-text' style='color:gray;'> <span style='color:#000'>Experience:</span>$jExperience</p>
         <hr>
                    <p class='card-text' style='color:gray;'><span style='color:#000'>Extra Details:</span> $jExtraDetails</p>
                     <hr>
                    <p class='card-text' style='color:gray;'><span style='color:#000'>Location:</span> $jLocation</p>
                     <hr>
                    <p class='card-text' style='color:gray;'><span style='color:#000'>No. of Opening:</span> $jTotalNo</p>
          <p class='card-text' style='color:gray;'><span style='color:#000'>Post Date:</span> $jPosted</p>
        <p class='card-text' style='color:gray;'><span style='color:#000'>End Date:</span> $jEndDate</p>
     
    

        <a href='deleteJob.php?id=$jId' class='btn btn-danger'>Delete</a>
         <a href='editJob.php?id=$jId' class='btn btn-primary'>Edit</a>
         <a href='../showjobs.php?id=$jId' class='btn btn-success'>View Job in Public View</a>
        

      </div>
    </div>
  </div> ";
 }
}
else{
  echo " <span style='margin-left:20px;'>No data</span>";
}
?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Job?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
<?php
//including the database connection file
include_once("../class/crud.php");
 $eId=$_SESSION['eId'];
 $crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query ="SELECT catId, catName FROM jobcat";
$result = $crud->getData($query);

?>
     <div class="form-group">
      <label for="Job Category" >Job Category</label>
    <SELECT name="catName" class="form-control">Select Gender
  <?php
   if($result){
 foreach ($result as $key => $res) {
  $catId= $res['catId'] ; 
  $catName= $res['catName'] ; 
   
    echo "<option value='$catName'> $catName</option>"; 
  }
}
     
     ?>
    
  
    </SELECT>

      </div>



  <div class="form-group">
    <label for="Job Name/ Title">Job Name/ Title </label>
    <input type="text" class="form-control"  placeholder="Enter Name" name="jName">
  </div>
  
  <div class="form-group">
    <label for="Job Experience">Job Experience</label>
    <textarea class="form-control content" name="jExperience" rows="4" cols="50"></textarea>
  </div>
    <div class="form-group">
    <label for="Job Requirement">Job Requirement</label>
    <textarea class="form-control content2" name="jRequirement"></textarea>
  </div>
   <div class="form-group">
    <label for="Job Qualification">Job Qualification</label>
    <textarea class="form-control content3" name="jQualification"></textarea>
  </div>
  <div class="form-group">
    <label for="Job Extra Details">Job Extra Details</label>
    <textarea class="form-control content4" name="jExtraDetails"></textarea>
  </div>
  <div class="form-group">
    <label for="job End Date">Job End Date</label>
    <input type="date" class="form-control"  placeholder="Enter Job End Date" name="jEndDate">
  </div>
   <div class="form-group">
    <label for="job level">Job Level</label>
    <input type="text" class="form-control"  placeholder="Enter Job Level" name="jLevel">
  </div>
  <div class="form-group">
    <label for="job level">Job Location</label>
    <input type="text" class="form-control"  placeholder="Enter Job Location" name="jLocation">
  </div>
   <div class="form-group">
    <label for="Job Opening">Job Opening(Total No of Post for this Job)</label>
    <input type="number" class="form-control" name="jTotalNo">
  </div>
  <div class="form-group">
    <label for="Job Salary">Job Salary</label>
    <input type="number" class="form-control" name="jSalary">
  </div>

  <div class="form-group">
    <label for="Gender">Gender Preferred</label>
<SELECT name="jGenderPreffered">Select Gender
<option selected="" value="Male">Male </option>
<option value="Female">Female</option>
<option value="Any">Any</option>
</SELECT>

  </div>


  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="termsConditions">I accept Terms & Conditions</label>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          
          </div>
        </div>
      </div>
    </div>


<?php include('includes/footer.php'); ?>