<?php
if(isset($_POST['jsName'])){
$jsName=stripslashes($_POST['jsName']);
$jsName=strip_tags($jsName);
$jsAddress=stripslashes($_POST['jsAddress']);
$jsAddress=strip_tags($jsAddress);
$jsPassword=stripslashes($_POST['jsPassword']);
$jsPassword=strip_tags($jsPassword);
$jsEmail=stripslashes($_POST['jsEmail']);
$jsEmail=strip_tags($jsEmail);
$jsPhone=stripslashes($_POST['jsPhone']);
$jsPhone=strip_tags($jsPhone);
$jsCatFirst=stripslashes($_POST['jsCatFirst']);
$jsCatFirst=strip_tags($jsCatFirst);
$jsCatSecond=stripslashes($_POST['jsCatSecond']);
$jsCatSecond=strip_tags($jsCatSecond);
$jsCatThird=stripslashes($_POST['jsCatThird']);
$jsCatThird=strip_tags($jsCatThird);
$jsBio=stripslashes($_POST['jsBio']);
$jsBio=strip_tags($jsBio);
$jsWebsite=stripslashes($_POST['jsWebsite']);
$jsWebsite=strip_tags($jsWebsite);


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
              $jsLogo=$target_file;
              include_once("../class/crud.php");    
              $crud = new Crud();
              $jsVerified=0;
              $jsJoinedDate=date();
$result = $crud->execute("INSERT INTO jobseeker(jsName,jsEmail,jsPassword,jsPhone,jsAddress,jsWebsite,jsJoinedDate,jsBio,jsCatFirst,jsCatSecond,jsCatThird,jsVerified,jsLogo) VALUES('$jsName','$jsEmail','$jsPassword','$jsPhone','$jsAddress','$jsWebsite','$jsJoinedDate','$jsBio','$jsCatFirst','$jsCatSecond','$jsCatThird','$jsVerified','$jsLogo')");
              if($result){
                header('location:jobseeker.php');

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
              JobSeeker
              <a href="#" class="btn btn-primary" data-toggle='modal' data-target='#addModal'><i class="far fa-plus-square"></i> Add JobSeeker</a>
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
                      <th>Verified</th>
                      <th>Action</th>
<?php
//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM jobseeker ";
$result = $crud->getData($query);

?>
                     
                    </tr>
                  </thead>
                 
                  <tbody>
<?php


if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
       $id= $res['jsId'] ; 
   $jsName= $res['jsName'] ;     
   $jsAddress= $res['jsAddress'] ;     
   $jsEmail= $res['jsEmail'] ;     
   $jsVerified= $res['jsVerified'] ;     
   $jsPhone= $res['jsPhone'] ;     
    
     echo "<tr>
  			<td>$jsName</td>
  			<td>$jsAddress</td>
  			<td>$jsEmail</td>
  			<td>$jsPhone</td>";
  			
  			
       
      
	    if($jsVerified==1){
			   	echo "<td><a class='btn btn-success' style='color:white'><i class='fas fa-check'></i></a></td>";
			
			 }
			 else
			 {
			 	echo "<td><a class='btn btn-danger' style='color:white'><i class='fas fa-times'></i></a></td>";
			 
			 }
			
		
        
         echo "<td><a href='detailsJobseeker.php?id=$id' class='btn btn-success'><i class='far fa-eye'></i></a>
                      	<a href='editJobseeker.php?id=$id' class='btn btn-primary'> <i class='far fa-edit'></i></a>
                      	<a class='btn btn-danger' href='deleteJobseeker.php?id=$id'> <i class='fas fa-trash-alt'></i></a>

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
    <input type="text" class="form-control"  placeholder="Enter Name" name="jsName">
    
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email" name="jsEmail">
    
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="jsPassword">
  </div>
   <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control"   placeholder="Enter Address" name="jsAddress">
    
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="number" class="form-control"   placeholder="Enter Phone" name="jsPhone">
  </div>
   <div class="form-group">
    <label for="Website">Website</label>
    <input type="website" class="form-control"   placeholder="Enter Website" name="jsWebsite">
    
  </div>
   <div class="form-group">
    <label for="EmployesNo">Enter Job Cat 1</label>
    <input type="text" class="form-control"   placeholder="Enter Job Cat 1" name="jsCatFirst">
    
  </div>
  
  <div class="form-group">
    <label for="Company Type">Enter Job Cat 2</label>
    <input type="text" class="form-control"   placeholder="Enter Job Cat 2" name="jsCatSecond">
    
  </div>
    <div class="form-group">
    <label for="Company Type">Enter Job Cat 3</label>
    <input type="text" class="form-control"   placeholder="Enter Job Cat 3" name="jsCatThird">
    
  </div>
  
  

  <div class="form-group">
    <label for="Details">Enter Your Details</label>
    <textarea class="form-control" rows="3" name="jsBio"></textarea>
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