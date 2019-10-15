


<?php
if(isset($_POST['uName'])){
$uName=stripslashes($_POST['uName']);
$uName=strip_tags($uName);
$uAddress=stripslashes($_POST['uAddress']);
$uAddress=strip_tags($uAddress);
$uPassword=stripslashes($_POST['uPassword']);
$uPassword=strip_tags($uPassword);
$uEmail=stripslashes($_POST['uEmail']);
$uEmail=strip_tags($uEmail);
$uPhone=stripslashes($_POST['uPhone']);
$uRole=strip_tags($uRole);
$uRole=stripslashes($_POST['uRole']);



$target_dir = "../uploads/";
$timeStamp=time();
$target_file = $target_dir .$timeStamp. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $uPhoto=$target_file;
              include_once("../class/crud.php");    
              $crud = new Crud();
              $uVerified=0; 
              $uLastLogin=date('Y-m-d h:m:s');
$result = $crud->execute("INSERT INTO users(uName,uEmail,uPassword,uPhone,uAddress,uLastLogin,uPhoto) VALUES('$uName','$uEmail','$uPassword','$uPhone','$uAddress','$uLastLogin','$uPhoto')");
              if($result){
                header('location:users.php');

              }

       
    } else {
       echo "<script>Sorry Add Failed</script>";
    }
}


}

?>

<?php include('includes/top.php'); ?>
<?php include('includes/header.php'); ?>
<?php include('includes/sidebar.php'); ?>

          <!-- DataTables Example -->
          <div class="card mb-3">

            <div class="card-header">

              <i class="fas fa-table"></i>
              Users
              <a href="#" class="btn btn-primary" data-toggle='modal' data-target='#addModal'><i class="far fa-plus-square"></i> Add Users</a>
          </div>
            <div class="card-body" style="font-size: 13px;">
            	
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Role</th>
                      <th>Action</th>
<?php
//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM users ";
$result = $crud->getData($query);

?>
                     
                    </tr>
                  </thead>
                 
                  <tbody>
<?php


if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
       $id= $res['uId'] ; 
   $uName= $res['uName'] ;     
   $uAddress= $res['uAddress'] ;     
   $uEmail= $res['uEmail'] ;     
   $uRole= $res['uRole'] ;     
   $uPhone= $res['uPhone'] ;     
    
     echo "<tr>
  			<td>$uName</td>
  			<td>$uAddress</td>
  			<td>$uEmail</td>
  			<td>$uPhone</td>";
  			
  			
       
      
	    if($uRole==1){
			   	echo "<td>Admin</td>";
			
			 }
			 else
			 {
			 	echo "<td>Normal</td>";
			 
			 }
			
		
        
         echo "<td><a href='detailsUsers.php?id=$id' class='btn btn-success'><i class='far fa-eye'></i></a>
                      	<a href='editUsers.php?id=$id' class='btn btn-primary'> <i class='far fa-edit'></i></a>
                      	<a class='btn btn-danger' href='deleteUsers.php?id=$id'> <i class='fas fa-trash-alt'></i></a>

                      </td>";
                  }
                  
                    echo "</tr>";
   }
   else{
                  	echo "No data Available";

                  }
                 
?>
                   
                     
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

         <!--  <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
          </p> -->

        </div>
        <!-- /.container-fluid -->

 <!-- delete  Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Click on Delete button to Remove.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <?php
            echo "<a class='btn btn-danger' id='finalDelBtn'>Delete</a>";
            ?>
          </div>
        </div>
      </div>
    </div>
    

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Records?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control"  placeholder="Enter Name" name="uName">
    
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email" name="uEmail">
    
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="uPassword">
  </div>
   <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control"   placeholder="Enter Address" name="uAddress">
    
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="number" class="form-control"   placeholder="Enter Phone" name="uPhone">
  </div>

  <div class="form-group">
    <label for="Phone">Role</label>
<SELECT name="uRole">Select Role for this User
<option selected="" value="0">Normal User</option>
<option value="1">Admin</option>
</SELECT>

  </div>
 
 
 
  <div class="form-group">
    <label for="Company Logo">Upload Your Photo</label>
    <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="termsConditions">I accept Terms & Conditions</label>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          
          </div>
        </div>
      </div>
    </div>


    <script type="text/javascript">
   $(document).on("click", ".btndelete", function () {
     var Id = $(this).data('id');
     $("#finalDelBtn").attr( "href","deleteEmployers?id=" );
    $('#deleteModal').modal('show');
});
    </script>
<?php include('includes/footer.php');?>