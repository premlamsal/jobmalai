<?php
if(isset($_POST['eName'])){
$eName=stripslashes($_POST['eName']);
$eName=strip_tags($eName);
$eAddress=stripslashes($_POST['eAddress']);
$eAddress=strip_tags($eAddress);
$ePassword=stripslashes($_POST['ePassword']);
$ePassword=strip_tags($ePassword);
$eEmail=stripslashes($_POST['eEmail']);
$eEmail=strip_tags($eEmail);
$ePhone=stripslashes($_POST['ePhone']);
$ePhone=strip_tags($ePhone);
$eType=stripslashes($_POST['eType']);
$eType=strip_tags($eType);
$eEstd=stripslashes($_POST['eEstd']);
$eEstd=strip_tags($eEstd);
$eWebsite=stripslashes($_POST['eWebsite']);
$eWebsite=strip_tags($eWebsite);
$eEmployesNo=stripslashes($_POST['eEmployesNo']);
$eEmployesNo=strip_tags($eEmployesNo);
$eDetails=stripslashes($_POST['eDetails']);
$eDetails=strip_tags($eDetails);


  //including the database connection file
            include_once("../class/crud.php");
             
            $crud = new Crud();
             
            //fetching data in descending order (lastest entry first)
            $query = "SELECT * FROM employer  WHERE ePhone='$ePhone' AND eEmail='$eEmail'";
            $result = $crud->getData($query);
                     if($result){
                         header('location:login.php?hrc=8598gadfg9');
                         }
                         else
                         {

$target_dir = "../uploads/";
$timeStamp=time();
$target_file = $target_dir .$timeStamp. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $eLogo=$target_file;
              include_once("../class/crud.php");    
              $crud = new Crud();
$result = $crud->execute("INSERT INTO employer(eName,eEmail,ePassword,eAddress,eDetails,ePhone,eLogo,eWebsite,eType,eEstd,eEmployesNo) VALUES('$eName','$eEmail','$ePassword','$eAddress','$eDetails','$ePhone','$eLogo','$eWebsite','$eType','$eEstd','$eEmployesNo')");
              if($result){
                header('location:login.php');
              }

       
    } else {
       echo "<script>Sorry Add Failed</script>";
    }
}


}
}

?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Employer Account : Jobmalai</title>

  
    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="../libnoti/font-awesome/css/font-awesome.min.css"/>
     <link rel="stylesheet" href="../libnoti/css/Lobibox.min.css"/>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">


     <style type="text/css">
       body{
  background-image: url(../assets/img/holabanner.jpg);
    background-size: cover;
}
     </style>

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5" id="formDiv" style="width: 80%">
        <div class="card-header">SignUp to Employer Account</div>
        <div class="card-body">
          <form method="POST" action="registerEmp.php" enctype="multipart/form-data">
             <p id="msg" style="color: red;"></p>
 <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control"  placeholder="Enter Name" name="eName">
    
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email" name="eEmail" id="emailBox">
    
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="ePassword">
  </div>
   <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control"   placeholder="Enter Address" name="eAddress">
    
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="number" class="form-control"   placeholder="Enter Phone" name="ePhone" id="phoneBox">
  </div>
   <div class="form-group">
    <label for="Website">Website</label>
    <input type="website" class="form-control"   placeholder="Enter Website" name="eWebsite">
    
  </div>
   <div class="form-group">
    <label for="EmployesNo">Employes No</label>
    <input type="text" class="form-control"   placeholder="Enter Employes No" name="eEmployesNo">
    
  </div>
   <div class="form-group">
    <label for="Estd Date">Estd Date</label>
    <input type="date" class="form-control"   placeholder="Estd Date" name="eEstd">
    
  </div>
  <div class="form-group">
    <label for="Company Type">Company Type</label>
    <input type="text" class="form-control"   placeholder="Company Type" name="eType">
    
  </div>
  

  <div class="form-group">
    <label for="Details">Enter Company Details</label>
    <textarea class="form-control" rows="3" name="eDetails"></textarea>
  </div>
  <div class="form-group">
    <label for="Company Logo">Company Logo</label>
    <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="termsConditions">I accept Terms & Conditions</label>
  </div>
  <br>


           <input type="submit" name="" class="btn btn-primary btn-block" id="btnRegister" value="Register">
          </form>
           <div class="text-center">
            <a class="d-block small mt-3" href="login.php">I have already Employer Account</a>
            <a class="d-block small mt-3" href="http://premlamsal.com.np">Job Malai. All Rights reserved.</a>
           
          </div>
          <!-- <div class="text-center">
            <a class="d-block small mt-3" href="register.html">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div> -->
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

 
      <script src="../libnoti/js/Lobibox.min.js"></script>
      <!-- If you do not need both (messageboxes and notifications) you can inclue only one of them -->
      <script src="../libnoti/js/messageboxes.min.js"></script>
      <script src="../libnoti/js/notifications.min.js"></script>

<script src="../libnoti/js/main.js"></script>
<script type="text/javascript">
  

$(document).ready(function(){
 



 $('#emailBox').keyup(function(){


  var email=$('#emailBox').val();
              $.ajax({
                url:"checkEmailPhone.php",
                method:"POST",
                 data:{checkEmail:email},
                success:function(data)
                {
                  $('#msg').html(data);
                }
              });


 });

 $('#phoneBox').keyup(function(){

           var phone=$('#phoneBox').val();
              $.ajax({
                url:"checkEmailPhone.php",
                method:"POST",
                data:{checkPhone:phone},
                success:function(data)
                {
                  $('#msg').html(data);
                }
              });



 });
 $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });






});

</script>
  </body>

</html>
