<?php
 require_once 'includes/header.php';
?>

<?php

if(isset($_SESSION['sessionId'])){
  echo 'You are logged in!';
}else{
 echo "HOME";
}



?>

<?php
require_once 'includes/footer.php'

?>
  
<!--   
   $sql = "SELECT * FROM users";
   $result = mysqli_query($conn,$sql);
   $rowCount = mysqli_num_rows(($result)) ; //counts rows gotten in the result


   //amount of row more than 0 , print out result as an array
   if($rowCount > 0){
     while($row = mysqli_fetch_assoc($result)){
         echo $row['username' ]. "<br>";
     }
   }else{
    echo "No results found! ";
   } -->



  