<?php 
session_start();
    if(isset($_POST['submit'])){
        include_once("../include/connection.php");
        $sectionId = $_POST['sectionId'];
        $sql = "DELETE FROM section WHERE sectionId = ?";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $sectionId);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["success"] = "Section deleted";
            }
            else
            {
                $_SESSION["error"] = "Try again: Try deleting all the combinations associated with this section";
            }
        }
    }
?>