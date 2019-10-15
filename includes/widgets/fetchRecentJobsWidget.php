
<?php
include_once("../../class/crud.php");

 $crud = new Crud();

$query ="SELECT jId,jName FROM jobs ORDER BY jId DESC LIMIT 10";
$result = $crud->getData($query);

if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
     $jId= $res['jId'] ; 
     $jName= $res['jName'] ; 
    
  
              echo "<li><a href='showjobs.php?id=$jId'>$jName</li>";
         
     }
 }

?>