<?php 
session_start();
    if(isset($_POST['submit'])){
        include_once("../include/connection.php");
        $classWtSubId = $_POST['classWtSubId'];
        $sql = "DELETE FROM classwtsubject WHERE classWtSubId = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $classWtSubId);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["success"] = "Combination deleted";
            }
            else
            {
                $_SESSION["error"] = "Try again: Try deleting all the combinations associated with this combination";
            }
        }
    }
?>