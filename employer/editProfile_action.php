<?php
if(isset($_POST['getID']))
{
$eName=stripslashes($_POST['eName']);
$eName=strip_tags($eName);
$eAddress=stripslashes($_POST['eAddress'],'<p><a>');
$eAddress=strip_tags($eAddress);
$ePassword=stripslashes($_POST['ePassword']);
$ePassword=strip_tags($ePassword);
$eEmail=stripslashes($_POST['eEmail']);
$eEmail=strip_tags($eEmail);
$ePhone=stripslashes($_POST['ePhone']);
$ePhone=strip_tags($ePhone);
$eType=stripslashes($_POST['eType']);
$eType=strip_tags($eType);
$eWebsite=stripslashes($_POST['eWebsite']);
$eWebsite=strip_tags($eWebsite);
$eEmployesNo=stripslashes($_POST['eEmployesNo']);
$eEmployesNo=strip_tags($eEmployesNo);
$eDetails=stripslashes($_POST['eDetails']);
$eDetails=strip_tags($eDetails);
$eWebsite=stripslashes($_POST['eWebsite']);
$eWebsite=strip_tags($eWebsite);
$eEstd=stripslashes($_POST['eEstd']);
$eEstd=strip_tags($eEstd);
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
              $eLogo=$target_file;
              include_once("../class/crud.php"); 

              $crud = new Crud();
$result = $crud->execute("UPDATE employer SET eName='$eName',ePassword='$ePassword',eEmail='$eEmail',ePhone='$ePhone',eType='$eType',eEmployesNo='$eEmployesNo',eWebsite='$eWebsite',eDetails='$eDetails',eEstd='$eEstd',eLogo='$eLogo' ,eAddress='$eAddress' WHERE eId=$getID");
              if($result){
                header('location:myprofile.php');

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
