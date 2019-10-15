<?php
if(isset($_POST['getID'])){
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
$getID=$_POST['getID'];
 $getID = filter_var($getID, FILTER_SANITIZE_STRING);
     $getID = preg_replace("/&#?[a-z0-9]{2,8};/i","",$getID);
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
              $jsLogo=$target_file;
              include_once("../class/crud.php"); 

              $crud = new Crud();
$result = $crud->execute("UPDATE jobseeker SET jsName='$jsName',jsPassword='$jsPassword',jsEmail='$jsEmail',jsPhone='$jsPhone',jsCatFirst='$jsCatFirst',jsCatSecond='$jsCatSecond',jsWebsite='$jsWebsite',jsBio='$jsBio',jsLogo='$jsLogo' ,jsAddress='$jsAddress' WHERE jsId=$getID");
              if($result){
                header('location:jobseeker.php');
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
