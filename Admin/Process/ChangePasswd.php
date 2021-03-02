<?php sleep(5);
    session_start();
    if(isset($_POST['Submit'])){
        $current = $_POST['current'];
        $new = $_POST['new'];
        // echo $current,$new;
        $user = $_SESSION['admin'];

        include_once("../include/connection.php");
        $sql = "SELECT * FROM admin WHERE AdminEmail=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $user);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)) {
                $hashed_password = $row['AdminPasswd'];
                if(password_verify($current, $hashed_password)) {
                    $hashPass = password_hash($new, PASSWORD_DEFAULT);
                    $sql = "UPDATE admin SET AdminPasswd=? WHERE AdminEmail=?";
                    if($stmt = mysqli_prepare($link, $sql)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "ss", $hashPass, $user);
            
                        $result2 = mysqli_stmt_execute($stmt);
                        if($result2){
                            $_SESSION["successMessage"] = "Password changed successfully";
                        }
                        else{
                            $_SESSION["errorMessage"] = "Password not changed try again";
                        }
            
                    }
                }
                else{
                    $_SESSION["errorMessage"] = "Wrong current password";
                }
            }
        }
        else{
            $_SESSION["errorMessage"] = "Try Again";
        }
}
?>