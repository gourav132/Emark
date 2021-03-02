<?php
    session_start();
    if(isset($_POST['submit'])){

        include_once("../include/connection.php");

        // Prepare an insert statement
        $sql = "INSERT INTO announcement (title, body, date) VALUES (?, ?, ?)";
        
        if($stmt = mysqli_prepare($link, $sql)){

            $title = $_POST['title'];
            $body = $_POST['body'];
            $body_esc = mysqli_real_escape_string($link , $body);
            $date = date("F jS \, Y");
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $title, $body_esc, $date);
            
            $result = mysqli_stmt_execute($stmt);
            if($result){
                $_SESSION['successMessage'] = "Announcement successfully made";
                // header("location: Contact");
            }
            else{
                $_SESSION['errorMessage'] = "Try again";
                // header("location: Contact");
            }

        }

        else{
            $_SESSION['errorMessage'] = "Try again";
            // header("location: Contact");
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }
?>