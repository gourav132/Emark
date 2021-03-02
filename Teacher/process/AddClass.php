<?php
sleep(3);
session_start();
$teacherId = $_SESSION['TeachersId'];
if(isset($_POST['Submit']))
{
    include_once("../include/connection.php");
    $Class = $_POST['Class'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    // Checking if the Class and the Initials are already registered or not
    $sql = "SELECT * FROM teachersclass WHERE classId=? AND sectionId=? AND subjectId=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $Class, $section, $subject);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $value = mysqli_num_rows($result);
    // echo $value;
    // echo mysqli_error($link);
    if($value > 0)
    {
        $_SESSION["errorMessage"] = "Class already taken";
    }
    else
    {
        $sql = "SELECT * FROM classwtsection WHERE classId=? AND sectionId=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $Class, $section);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $value = mysqli_num_rows($result);
        // echo $value;
        // echo mysqli_error($link);
        if($value == 0){
            $_SESSION['errorMessage'] = "Section Class Error";
        }
        else{
            $sql = "SELECT * FROM classwtsubject WHERE classId=? AND subjectId=?";
            $stmt = mysqli_prepare($link, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $Class, $subject);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $value = mysqli_num_rows($result);
            // echo $value;
            // echo mysqli_error($link);
            if($value == 0){
                $_SESSION['errorMessage'] = "Subject Class Error";
            }
            else{
                $code = $Class."-".$section."-".$subject;
                $sql = "INSERT INTO teachersclass (classId, sectionId, subjectId, teacherId, code) VALUES (?,?,?,?,?)";
                if($stmt = mysqli_prepare($link, $sql))
                {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sssss", $Class, $section, $subject, $teacherId, $code);
        
                    $result = mysqli_stmt_execute($stmt);
                    if($result)
                    {
                        $_SESSION["successMessage"] = "conbination added";
                    }
                    else
                    {
                        $_SESSION["errorMessage"] = "Try again";
                    }
            }
        }
    }
}
}
?>


