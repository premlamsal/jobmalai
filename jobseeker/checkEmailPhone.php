<?php

if(isset($_POST['checkEmail'])) {
	$checkEmail=$_POST['checkEmail'];
	   //including the database connection file
            include_once("../class/crud.php");
             
            $crud = new Crud();
             
            //fetching data in descending order (lastest entry first)
            $query = "SELECT * FROM jobseeker  WHERE jsEmail='$checkEmail'";
            $result = $crud->getData($query);
                     if($result){
                         echo "<script> $('#btnRegister').hide();
                             hasEmail();
                      </script>";
                          
              echo "Email Already Exits.";
          }
          else{
          	  echo "<script> $('#btnRegister').show();</script>";
                          
          }
	
}
elseif(isset($_POST['checkPhone'])){

$checkPhone=$_POST['checkPhone'];
  
         
                         //including the database connection file
            include_once("../class/crud.php");
             
            $crud = new Crud();
             
            //fetching data in descending order (lastest entry first)
            $query = "SELECT * FROM jobseeker  WHERE jsPhone='$checkPhone'";
            $result = $crud->getData($query);
                     if($result){
                         
                         
                          echo "<script> $('#btnRegister').hide();
                                     hasPhone();
                          </script>";
              echo "Phone Number Already Exits.";
          }
          else{
          	  echo "<script> $('#btnRegister').show();</script>";
                          
          }

	
}
?>