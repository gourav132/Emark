<?php
session_start();
if(isset($_POST['Submit']))
{
    include_once("../include/connection.php");
    $subject = $_POST['Subject'];
    $subjectId = strtoupper($_POST['SubjectId']);
    // Checking if the Class and the Initials are already registered or not
    $sql = "SELECT * FROM subject WHERE subject=? AND subjectId=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $subject, $subjectId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $value = mysqli_num_rows($result);
    // echo $value;
    echo mysqli_error($link);
    if($value > 0)
    {
        $_SESSION["errorMessage"] = "Subject - ".$subject." already registered";
    }
    else
    {
        $sql = "INSERT INTO subject (subject, subjectId) VALUES (?,?)";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $subject, $subjectId);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["successMessage"] = "Subject - ".$subject." resistered successfully";
            }
            else
            {
                $_SESSION["errorMessage"] = "Try again";
            }
        }

    }
}
?>


