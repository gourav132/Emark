<?php
sleep(5);
session_start();
if(isset($_POST['Submit']))
{
    include_once("../include/connection.php");
    $Class = $_POST['Class'];
    $initials = $_POST['Initial'];
    // Checking if the Class and the Initials are already registered or not
    $sql = "SELECT * FROM class WHERE class=? AND classId=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $Class, $initials);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $value = mysqli_num_rows($result);
    // echo $value;
    echo mysqli_error($link);
    if($value > 0)
    {
        $_SESSION["errorMessage"] = "Class - ".$initials." already registered";
    }
    else
    {
        $sql = "INSERT INTO class (class, classId) VALUES (?,?)";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $Class, $initials);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["successMessage"] = "Class - ".$initials." resistered successfully";
            }
            else
            {
                $_SESSION["errorMessage"] = "Try again";
            }
        }

    }
}
?>


