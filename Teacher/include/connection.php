<?php
    $link = mysqli_connect("127.0.0.1", "root", "", "");

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    else{
        // echo 'successfully connected to the servers'.'<br/>';
    }
    // connecting to the database
    if(!mysqli_select_db($link,'emarks')){
        // echo mysqli_error($link).'<br/>';
    }
    else{
        // echo 'database connected'.'<br/>';
    }
?>