
<?php 
    session_start();
    $class = $_SESSION['TeachersClass'];    
?>
<div>
<div id="main">

    <h1>Report Card</h1>
    <h3>Select student</h3>

    <table class="mt-3 table table-dark table-hover">
    <thead>
        <tr>
        <th scope="col">Roll No</th>
        <th scope="col">Name</th>
        <th scope="col">Admission No</th>
        </tr>
    </thead>
    <tbody>
    <?php

    include_once("../include/connection.php");

    $sql = "SELECT * FROM students WHERE class='$class' ORDER BY rollno ASC";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
        while($row = mysqli_fetch_assoc($result)){
            $name = $row['name'];
            $rollno = $row['rollno'];
            $admission = $row['admission'];

    ?>
        <tr onclick="result('<?php echo $admission; ?>')">
        <th scope="row"><?php echo $rollno; ?></th>
        <td><?php echo $name; ?></td>
        <td><?php echo $admission; ?></td>
        </tr>
    <?php 
        }
    }
    ?>
    </tbody>
    </table>


    <script>
    
    function result(para){
        ajaxCallStart();
        $("#main").load("Ajax/Term.php", {adminNo: para}, function(){
            ajaxCallStop();
        });

    }
    
    </script>


</div>
</div>