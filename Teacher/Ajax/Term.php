<?php 
    session_start();
    $class = $_SESSION['TeachersClass'];
    $adminNo = $_POST['adminNo'];    
?>

    <h1>Report Card</h1>
    <h3>Select student</h3>

    <button onclick="back()" class="mb-3 mt-3 btn btn-primary">

        <svg class="back-arrow" width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>

        <span class="spin spinner-border spinner-border-sm mb-1 d-none" role="status" aria-hidden="true"></span>

    </button>

    <table class="table table-dark table-hover">
    <thead>
        <tr>
        <th scope="col">Terms</th>
        </tr>
    </thead>
    <tbody>
    <?php

    include_once("../include/connection.php");

    $sql = "SELECT * FROM term";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
        while($row = mysqli_fetch_assoc($result)){
            $term = $row['termId'];

    ?>
        <tr onclick="result('<?php echo $adminNo; ?>','<?php echo $term; ?>')">
        <td><?php echo $term; ?></th>
        </tr>
    <?php 
        }
    }
    ?>
    </tbody>
    </table>


    <script>
    
    function result(adminNo,termId){
        ajaxCallStart();
        $("#main").load("process/ShowReportCard.php", {adminNo: adminNo, termId: termId}, function(){
            ajaxCallStop();
        });

    }

    function back(){
        $(".spin").removeClass("d-none");
        $(".back-arrow").addClass("d-none");
        $("#main").load("Ajax/ReportCard2.php",{}, function(){
            $(".spin").addClass("d-none");
            $(".back-arrow").removeClass("d-none");
        });

    }
    
    </script>
