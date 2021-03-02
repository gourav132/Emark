<?php
session_start();
    // sleep(5);
    if(isset($_POST['Submit'])){
        // echo "Hello";
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $classWithSubId = $subject."-".$class;
        // echo $classWithSubId;
        include_once("../include/connection.php");

        $sql = "SELECT * FROM classwtsubject WHERE classWtSubId=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $classWithSubId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $value = mysqli_num_rows($result);
        // echo $value;
        // echo mysqli_error($link);
        if($value > 0)
        {
            $_SESSION["errorMessage"] ="Combination - ".$classWithSubId." already registered";
            // echo mysqli_error($link);
        }
        else
        {
            $sql = "INSERT INTO classwtsubject (classId, subjectId, classWtSubId) VALUES (?,?,?)";
            if($stmt = mysqli_prepare($link, $sql))
            {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $class, $subject, $classWithSubId);
                // echo mysqli_error($link);
                $result = mysqli_stmt_execute($stmt);
                if($result)
                {
                    $_SESSION["successMessage"] = "Combination - ".$classWithSubId." resistered successfully";
                }
                else
                {
                    // echo mysqli_error($link);
                    $_SESSION["errorMessage"] = "Try again";
                }
                // echo mysqli_error($link);
            }

        }
    }
?>