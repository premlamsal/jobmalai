<?php
if(isset($_POST['getID'])){
$uName=stripslashes($_POST['uName']);
$uName=strip_tags($uName);
$uAddress=stripslashes($_POST['uAddress']);
$uAddress=strip_tags($uAddress);
$uPassword=stripslashes($_POST['uPassword']);
$uPassword=strip_tags($uPassword);
$uEmail=stripslashes($_POST['uEmail']);
$uEmail=strip_tags($uEmail);
$uPhone=stripslashes($_POST['uPhone']);
$uPhone=strip_tags($uPhone);
$uRole=stripslashes($_POST['uRole']);
$uRole=strip_tags($uRole);

$getID=$_POST['getID'];
 $getID = filter_var($getID, FILTER_SANITIZE_STRING);
     $getID = preg_replace("/&#?[a-z0-9]{2,8};/i","",$getID);
$uLastLogin=date('Y-m-d h:m:s');
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
    echo "Sorry, your file was not uploaded. or Please Select File to Upload";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $uPhoto=$target_file;
              include_once("../class/crud.php"); 

              $crud = new Crud();
$result = $crud->execute("UPDATE users SET uName='$uName',uPassword='$uPassword',uEmail='$uEmail',uPhone='$uPhone',uRole='$uLastLogin',uPhoto='$uPhoto',uAddress='$uAddress' WHERE uId=$getID");
              if($result){
                header('location:users.php');
              }

       
    } else {
       echo "<script>Sorry Add Failed</script>";
    }
}


}
else{
  echo "ID not set";
}

?>
