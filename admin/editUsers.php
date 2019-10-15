<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
 $id = filter_var($id, FILTER_SANITIZE_STRING);
     $id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);
//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM users WHERE uId='$id' ";
$result = $crud->getData($query);
if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
   $id= $res['uId'] ; 
   $uName= $res['uName'] ;     
   $uAddress= $res['uAddress'] ;     
   $uEmail= $res['uEmail'] ;     
   $uPassword= $res['uPassword'] ;     
   $uRole= $res['uRole'] ;     
   $uPhone= $res['uPhone'] ; 

    }
  }
}


?>
<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>
 
 <form style="width: 50%; margin-left: 20px;" method="post" enctype="multipart/form-data" action="editUsers_action.php">
 <div class="form-group">
   <label for="Name">Name</label>
     <input type="hidden" name="getID" value="<?=$id?>">
    <input type="text" class="form-control"  placeholder="Enter Name" name="uName" value="<?=$uName?>">
    
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email" name="uEmail" value="<?=$uEmail?>">
    
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="uPassword" value="<?=$uPassword?>">
  </div>
   <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control"   placeholder="Enter Address" name="uAddress" value="<?=$uAddress?>">
    
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="number" class="form-control"   placeholder="Enter Phone" name="uPhone" value="<?=$uPhone?>">
  </div>
  
 
  <div class="form-group">
    <label for="Phone">Role</label>
<SELECT name="uRole">Select Role for this User
              <?php 
              if($uRole==1){ 
           echo  "<option value='1' selected=''>Admin</option>";
        echo "<option value='0'>Normal User</option>";
               }
       else{
             echo  "<option value='1' >Admin</option>";
            echo "<option selected='' value='0'>Normal User</option>";
          }
        
        ?>


</SELECT>
  <div class="form-group">
    <label for="Company Logo">Upload Your Photo</label>
    <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
  </div>

 
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  <br>


<?php include('includes/footer.php');?>