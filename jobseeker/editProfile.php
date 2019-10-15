<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
$id = filter_var($id, FILTER_SANITIZE_STRING);
$id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);

//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM jobseeker WHERE jsId='$id' ";
$result = $crud->getData($query);
if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
    $jsName = $res['jsName'];
    $jsAddress = $res['jsAddress'];
    $jsEmail = $res['jsEmail'];
    $jsPassword = $res['jsPassword'];
    $jsPhone = $res['jsPhone'];
    $jsVerified = $res['jsVerified'];
    $jsWebsite = $res['jsWebsite'];
    $jsBio = $res['jsBio'];
    $jsJoinedDate = $res['jsJoinedDate'];
    $jsCatFirst= $res['jsCatFirst'];
    $jsCatSecond=$res['jsCatSecond'];
    $jsCatThird=$res['jsCatThird'];
    }
  }
}


?>
<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
 
 <form style="width: 50%; margin-left: 20px;" method="post" enctype="multipart/form-data" action="editProfile_action.php">
 <div class="form-group">
   <label for="Name">Name</label>
     <input type="hidden" name="getID" value="<?=$id?>">
    <input type="text" class="form-control"  placeholder="Enter Name" name="jsName" value="<?=$jsName?>">
    
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email" name="jsEmail" value="<?=$jsEmail?>">
    
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="jsPassword" value="<?=$jsPassword?>">
  </div>
   <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control"   placeholder="Enter Address" name="jsAddress" value="<?=$jsAddress?>">
    
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="number" class="form-control"   placeholder="Enter Phone" name="jsPhone" value="<?=$jsPhone?>">
  </div>
   <div class="form-group">
    <label for="Website">Website</label>
    <input type="website" class="form-control"   placeholder="Enter Website" name="jsWebsite" value="<?=$jsWebsite?>">
    
  </div>
   <div class="form-group">
    <label for="EmployesNo">Enter Job Cat 1</label>
    <input type="text" class="form-control"   placeholder="Enter Job Cat 1" name="jsCatFirst" value="<?=$jsCatFirst?>">
    
  </div>
  
  <div class="form-group">
    <label for="Company Type">Enter Job Cat 2</label>
    <input type="text" class="form-control"   placeholder="Enter Job Cat 2" name="jsCatSecond" value="<?=$jsCatSecond?>">
    
  </div>
    <div class="form-group">
    <label for="Company Type">Enter Job Cat 3</label>
    <input type="text" class="form-control"   placeholder="Enter Job Cat 3" name="jsCatThird" value="<?=$jsCatThird?>">
    
  </div>
  
  

  <div class="form-group">
    <label for="Details">Enter Your Details</label>
    <textarea class="form-control" rows="3" name="jsBio"><?php echo "$jsBio";?></textarea>
  </div>
  <div class="form-group">
    <label for="Company Logo">Upload Your Photo</label>
    <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
  </div>

 
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  <br>


<?php include('includes/footer.php');?>