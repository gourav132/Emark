<?php
session_start();
    // sleep(5);
    if(isset($_POST['Submit'])){
        // echo "Hello";
        $class = $_POST['class'];
        $section = $_POST['section'];
        $classWithSecId = $class."-".$section;
        // echo $classWithSecId;
        include_once("../include/connection.php");

        $sql = "SELECT * FROM classwtsection WHERE classWtSecId=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $classWithSecId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $value = mysqli_num_rows($result);
        // echo $value;
        // echo mysqli_error($link);
        if($value > 0)
        {
            $_SESSION["errorMessage"] ="Combination - ".$classWithSecId." already registered";
            // echo mysqli_error($link);
        }
        else
        {
            $sql = "INSERT INTO classwtsection (classId, sectionId, classWtSecId) VALUES (?,?,?)";
            if($stmt = mysqli_prepare($link, $sql))
            {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sss", $class, $section, $classWithSecId);
                // echo mysqli_error($link);
                $result = mysqli_stmt_execute($stmt);
                if($result)
                {
                    $_SESSION["successMessage"] = "Combination - ".$classWithSecId." resistered successfully";
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