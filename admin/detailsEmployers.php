<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<ul class="list-group">
<?php
if(isset($_GET['id'])){
// including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
$id=$_GET['id'];
  $id = filter_var($id, FILTER_SANITIZE_STRING);
     $id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);
//getting id from url
$id = $crud->escape_string($_GET['id']);
 
//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM employer WHERE eId=$id");
 
foreach ($result as $res) {
    $eName = $res['eName'];
    $eAddress = $res['eAddress'];
    $eEmail = $res['eEmail'];
    $ePassword = $res['ePassword'];
    $ePhone = $res['ePhone'];
    $eVerified = $res['eVerified'];
    $ePhone = $res['ePhone'];
     $eType = $res['eType'];
    $eWebsite = $res['eWebsite'];
    $eEstd = $res['eEstd'];
    $eEmployesNo = $res['eEmployesNo'];
   	  echo "<li class='list-group-item active'>Employers Information</li>";
	  echo "<li class='list-group-item' >";
	  echo "<span style='font-weight: bold;'>Name :</span> $eName";
	  echo "<br>";
	  echo "<span style='font-weight: bold;'>Address :</span> $eAddress";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Email :</span> $eEmail";
	    echo "<br>";
	  echo "<span style='font-weight: bold;'>Password :</span> $ePassword";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Phone :</span> $ePhone";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Type :</span> $eType";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Website :</span> <a href='$eWebsite'> $eWebsite </a>";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Estd :</span> $eEstd";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>EmployesNo :</span> $eEmployesNo";
	    echo "<br>";
				    if($eVerified==1){
				  echo "<span style='font-weight: bold;'>Verified : </span> <a href='#' class='btn-success'>Yes</a>";
				}
				else{
					echo "<span style='font-weight: bold;'>Verified :</span> <a href='#' class='btn-danger'>No</a>";
				}
	  echo "</li>";
	}
	}

?>

 
</ul>





<?php include('includes/footer.php');?>