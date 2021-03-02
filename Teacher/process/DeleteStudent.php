<?php 
session_start();
sleep(5);
    if(isset($_POST['submit'])){
        include_once("../include/connection.php");
        $rollno = $_POST['rollno'];
        $sql = "DELETE FROM students WHERE rollno = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $rollno);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["success"] = "Student deleted";
            }
            else
            {
                $_SESSION["error"] = "Try again: Try deleting all the combinations associated with this student";
            }
        }
    }
?>