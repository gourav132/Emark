<?php
    sleep(5);
    session_start();
    if(isset($_POST['submit'])){
        include_once("../include/connection.php");
        $email = $_POST['email'];
        $sql = "UPDATE admin SET AdminEmail=?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $email);

            $result2 = mysqli_stmt_execute($stmt);
            if($result2){
                $_SESSION['admin'] = $email;
                $_SESSION["successMessage"] = "Email changed successfully";
            }
            else{
                $_SESSION["errorMessage"] = "try again";
            }
    }
}
?>