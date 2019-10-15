<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<ul class="list-group">
<?php
// including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 
//getting id from url
$id = $crud->escape_string($_GET['id']);
 
//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM users WHERE uId=$id");
 
foreach ($result as $res) {
    $uName = $res['uName'];
    $uAddress = $res['uAddress'];
    $uEmail = $res['uEmail'];
    $uPassword = $res['uPassword'];
    $uPhone = $res['uPhone'];
     $uRole = $res['uRole'];
      $uPhoto = $res['uPhoto'];
    $uLastLogin = $res['uLastLogin'];

   	  echo "<li class='list-group-item active'>User Information</li>";
	  echo "<li class='list-group-item' >";
	  echo "<span style='font-weight: bold;'>Name :</span> $uName";
	  echo "<br>";
	  echo "<span style='font-weight: bold;'>Address :</span> $uAddress";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Email :</span> $uEmail";
	    echo "<br>";
	  echo "<span style='font-weight: bold;'>Password :</span> $uPassword";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Phone :</span> $uPhone";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Lat Login :</span> $uLastLogin";
	    echo "<br>";
				    if($uRole==1){
				  echo "<span style='font-weight: bold;'>Role : </span> <a href='#' class='btn-success'>Admin</a>";
				}
				else{
					echo "<span style='font-weight: bold;'>Verified :</span> <a href='#' class='btn-danger'>Normal User</a>";
				}
	  echo "</li>";
	}
	 

?>

 
</ul>





<?php include('includes/footer.php');?>