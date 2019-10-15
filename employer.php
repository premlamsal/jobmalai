<?php
if (isset($_GET['id'])) {
      //including the database connection file
    include_once("class/crud.php");
     $id=$_GET['id'];
       $id = filter_var($id, FILTER_SANITIZE_STRING);
       $id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);
     $crud = new Crud();
     
    //fetching data in descending order (lastest entry first)
   $query ="SELECT * From employer WHERE eId='$id'";
    $result = $crud->getData($query);
      if($result){
         foreach ($result as $key => $res) {
            //while($res = mysqli_fetch_array($result)) {  
              $eName = $res['eName'];
              $eId = $res['eId'];
              $eAddress = $res['eAddress'];
              $eEmail = $res['eEmail'];
              $ePassword = $res['ePassword'];
              $ePhone = $res['ePhone'];
              $eEstd = $res['eEstd'];
              $eVerified = $res['eVerified'];
              $eDetails = $res['eDetails'];
              $eEmployesNo = $res['eEmployesNo'];
              $ePhone = $res['ePhone'];
              $eType = $res['eType'];
              $eWebsite = $res['eWebsite'];
              $eLogo = $res['eLogo'];
              $eLogo=substr($eLogo, 3);

                
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
        <div class="col-lg-8">
      <div class="col-md-12 mt-4 empLogoDiv">
            <p style="text-align: center;"><img src="<?=$eLogo?>" class='employerLogo'>
           </p>
          <!-- Title -->
          <h2 class="" style="text-align: center;"><?=$eName?></h2>

    <!-- Author -->
          <p class="lead" style="text-align: center;">
           
            <a href="#"><?=$eAddress?></a>
          </p>

        
          <hr>

          <!-- Date/Time -->
          <p>Since <?=$eEstd?></p>

          <hr>


          <!-- Post Content -->
          <p class="lead"></p>
           <div class="jobSalary">
        
            <div class="jobSalaryPara">
                    <ul>
                       <li><i class="fas fa-warehouse"></i> <?=$eType?></li>
              <li><i class="fas fa-envelope"></i> <?=$eEmail?></li>
              <li><i class="fas fa-phone-square"></i> <?=$ePhone?></li>
              <li><i class="fas fa-users"></i> <?=$eEmployesNo?></li>
              <?php
                  if($eVerified==1){
            echo "<li>Verified: <i class='fas fa-check' style='color:green;'></i></li>";
               
                  }
                  else{
                     echo "<li>Verified: <i class='fas fa-times' style='color:red;'></i></li>";
               
                  }
              ?>
                     
             
              
                  </ul>
            </div>

        </div>
      </div>


        <div class="jobActions">
             
              <a href="<?=$eWebsite?>" >View Company Website</a>
        </div>
          
   
            <blockquote class="blockquote">
            <p class="mb-0"></p>
            <footer class="blockquote-footer">
         
             Want to know the Job Opening for this Organization.

            </footer>
          </blockquote>

        

          <hr>

    
  <button class="btn btn-primary" id="btnEmpJob" style="margin-bottom: 2em;" data-id="<?=$eId?>">Show Jobs</button>

  <div class="row">
    <div class="col-md-12"></div>
  </div>
        <div class="row" id="divToShowEmpJobs">
            <!-- loads the recents jobs here with AJAX-->
      </div>



  </div>


   


     <?php include('includes/sidebar.php');?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php
include('includes/footer.php');
?>
<script type="text/javascript" src="assets/js/employer.js"></script>
</body>
</html>