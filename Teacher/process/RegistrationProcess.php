<?php
session_start();
    if(isset($_POST['Submit'])){

        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $PhoneNo = $_POST['PhoneNo'];
        $Class = $_POST['Class'];
        $Passwd = $_POST['Passwd'];
        $Code = $_POST['Code'];
        $teacherId = TeacherId($Name, $Class);
        $HashedCode = password_hash($Code, PASSWORD_DEFAULT);
        echo $Name;
        // echo TeacherId($Name,$Class);
        // echo $Code;
        if(VarificationCodeCheck($Code)){

            // Checking if the data given by the user is unique or not dynamically
            $CheckClass = check($Class);
            $CheckEmail = check($Email);
            $CheckPhone = check($PhoneNo);


            if($CheckClass){
                $_SESSION['errorMessage'] = "Class already Exists";
                header("location: ../register.php");
            }
            else if($CheckEmail){
                $_SESSION['errorMessage'] = "Email already exists";
                header("location: ../register.php");
            }
            else if($CheckPhone){
                $_SESSION['errorMessage'] = "Phone no. already exists";
                header("location: ../register.php");
            }
            else{
                AddToDatabase();
            }
        }

        else{
            $_SESSION['errorMessage'] = "Varification code error...!";
            header("location: ../register.php");
        }
    }


    function check($Para){

        if($Para == "NA"){
            return false;
        }
        else{
        $link = mysqli_connect("127.0.0.1", "root", "", "");
        mysqli_select_db($link,'emarks');
        if(ctype_digit($Para))
            $option = "phone";
        else if(filter_var($Para, FILTER_VALIDATE_EMAIL))
            $option = "email";
        else
            $option = "class";
        $sql = "SELECT * FROM authentication WHERE $option=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $Para);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $value = mysqli_num_rows($result);
        // echo $value;
        // echo mysqli_error($link);
        if($value > 0)
            return true;
        else
            return false;
        }
    }

    function VarificationCodeCheck($Para){

        include_once("../include/connection.php");
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($link, $sql);
        $value = mysqli_num_rows($result);
        if($value > 0){
            while($row = mysqli_fetch_assoc($result)) {
                $hashed_password = $row['Varification'];
                if(password_verify($Para, $hashed_password)){
                    return true;
                }
                else{
                    echo mysqli_error($link);
                    return false;
                }

            }
        }
        else
        echo mysqli_error($link);
            return false;

    }

    function TeacherId($Para,$Class){
        $EditedName = strtoupper(substr(str_replace(' ', '', $Para),0,4));
        return $EditedName.'-'.$Class;
    }

    function AddToDatabase(){
        $link = mysqli_connect("127.0.0.1", "root", "", "");
        mysqli_select_db($link,'emarks');
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $PhoneNo = $_POST['PhoneNo'];
        $Class = $_POST['Class'];
        $Passwd = $_POST['Passwd'];
        $Code = $_POST['Code'];
        $teacherId = TeacherId($Name, $Class);
        $HashedPasswd = password_hash($Passwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO authentication (name, email, phone, passwd, class, teacherId) VALUES (?,?,?,?,?,?)";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $Name, $Email, $PhoneNo, $HashedPasswd,$Class, $teacherId);

            $result = mysqli_stmt_execute($stmt);
            if($result){
                $_SESSION["successMessage"] = "Account created successfully";
                header("location: ../login.php");
            }
            else{
                $_SESSION["errorMessage"] = "Try again";
                header("location: ../register.php");
                // echo mysqli_error($link);
            }

        }
    }
?>