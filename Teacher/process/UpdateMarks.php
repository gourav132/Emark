<?php
    session_start();
    if(isset($_POST['submit'])){
        $class = $_POST['classCode'];
        $admission = $_POST['admission'];
        $rollno = $_POST['rollno'];
        $term = $_POST['term'];
        $subject = $_POST['subject'];
        $marks = $_POST['marks'];
        include_once("../include/connection.php");
        $sql = "UPDATE marks SET marks= ? WHERE admission=? AND termId=? AND subjectId = ? AND rollno = ?";
                if($stmt = mysqli_prepare($link, $sql))
                {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sssss", $marks, $admission, $term, $subject, $rollno);
        
                    $result = mysqli_stmt_execute($stmt);
                    if($result)
                    {
                        $_SESSION["success"] = "Marks Updated";
                    }
                    else
                    {
                        $_SESSION["error"] = "Try again";
                    }
                }

    }
?> 
