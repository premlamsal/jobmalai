<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
<ul class="list-group">
<?php
// including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 $getSessionID= $_SESSION['jsId'];
//getting id from url
$id=$getSessionID;
 
//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM jobseeker WHERE jsId=$id");
 
foreach ($result as $res) {
    $jsName = $res['jsName'];
    $jsAddress = $res['jsAddress'];
    $jsEmail = $res['jsEmail'];
    $jsPassword = $res['jsPassword'];
    $jsPhone = $res['jsPhone'];
     $jsVerified = $res['jsVerified'];
    $jsWebsite = $res['jsWebsite'];
    $jsJoinedDate = $res['jsJoinedDate'];
    $jsCatFirst= $res['jsCatFirst'];
    $jsCatSecond=$res['jsCatSecond'];
    $jsCatThird=$res['jsCatThird'];
    $jsResume=$res['jsResume'];

   	  echo "<li class='list-group-item active'>JobSeeker Information</li>";
	  echo "<li class='list-group-item' >";
	  echo "<span style='font-weight: bold;'>Name :</span> $jsName";
	  echo "<br>";
	  echo "<span style='font-weight: bold;'>Address :</span> $jsAddress";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Email :</span> $jsEmail";
	    echo "<br>";
	  echo "<span style='font-weight: bold;'>Password :</span> $jsPassword";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Phone :</span> $jsPhone";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Date Joined :</span> $jsJoinedDate";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Website :</span> <a href='$jsWebsite'> $jsWebsite </a>";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Categories First :</span> $jsCatFirst";
	   echo "<br>";
	  echo "<span style='font-weight: bold;'>Categories Second :</span> $jsCatSecond";
	  echo "<br>";
	  echo "<span style='font-weight: bold;'>Categories Third :</span> $jsCatThird";
	    echo "<br>";
	      
	     echo "<span style='font-weight: bold;'>Resume </span> <a href='$webAddress/jobSeeker/$jsResume'>Download Resume</a>";
	     echo "<br>";

				    if($jsVerified==1){
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

<a class="btn btn-primary" href="uploadResume.php?id=<?=$id?>">Upload Resume</a>
<hr>


<?php include('includes/footer.php');?>