<?php 
    session_start();
    if(isset($_POST['submit'])){
        $class = $_POST['classCode'];
        $admission = $_POST['admission'];
        $rollno = $_POST['rollno'];
        $term = $_POST['term'];
        $subject = $_POST['subject'];
        $marks = $_POST['marks'];
        echo $admission,$rollno,$term,$subject,$marks;
        include_once("../include/connection.php");
        $sql = "INSERT INTO marks (admission, rollno, classWtSecId, termId, subjectId, marks) VALUES (?,?,?,?,?,?)";
                if($stmt = mysqli_prepare($link, $sql))
                {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "ssssss", $admission, $rollno, $class, $term, $subject, $marks);
        
                    $result = mysqli_stmt_execute($stmt);
                    if($result)
                    {
                        $_SESSION["success"] = "conbination added";
                    }
                    else
                    {
                        $_SESSION["error"] = "Try again";
                    }
                }

    }
?> 
