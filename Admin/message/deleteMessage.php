<?php session_start(); ?>
<div>
    <?php 
    if(isset($_SESSION['error']))
    {
        $message = $_SESSION['error'];
        ?>
        <p class="text-danger" style = "text-align: center;"><?php echo $message; ?></p>
        <?php
    }
    unset($_SESSION["error"]);
    ?>            
</div>

<div>
    <?php 
    if(isset($_SESSION['success']))
    {
        $message = $_SESSION['success'];
        ?>
        <p class="text-success" style = "text-align: center;"><?php echo $message; ?></p>
        <?php
    }
    unset($_SESSION["success"]);
    ?>            
</div>