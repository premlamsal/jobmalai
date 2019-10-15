<?php
if (isset($_GET['id'])) {
      //including the database connection file
    include_once("class/crud.php");
     $id=$_GET['id'];
     
     $id = filter_var($id, FILTER_SANITIZE_STRING);
     $id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);
     $crud = new Crud();
    
    //fetching data in descending order (lastest entry first)
   $query ="SELECT jobs.jId,employer.eId,jobs.jName, jobs.jEndDate,jobs.jType,jobs.jLevel,jobs.jSalary,jobs.jRequirement,jobs.catName,jobs.jExperience,jobs.jLocation,jobs.jTotalNo,jobs.jGenderPreffered,jobs.jQualification,jobs.jPosted,jobs.jExtraDetails, employer.eName, employer.eWebsite FROM jobs INNER JOIN employer ON jobs.eId=employer.eId WHERE jobs.jId='$id'";
    $result = $crud->getData($query);
      if($result){
         foreach ($result as $key => $res) {
            //while($res = mysqli_fetch_array($result)) {  
               $jId= $res['jId'];

               $jName= $res['jName'] ; 
               $jEndDate= $res['jEndDate'] ;  
               $jType= $res['jType'];
               $jLevel= $res['jLevel'] ;    
               $jExperience= $res['jExperience'] ;   
               $jLocation= $res['jLocation'] ;   
               $jRequirement= $res['jRequirement'] ;   
               $catName= $res['catName'] ;   
               $jTotalNo= $res['jTotalNo'] ;   
               $jGenderPreffered= $res['jGenderPreffered'] ;   
               $jQualification= $res['jQualification'] ;   
               $jPosted= $res['jPosted'] ;   
               $jExtraDetails= $res['jExtraDetails'] ;   
               $eName= $res['eName'] ;   
               $eWebsite= $res['eWebsite'] ;   
               $jSalary= $res['jSalary'] ;   
               $eId= $res['eId'] ;   

                
               }
           
           } 
           else{
            header('location:error.php');
           }





}
else{
  header('location:index.php');
}
?>


<?php
include('includes/top.php');
include('includes/header.php');
?>


    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8 mt-4 divShowJob">
         

          <!-- Title -->
          <h1 class="mt-4"><?=$jName?></h1>


          <!-- Author -->
          <p class="lead">
            by
            <a href="employer.php?id=<?=$eId?>"><?=$eName?> at <?=$jLocation?></a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Posted on <?=$jPosted?></p>

          <hr>


          <!-- Post Content -->
          <p class="lead">A well known organization is seeking for the post of <?=$jName?></p>
           <div class="jobSalary">
        
            <p class="jobSalaryPara">
                    <ul>
                      <li>Experiene: <span style="font-weight: bold;font-style: italic;"><?=$jExperience?></span></li>
                      <li>Salary: <span style="font-weight: bold;font-style: italic;">Rs.<?=$jSalary?></span></li>
              <li>Job Type: <span style="font-weight: bold;font-style: italic;"><?=$jType?></span></li>
              <li>Job Level: <span style="font-weight: bold;font-style: italic;"><?=$jLevel?></span></li>
              <li>Job Cat: <span style="font-weight: bold;font-style: italic;"><?=$catName?></span></li>
                    </ul>

            </p>

        </div>

          <hr>
        <div class="jobRequirement">
            <h3>Job Requirement</h3>
            <p class="jobRequirementPara">
                    <?=$jRequirement?>

            </p>

        </div>

        <div class="jobQualification">
          <h4>Job Qualification</h4>
           <p class="jobQualificationPara">
                <?=$jQualification?>
           </p>
        </div>

          <hr>
        <div class="jobExtraDetails">
          <h5>Extra Details</h5>
           <p class="jobExtraDetailsPara">
               <?=$jExtraDetails?>
           </p>
        </div>
        
          <hr>
        <div class="jobActions">
              <a href="applyJob.php?jobid=<?=$id?>" class="btn btn-success">Apply</a>
              <a href="employer.php?id=<?=$eId?>" class="btn btn-primary">View Company Profile</a>
        </div>
          
   
          <hr>
            <blockquote class="blockquote">
            <p class="mb-0"></p>
            <footer class="blockquote-footer">
           This Job Vacancy Will end on <?=$jEndDate?>
             
            </footer>
          </blockquote>

        


    

        </div>

      <?php include('includes/sidebar.php')?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php
include('includes/footer.php');
?>