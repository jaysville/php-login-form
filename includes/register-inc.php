<?php
    if(isset($_POST['submit'])){
    //add db connection when button is clicked

    require 'database.php';
   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpass = $_POST['confirmPassword'];
    
    if (empty($username) || empty($password) || empty($confirmpass)){
     header("Location: ../register.php?error=emptyfields&username=".$username);
     exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]./", $username)) {
     header("Location: ../register.php?error=invalidusername&username=".$username);
     exit();
    }elseif($password !== $confirmpass){
        header("Location: ../register.php?error=passwordsdonotmatch&username=".$username);
        exit();
    }else{
        $sql = "SELECT username FROM users WHERE username = ?";
        $stmt = mysqli_stmt_init($conn); //initialize a statement and returns an object to prepare 
        if(!mysqli_stmt_prepare($stmt,$sql)){ //if there is no returned object 
            header("Location: ../register.php?sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s",$username); //bind statement, the second arg is the data type. S stands for string, i integere,b boolean
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt); //returns 1 if row with username exists, returns 0 if it doesnt  
            
            if($rowCount > 0){
                header("Location: ../register.php?error=usernameTaken");
                exit();
            } else {
                $sql = "INSERT INTO users (username,password) VALUES (?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){ //if there is no returned object 
                    header("Location: ../register.php?sqlerror");
                    exit();
                }else {
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ss",$username,$hashedPass); //bind statement, the second arg is the data type. S stands for string, i integere,b boolean
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                     header("Location: ../register.php?success=registered");
                    exit();

                }

            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }






