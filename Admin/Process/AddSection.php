<?php
session_start();
if(isset($_POST['Submit']))
{
    include_once("../include/connection.php");
    $Section = $_POST['Section'];
    $SectionId = strtoupper($Section);

    $sql = "SELECT * FROM section WHERE section=? AND sectionId=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $Section, $SectionId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $value = mysqli_num_rows($result);
    // echo $value;
    echo mysqli_error($link);
    if($value > 0)
    {
        $_SESSION["errorMessage"] ="Section - ".$SectionId." already registered";
    }
    else
    {
        $sql = "INSERT INTO section (section, sectionId) VALUES (?,?)";
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $Section, $SectionId);

            $result = mysqli_stmt_execute($stmt);
            if($result)
            {
                $_SESSION["successMessage"] = "Section - ".$SectionId." resistered successfully";
            }
            else
            {
                $_SESSION["errorMessage"] = "Try again";
            }
        }

    }
}
?>


