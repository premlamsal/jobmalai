<?php
if(isset($_GET['id'])){
$id=$_GET['id'];

//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
  $id = filter_var($id, FILTER_SANITIZE_STRING);
     $id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM employer WHERE eId='$id' ";
$result = $crud->getData($query);
if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
   $id= $res['eId'] ; 
   $eName= $res['eName'] ;     
   $eAddress= $res['eAddress'] ;     
   $eEmail= $res['eEmail'] ;        
   $eType= $res['eType'] ; 
   $ePhone= $res['ePhone'] ; 
   $ePassword= $res['ePassword'] ; 
   $eEstd= $res['eEstd'] ; 
   $eWebsite= $res['eWebsite'] ; 
   $eEmployesNo= $res['eEmployesNo'] ; 
   $eDetails= $res['eDetails'] ; 
   $eLogo= $res['eLogo'] ; 
    }
  }
}


?>
<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
 
 <form style="width: 50%; margin-left: 20px;" method="post" enctype="multipart/form-data" action="editEmployers_action.php">

  <div class="form-group">
    <label for="Name">Name</label>
    <input type="hidden" name="getID" value="<?=$id?>">
    <input type="text" class="form-control"  placeholder="Enter Name"  required="" name="eName" value="<?=$eName;?>">
    
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email" name="eEmail" value="<?=$eEmail;?>">
    
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="ePassword" value="<?=$ePassword;?>">
  </div>
   <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control"   placeholder="Enter Address" name="eAddress" value="<?=$eAddress;?>">
    
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="number" class="form-control"   placeholder="Enter Phone" name="ePhone" value="<?=$ePhone;?>">
  </div>
   <div class="form-group">
    <label for="Website">Website</label>
    <input type="website" class="form-control"   placeholder="Enter Website" name="eWebsite" value="<?=$eWebsite;?>">
    
  </div>
   <div class="form-group">
    <label for="EmployesNo">Employes No</label>
    <input type="text" class="form-control"   placeholder="Enter Employes No" name="eEmployesNo" value="<?=$eEmployesNo;?>">
    
  </div>
   <div class="form-group">
    <label for="Estd Date">Estd Date</label>
    <input type="date" class="form-control"   placeholder="Estd Date" name="eEstd" value="<?=$eEstd;?>">
    
  </div>
  <div class="form-group">
    <label for="Company Type">Company Type</label>
    <input type="text" class="form-control"   placeholder="Company Type" name="eType" value="<?=$eType;?>">
    
  </div>
  

  <div class="form-group">
    <label for="Details">Enter Company Details</label>
    <textarea class="form-control" rows="3" name="eDetails" value="<?=$eDetails;?>"><?=$eDetails;?></textarea>
  </div>
  <div class="form-group">
    <label for="Company Logo">Company Logo</label>
    <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
  </div>

 
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  <br>


<?php include('includes/footer.php');?>