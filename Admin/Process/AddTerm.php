<?php
session_start();
if(isset($_POST['Submit']))
{
    include_once("../include/connection.php");
    $term = $_POST['term'];
    $termId = strtoupper($term);

    $sql = "SELECT * FROM term WHERE term=? AND termId=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $term, $termId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $value = mysqli_num_rows($result);
    // echo $value;
    echo mysqli_error($link);
    if($value > 0)
    {
        $_SESSION["errorMessage"] ="Term - ".$termId." already registered";
    }
    else
    {
        $sql = "INSERT INTO term (term, termId) VALUES (?,?)";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $term, $termId);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["successMessage"] = "Term - ".$termId." resistered successfully";
            }
            else
            {
                $_SESSION["errorMessage"] = "Try again";
            }
        }

    }
}
?>


