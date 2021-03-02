<?php 
sleep(5);
session_start();
    if(isset($_POST['submit'])){
        include_once("../include/connection.php");
        $classId = $_POST['classId'];
        $sql = "DELETE FROM class WHERE classId = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $classId);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["success"] = "Class deleted";
            }
            else
            {
                $_SESSION["error"] = "Try again: Try deleting all the combinations associated with this table";
            }
        }
    }
?>