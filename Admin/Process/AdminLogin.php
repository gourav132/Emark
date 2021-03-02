<?php

session_start();

if(isset($_POST['Submit'])){
    $email = $_POST['Email'];
    $passwd = $_POST['Passwd'];
    $rememberMe = "";
    if(!isset($_POST['RememberMe'])){
        $rememberMe = "off";
    }
    else{
        $rememberMe = "on";
    }
    echo $rememberMe;

    include_once("../include/connection.php");
        $sql = "SELECT * FROM admin WHERE AdminEmail=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // echo mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {
            $hashed_password = $row['AdminPasswd'];
            
            if(password_verify($passwd, $hashed_password)) {
                // if($rememberMe == "on"){
                //     $cookieName = "Admin";
                //     setcookie($cookieName,$email,time()+86400*30);
                // }
                // else{
                    $_SESSION["admin"] = $email;
                // }
                header("location: ../index.php");
            } 
            else{
                $_SESSION["errorMessage"] = "Invalid Password";
                header("location: ../login.php");
            }
            // echo mysqli_error($link);
            }
        }
        else
        {
            $_SESSION["errorMessage"] = "Invalid Credentials";
            header("location:../login.php");
        }
}

?>