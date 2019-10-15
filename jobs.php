<?php
include('includes/top.php');
include('includes/header.php');
?>

<?php
if (isset($_GET['cat'])) {
include_once("class/crud.php");

 $crud = new Crud();
$getCatName=$_GET['cat'];
 $getCatName = filter_var($getCatName, FILTER_SANITIZE_STRING);
       $getCatName = preg_replace("/&#?[a-z0-9]{2,8};/i","",$getCatName);
$cat ="SELECT jobs.jId,jobs.jName,employer.eId,employer.eName FROM jobs INNER JOIN employer ON jobs.eId=employer.eId WHERE catName='$getCatName' ORDER BY jobs.jId DESC LIMIT 12 ";
$result = $crud->getData($cat);
}
elseif(isset($_POST['query'])){
$query=$_POST['query'];
$query = filter_var($query, FILTER_SANITIZE_STRING);
$query = preg_replace("/&#?[a-z0-9]{2,8};/i","",$query);
include_once("class/crud.php");

 $crud = new Crud();
$cat ="SELECT jobs.jId,jobs.jName,employer.eId,employer.eName FROM jobs INNER JOIN employer ON jobs.eId=employer.eId WHERE jobs.jName LIKE'%$query%' OR jobs.catName LIKE '%$query%' ORDER BY jobs.jId DESC LIMIT 12 ";
$result = $crud->getData($cat);

}
else{
  header("location:error.php");
}
?>

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
<?php
    echo "<h1>Jobs for ";  
   if(isset($query)){
    echo "$query";
  }elseif (isset($getCatName)) {
      echo "$getCatName";
  }
    echo "</h1>";
    ?> 
   
  </div>
</div>

<!-- jumbotron ends -->


<!-- cards container -->
 <div class="container">
    <div class="row">
	 		<div class="col-md-12">
	 		
				 </div>
	 		</div>
	 



 	<div class="row">
 		<div class=""></div>
 	</div>
 	<div class="row" id="">
 			<!-- loads the recents jobs here with AJAX-->

<?php


if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
     $jId= $res['jId'] ; 
     $jName= $res['jName'] ; 
     $eId= $res['eId'] ; 
     $eName= $res['eName'] ;

 echo "<div class='col-md-12'>";
   if(isset($query)){
    echo "<h5>Search Results</h5>";
   }
   echo "</div>";

  
   echo "<div class='col-md-3'>
         
        <div class='card customCard'>

          <div class='card-body custom-card-body '>
            <h6 class='card-title'>$jName</h6>
            <h6 class='card-subtitle mb-2 text-muted'>$eName</h6>
        
            <a href='applyJob.php?jobid=$jId' class='card-link'>Apply</a>
            <a href='showjobs.php?id=$jId' class='card-link'>View</a>
          </div>
        </div>
      </div>";

     }
 }
 else{
  echo "<h5>Opps!!! I couldn't find any Job as per your request.";

  echo " "."Please try again later !!!</h5>";
 }

?>
</div>
<!-- cards end -->
</div>
<!-- cards ends -->
<hr>

			


<?php
include('includes/footer.php');
?>


</body>
</html>