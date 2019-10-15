<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<ul class="list-group">
<?php
// including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 $getSessionID= $_SESSION['eId'];
//getting id from url
$id=$getSessionID;
 
//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM employer WHERE eId=$getSessionID");
 
foreach ($result as $res) {
    $eName = $res['eName'];
    $eAddress = $res['eAddress'];
    $eEmail = $res['eEmail'];
    $ePassword = $res['ePassword'];
    $ePhone = $res['ePhone'];
    $eVerified = $res['eVerified'];
      $eDetails = $res['eDetails'];
    $ePhone = $res['ePhone'];
     $eType = $res['eType'];
     $eLogo = $res['eLogo'];

    $eWebsite = $res['eWebsite'];
    $eEstd = $res['eEstd'];
    $eEmployesNo = $res['eEmployesNo'];
   	  echo "<li class='list-group-item active'>Employers Information</li>";
   	  	  echo "<li class='list-group-item' >";
   	 echo "<div class='logo'>";
   	  echo "<img src='$eLogo' alt='jobmalai-employer-logo' class='img-thumbnail'>";
	  echo "</div>";


	
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
	  echo "<span style='font-weight: bold;'>Details :</span> $eDetails";
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
	 

?>

 
</ul>
<hr>
<a class="btn btn-primary" href="editProfile.php?id=<?=$id?>">Edit Profile</a>
<hr>



<?php include('includes/footer.php');?>