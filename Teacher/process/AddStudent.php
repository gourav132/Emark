<?php 
    session_start();
    sleep(5);
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $father = $_POST['father'];
        $mother = $_POST['mother'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $admission = $_POST['admission'];
        $adhaar = $_POST['adhaar'];
        $rollno = $_POST['rollno'];
        $class = $_SESSION['TeachersClass'];
        
        include_once("../include/connection.php");
        // Checking if the student is already registered or not
        // $sql = "SELECT * FROM students WHERE admission=? OR rollno = ?";
        $sql = "SELECT * FROM students WHERE class=? AND rollno = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $class, $rollno);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $value = mysqli_num_rows($result);
        if($value > 0)
        {
            // mysqli_error($link);
            $_SESSION["errorMessage"] = "Roll no. already taken";
        }
        else
        {
            
            $sql = "INSERT INTO students (name, father, mother, phone, gender, admission, adhaar, class, rollno) VALUES (?,?,?,?,?,?,?,?,?)";
                if($stmt = mysqli_prepare($link, $sql))
                {
                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, "sssssssss", $name, $father, $mother, $phone, $gender, $admission, $adhaar, $class, $rollno);
        
                    $result = mysqli_stmt_execute($stmt);
                    if($result)
                    {
                        $_SESSION["successMessage"] = "conbination added";
                    }
                    else
                    {
                        // echo mysqli_error($link);
                        $_SESSION["errorMessage"] = "Try again";
                    }
            }
        }
    }
?>