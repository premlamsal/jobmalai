<?php
if(isset($_GET['id'])){
$id=$_GET['id'];
$id = filter_var($id, FILTER_SANITIZE_STRING);
     $id = preg_replace("/&#?[a-z0-9]{2,8};/i","",$id);
}
?>
<?php
if(isset($_POST['getID'])){
  $getID=$_POST['getID'];
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
if($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "pdf"
&& $imageFileType != "xps" ) {
    echo "Sorry, only DOC, DOCX, PDF & XPS files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. or Please Select File to Upload";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $jsResume=$target_file;
              include_once("../class/crud.php"); 

              $crud = new Crud();
$result = $crud->execute("UPDATE jobseeker SET jsResume='$jsResume' WHERE jsId=$getID");
              if($result){
                header('location:myprofile.php');
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
 
 <form style="width: 50%; margin-left: 20px;" method="post" enctype="multipart/form-data" action="uploadResume.php">
 
  <div class="form-group">
 <input type="hidden" name="getID" value="<?=$id?>">
    <label for="Company Logo">Upload Your CV</label>

    <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
  </div>

 
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  <br>


<?php include('includes/footer.php');?>