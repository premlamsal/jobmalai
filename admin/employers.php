<?php
if(isset($_POST['eName'])){
$eName=stripslashes($_POST['eName']);
$eName=strip_tags($eName);
$eAddress=stripslashes($_POST['eAddress']);
$eAddress=strip_tags($eAddress);
$ePassword=stripslashes($_POST['ePassword']);
$ePassword=strip_tags($ePassword);
$eEmail=stripslashes($_POST['eEmail']);
$eEmail=strip_tags($eEmail);
$ePhone=stripslashes($_POST['ePhone']);
$ePhone=strip_tags($ePhone);
$eType=stripslashes($_POST['eType']);
$eType=strip_tags($eType);
$eEstd=stripslashes($_POST['eEstd']);
$eEstd=strip_tags($eEstd);
$eWebsite=stripslashes($_POST['eWebsite']);
$eWebsite=strip_tags($eWebsite);
$eEmployesNo=stripslashes($_POST['eEmployesNo']);
$eEmployesNo=strip_tags($eEmployesNo);
$eDetails=stripslashes($_POST['eDetails']);
$eDetails=strip_tags($eDetails);


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
              $eLogo=$target_file;
              include_once("../class/crud.php");    
              $crud = new Crud();
$result = $crud->execute("INSERT INTO employer(eName,eEmail,ePassword,eAddress,eDetails,ePhone,eLogo,eWebsite,eType,eEstd,eEmployesNo) VALUES('$eName','$eEmail','$ePassword','$eAddress','$eDetails','$ePhone','$eLogo','$eWebsite','$eType','$eEstd','$eEmployesNo')");
              if($result){
                header('location:employers.php');

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
              Employer
             <?php if($uRole==1){ ?> <a href="#" class="btn btn-primary" data-toggle='modal' data-target='#addModal'><i class="far fa-plus-square"></i> Add Employers</a>
           <?php } ?>
          </div>
            <div class="card-body" style="font-size: 13px;">
            	
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Verified</th>
                      
                      <th>Action</th>
<?php
//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM employer ";
$result = $crud->getData($query);

?>
                     
                    </tr>
                  </thead>
                 
                  <tbody>
<?php


if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
       $id= $res['eId'] ; 
   $eName= $res['eName'] ;     
   $eAddress= $res['eAddress'] ;     
   $eEmail= $res['eEmail'] ;     
   $eVerified= $res['eVerified'] ;     
   $eType= $res['eType'] ;     
    
     echo "<tr>
  			<td>$eName</td>
  			<td>$eAddress</td>
  			<td>$eEmail</td>
  			<td>$eType</td>";
  			
  			
       
      
	    if($eVerified==1){
			   	echo "<td><a class='btn btn-success' style='color:white'><i class='fas fa-check'></i></a></td>";
			
			 }
			 else
			 {
			 	echo "<td><a class='btn btn-danger' style='color:white'><i class='fas fa-times'></i></a></td>";
			 
			 }
			
		
        
         echo "<td><a href='detailsEmployers.php?id=$id' class='btn btn-success'><i class='far fa-eye'></i></a>
                      	<a href='editEmployers.php?id=$id' class='btn btn-primary'> <i class='far fa-edit'></i></a>
                      	<a class='btn btn-danger' href='deleteEmployers.php?id=$id'> <i class='fas fa-trash-alt'></i></a>

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
    <input type="text" class="form-control"  placeholder="Enter Name" name="eName">
    
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email" name="eEmail">
    
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="ePassword">
  </div>
   <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control"   placeholder="Enter Address" name="eAddress">
    
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="number" class="form-control"   placeholder="Enter Phone" name="ePhone">
  </div>
   <div class="form-group">
    <label for="Website">Website</label>
    <input type="website" class="form-control"   placeholder="Enter Website" name="eWebsite">
    
  </div>
   <div class="form-group">
    <label for="EmployesNo">Employes No</label>
    <input type="text" class="form-control"   placeholder="Enter Employes No" name="eEmployesNo">
    
  </div>
   <div class="form-group">
    <label for="Estd Date">Estd Date</label>
    <input type="date" class="form-control"   placeholder="Estd Date" name="eEstd">
    
  </div>
  <div class="form-group">
    <label for="Company Type">Company Type</label>
    <input type="text" class="form-control"   placeholder="Company Type" name="eType">
    
  </div>
  

  <div class="form-group">
    <label for="Details">Enter Company Details</label>
    <textarea class="form-control" rows="3" name="eDetails"></textarea>
  </div>
  <div class="form-group">
    <label for="Company Logo">Company Logo</label>
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


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>">
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control"  placeholder="Enter Name" name="eName">
    
  </div>
  <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control"  placeholder="Enter Email" name="eEmail">
    
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control"  placeholder="Password" name="ePassword">
  </div>
   <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control"   placeholder="Enter Address" name="eAddress">
    
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="number" class="form-control"   placeholder="Enter Phone" name="ePhone">
  </div>
   <div class="form-group">
    <label for="Website">Website</label>
    <input type="website" class="form-control"   placeholder="Enter Website" name="eWebsite">
    
  </div>
   <div class="form-group">
    <label for="EmployesNo">Employes No</label>
    <input type="text" class="form-control"   placeholder="Enter Employes No" name="eEmployesNo">
    
  </div>
   <div class="form-group">
    <label for="Estd Date">Estd Date</label>
    <input type="date" class="form-control"   placeholder="Estd Date" name="eEstd">
    
  </div>
  <div class="form-group">
    <label for="Company Type">Company Type</label>
    <input type="text" class="form-control"   placeholder="Company Type" name="eType">
    
  </div>
  

  <div class="form-group">
    <label for="Details">Enter Company Details</label>
    <textarea class="form-control" rows="3" name="eDetails"></textarea>
  </div>
  <div class="form-group">
    <label for="Company Logo">Company Logo</label>
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