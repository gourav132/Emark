<?php session_start();

    include_once("../include/connection.php");

?>



<div id="main">

<h1 class="mb-3">Teacher details</h1>

<div class="table-responsive">

<table class="table table-dark table-hover">
  <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Class</th>
        <th scope="col">Phone</th>
        <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
  
    $sql = "SELECT * FROM authentication";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
    while($row = mysqli_fetch_assoc($result)){
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        $class = $row['class'];

  ?>

    <tr>
        <td><?php echo $name; ?></td>
        <td><?php echo $class; ?></td>
        <td><?php echo $phone; ?></td>
        <td><?php echo $email; ?></td>
    </tr>

  <?php
  
    }
  }
    
    ?>


  </tbody>
</table>

</div>


<script>

    function show(para){
      var classWtSecId = para;
      $("#main").load("Process/ShowStudentDetails.php",{classWtSecId: classWtSecId}, function(){});

    }

</script>

</div>