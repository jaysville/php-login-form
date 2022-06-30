<?php 

if(isset($_POST['submit'])){
  require 'database.php';;

  $username = $_POST['username'];
  $password = $_POST['password'];

  if(empty($username) || empty($password)){
    header("Location: ../register.php?error=emptyfields");
    exit();
  }else{
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../register.php?error=sqlerror");
        exit();
    }else{
        mysqli_stmt_bind_param($stmt,"s",$username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){ //formats data in array format
          $passCheck = password_verify($password,  $row['password']);
          if($passCheck){
            $_SESSION['sessionId']=$row['id'];
            $_SESSION['sessionUser'] = $row['username'];
            header("Location: ../register.php?success=loggedin");
            exit();
        }
          else if(!$passCheck){
            header("Location: ../register.php?error=wrongpassword");
            exit();
          }else{
            header("Location: ../register.php?error=wrongpassword");
            exit();
          }
        }else{
            header("Location: ../register.php?error=usernotfound");
            exit();
        }
    }
  }
} 

else{
    header("Location: ../register.php?error=accessforbidden");
    exit();
}


