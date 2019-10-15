<?php
session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST")  {

    $uEmail=$_POST['uEmail'];
    $uPassword=$_POST['uPassword'];
            
            //including the database connection file
            include_once("../class/crud.php");
           
            $crud = new Crud();
             
            //fetching data in descending order (lastest entry first)
            $query = "SELECT * FROM users  WHERE uEmail='$uEmail' AND uPassword='$uPassword'";

            $result = $crud->getData($query);
            var_dump($result);
                     if($result){

                        $_SESSION['uEmail']=$uEmail;
                        $_SESSION['uPassword']=$uPassword;
                        header('location:index.php');
                   
                   }
                   else{
                echo "<h3>Incorrect Email or Password</h3>";
            }

}

?>

