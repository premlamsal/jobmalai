<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<?php
if (isset($_GET['id'])) {
//including the database connection file
include_once("../class/crud.php");
 $eId=$_SESSION['eId'];
 $crud = new Crud();
 $id=$_GET['id'];
  $id = filter_var($id, FILTER_SANITIZE_STRING);
     $id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);
//fetching data in descending order (lastest entry first)
$query ="SELECT * From jobs WHERE jId='$id'";
$result = $crud->getData($query);
if($result){

     foreach ($result as $key => $res) {
      $jId= $res['jId'] ; 
      $jName= $res['jName'] ; 
      $jExperience= $res['jExperience'] ; 
      $jQualification= $res['jQualification'] ; 
      $jExtraDetails= $res['jExtraDetails'] ; 
      $jEndDate= $res['jEndDate'] ; 
      $jLevel= $res['jLevel'] ; 
      $jTotalNo= $res['jTotalNo'] ; 
      $jLocation= $res['jLocation'] ; 
      $jGenderPreffered= $res['jGenderPreffered'] ; 
      $jRequirement= $res['jRequirement'] ; 
      $jSalary= $res['jSalary'] ; 
      $catName= $res['catName'] ; 
      $getCatName= $res['catName'] ; 
       
      }
    }
}
?>
  

<form method="post" style="width: 80%; margin-left: 20px;" enctype="multipart/form-data" action="editJob_action.php">

     <div class="form-group">
      <label for="Job Category" >Job Category</label>
    <SELECT name="catName" class="form-control">Select Gender
  <?php

     //including the database connection file
      include_once("../class/crud.php");
       $eId=$_SESSION['eId'];
       $crud = new Crud();
       
      //fetching data in descending order (lastest entry first)
      $query ="SELECT catId, catName FROM jobcat";
      $result = $crud->getData($query);


   if($result){
 foreach ($result as $key => $res) {
  $catId= $res['catId'] ; 
  $catName= $res['catName'] ; 
                   if($catName==$getCatName){
                    echo "<option value='$catName' selected=''> $catName</option>"; 
                  }
                  else{
                     echo "<option value='$catName'> $catName</option>";
                  }
}
   }  
     ?>
    
  
    </SELECT>

      </div>


  <div class="form-group">
    <label for="Job Name/ Title">Job Name/ Title </label>
     <input type="hidden" class="form-control" name="getID" value="<?=$jId?>">
    <input type="text" class="form-control"  placeholder="Enter Name" name="jName" value="<?=$jName?>">
  </div>
  
  <div class="form-group">
    <label for="Job Experience">Job Experience</label>
    <textarea class="form-control content" name="jExperience" rows="3"><?=$jExperience?></textarea>
  </div>
   <div class="form-group">
    <label for="Job Requirement">Job Requirement</label>
    <textarea class="form-control content2" name="jRequirement"><?=$jRequirement?></textarea>
  </div>
   <div class="form-group">
    <label for="Job Qualification">Job Qualification</label>
    <textarea class="form-control content3" name="jQualification"><?=$jQualification?></textarea>
  </div>
  <div class="form-group">
    <label for="Job Extra Details">Job Extra Details</label>
    <textarea class="form-control content4" name="jExtraDetails"><?=$jExtraDetails?></textarea>
  </div>
  <div class="form-group">
    <label for="job End Date">Job End Date</label>
    <input type="date" class="form-control"  placeholder="Enter Job End Date" name="jEndDate" value="<?=$jEndDate?>">
  </div>
   <div class="form-group">
    <label for="job level">Job Level</label>
    <input type="text" class="form-control"  placeholder="Enter Job Level" name="jLevel" value="<?=$jLevel?>">
  </div>
  <div class="form-group">
    <label for="job level">Job Location</label>
    <input type="text" class="form-control"  placeholder="Enter Job Location" name="jLocation" value="<?=$jLocation?>">
  </div>
   <div class="form-group">
    <label for="job level">Job Salary</label>
    <input type="number" class="form-control"  placeholder="Enter Salary" name="jSalary" value="<?=$jSalary?>">
  </div>
   <div class="form-group">
    <label for="Job Opening">Job Opening(Total No of Post for this Job)</label>
    <input type="number" class="form-control" name="jTotalNo" value="<?=$jTotalNo?>">
  </div>

  <div class="form-group">
    <label for="Gender">Gender Preferred</label>
<SELECT name="jGenderPreffered">Select Gender
	<?php 
	if ($jGenderPreffered=="Male") {
	   echo "<option selected='' value='Male'>Male </option>
		<option value='Female'>Female</option>
		<option value='Any'>Any</option>";
	}
	elseif ($jGenderPreffered=="Female") {
	echo "<option value='Male'>Male </option>
		<option value='Female' selected=''>Female</option>
		<option value='Any'>Any</option>";
	}
	elseif($jGenderPreffered=="Any"){
		echo "<option value='Male'>Male </option>
		<option value='Female' >Female</option>
		<option value='Any' selected=''>Any</option>";
	}
?>
</SELECT>

  </div>


  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="termsConditions">I accept Terms & Conditions</label>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<?php include('includes/footer.php'); ?>