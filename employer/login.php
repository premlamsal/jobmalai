<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">


     <link rel="stylesheet" href="../libnoti/font-awesome/css/font-awesome.min.css"/>
     <link rel="stylesheet" href="../libnoti/css/Lobibox.min.css"/>
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
      <div class="card card-login mx-auto mt-5" id="formDiv">
        <div class="card-header">Login to Employer Account</div>
        <div class="card-body">
          <form method="POST" action="login.php">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="email">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
           <input type="submit" name="" class="btn btn-primary btn-block" value="Login">
          </form>
           <div class="text-center">
            <a class="d-block small mt-3" href="registerEmp.php">I don't have Employer Account</a>
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
<?php

if (isset($_GET['hrc'])) {
echo "<script>hasRecords();</script>";
}
?>
  </body>

</html>
<?php
session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST")  {

    $eEmail=$_POST['email'];
    $ePassword=$_POST['password'];
    if(($eEmail=="") && ($ePassword="")){

      echo "Blank Field Aren't allowed. Please Input Email or Password";
    }
    else{
            
            //including the database connection file
            include_once("../class/crud.php");
             
            $crud = new Crud();
             
            //fetching data in descending order (lastest entry first)
            $query = "SELECT * FROM employer  WHERE eEmail='$eEmail' AND ePassword='$ePassword'";
            $result = $crud->getData($query);
                     if($result){
                            foreach ($result as $key => $res) {
                              //while($res = mysqli_fetch_array($result)) {  
                             $_SESSION['eId']= $res['eId'] ; 
                             $_SESSION['eName']= $res['eName'] ;     
                             $_SESSION['eAddress']= $res['eAddress'] ;     
                             $_SESSION['eEmail']= $res['eEmail'] ;     
                          
                        echo "<script type='text/javascript'>
                    showSuccessNoti();
                         </script>";  
                          echo "<script>callDash();</script>";
                      }
                   
                   }
                   else{
                echo "<script type='text/javascript'>
                    showErrorNoti();
                  </script>";
            }



    }


}

?>
