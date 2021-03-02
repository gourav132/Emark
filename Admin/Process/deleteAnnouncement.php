<?php
session_start();
    if(isset($_POST['submit'])){
        
        include_once("../include/connection.php");
    
        $slno = $_POST['id'];

        $sql = "DELETE FROM announcement WHERE slno='$slno'";

        if (mysqli_query($link, $sql)) {
            $_SESSION['successMessage'] = "Announcement deleted successfully";
        } else {
            $_SESSION['errorMessage' ] = "Try again";
        }
    }

?>