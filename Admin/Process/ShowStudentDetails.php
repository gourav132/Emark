<?php sleep(5); ?>
<div id="main2">
<h1>Student of class <?php echo $_POST['classWtSecId']?></h1>

<!-- Back button -->
<button onclick="back()" class="mb-3 mt-3 btn btn-primary">
    <svg class="back-arrow" width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
    </svg>
    <span class="spin spinner-border spinner-border-sm mb-1 d-none" role="status" aria-hidden="true"></span>
</button>
<!-- End of back button -->


<?php
include_once("../include/connection.php");
$classWtSecId = $_POST['classWtSecId'];
?>

<div class="table-responsive">

<table class="table table-dark table-hover">

    <thead>
    <tr>
    <th scope="col">Roll No</th>
    <th scope="col">Student's Name</th>
    <th scope="col">Father's Name</th>
    <th scope="col">Mother's Name</th>
    <th scope="col">Gender</th>
    <th scope="col">Phone No</th>
    <th scope="col">Aadhar No</th>
    <th scope="col">Addmission No</th>
    <th scope="col">Class</th>
    </tr>
    </thead>


    <tbody>

    <?php

    $sql = "SELECT * FROM students WHERE class='$classWtSecId' ORDER BY rollno ASC";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
    while($row = mysqli_fetch_assoc($result)){
        $roll = $row['rollno'];
        $name = $row['name'];
        $father = $row['father'];
        $mother = $row['mother'];
        $phone = $row['phone'];
        $gender = $row['gender'];
        $admission = $row['admission'];
        $aadhar = $row['adhaar'];
        $class = $row['class'];

    ?>

    <tr>
    <th scope="row"><?php echo $roll; ?></th>
    <td><?php echo $name; ?></td>
    <td><?php echo $father; ?></td>
    <td><?php echo $mother; ?></td>
    <td><?php echo $gender; ?></td>
    <td><?php echo $phone; ?></td>
    <td><?php echo $aadhar; ?></td>
    <td><?php echo $admission; ?></td>
    <td><?php echo $class; ?></td>
    </tr>

    <?php

    }
    }


    ?>


    </tbody>
</table>


</div>

<script>

function back(){
    $(".spin").removeClass("d-none");
    $(".back-arrow").addClass("d-none");
    $("#main").load("Ajax/StudentsDetail.php",{},function(){
        $(".spin").addClass("d-none");
        $(".back-arrow").removeClass("d-none");
    });
}

</script>

</div>