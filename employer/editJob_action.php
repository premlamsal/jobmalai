<?php
if(isset($_POST['getID'])){
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
$getID=$_POST['getID'];
 $getID = filter_var($getID, FILTER_SANITIZE_STRING);
     $getID = preg_replace("/&#?[a-z0-9]{2,8};/i","",$getID);
              $crud = new Crud();
$result = $crud->execute("UPDATE jobs SET jName='$jName',jExperience='$jExperience',jQualification='$jQualification',jExtraDetails='$jExtraDetails',jTotalNo='$jTotalNo',jEndDate='$jEndDate',jLevel='$jLevel',jPosted='$jPosted',jLocation='$jLocation' ,jRequirement='$jRequirement',jGenderPreffered='$jGenderPreffered',jSalary='$jSalary',catName='$catName' WHERE jId=$getID");
              if($result){
                header('location:jobs.php');
              }

    }
?>
