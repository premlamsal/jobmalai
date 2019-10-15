
<?php
include_once("../../class/crud.php");

 $crud = new Crud();

$query ="SELECT catId,catName FROM jobcat ORDER BY catId DESC LIMIT 10";
$result = $crud->getData($query);
if($result){
 foreach ($result as $key => $res) {
    //while($res = mysqli_fetch_array($result)) {  
     $catId= $res['catId'] ; 
     $catName= $res['catName'] ; 
    

              echo "<li><a href='jobs.php?cat=$catName'>$catName</li>";
         
     }
 }

?>