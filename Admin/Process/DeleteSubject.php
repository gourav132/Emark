<?php 
session_start();
    if(isset($_POST['submit'])){
        include_once("../include/connection.php");
        $subjectId = $_POST['subjectId'];
        $sql = "DELETE FROM subject WHERE subjectId = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $subjectId);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["success"] = "Subject deleted";
            }
            else
            {
                $_SESSION["error"] = "Try again: Try deleting all the combinations associated with this Subject";
            }
        }
    }
?>