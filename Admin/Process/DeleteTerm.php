<?php 
session_start();
    if(isset($_POST['submit'])){
        include_once("../include/connection.php");
        $termId = $_POST['termId'];
        $sql = "DELETE FROM term WHERE termId = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $termId);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["success"] = "Term deleted";
            }
            else
            {
                $_SESSION["error"] = "Try again: Try deleting all the combinations associated with this term";
            }
        }
    }
?>