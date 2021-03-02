<?php
    session_start();
    if(isset($_POST['submit']))
    {
        $email = $_POST['Email'];
        $passwd = $_POST['Passwd'];
        include_once("../include/connection.php");
        $sql = "SELECT * FROM authentication WHERE email=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // echo mysqli_num_rows($result);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $class = $row['class'];
            $hashed_password = $row['passwd'];
            if(password_verify($passwd, $hashed_password)) {
                $_SESSION['TeachersName'] = $name;
                $_SESSION['TeachersClass'] = $class;
                $_SESSION['TeachersId'] = $row['teacherId'];
                header("location: ../index.php");
            } 
            else
            {
                $_SESSION["errorMessage"] = "Invalid Password";
                header("location:../login.php");
            }
            // echo mysqli_error($link);
            }
        }
        else
        {
            $_SESSION["errorMessage"] = "Invalid Credentials";
            header("location:../login.php");
        }
    }

?>