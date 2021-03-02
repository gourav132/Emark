<?php
session_start();

    if(isset($_POST['Submit'])){
        // echo "Hello";
        $class = $_POST['class'];
        $term = $_POST['term'];
        $classWithTermId = $term."-".$class;
        include_once("../include/connection.php");

        $sql = "SELECT * FROM classwtterm WHERE classWtTermId=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $classWithTermId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $value = mysqli_num_rows($result);
        if($value > 0)
        {
            $_SESSION["errorMessage"] ="Combination - ".$classWithTermId." already registered";
        }
        else
        {
            $sql = "INSERT INTO classwtterm (classId, termId, classWtTermId) VALUES (?,?,?)";
            if($stmt = mysqli_prepare($link, $sql))
            {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $class, $term, $classWithTermId);
                $result = mysqli_stmt_execute($stmt);
                if($result)
                {
                    $_SESSION["successMessage"] = "Combination - ".$classWithTermId." resistered successfully";
                }
                else
                {
                    $_SESSION["errorMessage"] = "Try again";
                }
            }

        }
    }
?>