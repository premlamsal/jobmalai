<?php
include('session.php');
?>
<?php
//including the database connection file
include_once("../class/crud.php");
 
$crud = new Crud();
 $jsId=$_SESSION['jsId'];
 $mStatus=0;
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM jsmsg WHERE jsId=$jsId AND mStatus='$mStatus' ORDER BY jsId LIMIT 5";
$result = $crud->getData($query);
  
if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
   $mId= $res['mId']; 
   $mTitle= $res['mTitle'] ;     
   $mBody= $res['mBody'] ;     

   echo "<a class='dropdown-item SingleMsg' href='$mId'>$mTitle</a>";
   echo "<p style='font-size:12px' href='$mBody'>$mTitle</p>";

   // echo "<p class='msgBody'>$mBody</p>";
   
  
}

 echo "<a class='dropdown-item seeAllSingle' href='messageAll.php'>See All</a>";


}
?>