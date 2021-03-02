<div id="main">

<!-- Connecting to database -->
<?php session_start();
sleep(5);
    include_once("../include/connection.php");
?>

<h1>Student details</h1>
<h3 class="mt-3">Select class</h3>

<div class="table-responsive">

<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Classes</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
  
    $sql = "SELECT * FROM classwtsection";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
    while($row = mysqli_fetch_assoc($result)){
    $class = $row['classWtSecId'];

  ?>

    <tr onclick="show('<?php echo $class; ?>')">
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

    function show(para){
      var classWtSecId = para;
      ajaxCallStart();
      $("#main").load("Process/ShowStudentDetails.php",{classWtSecId: classWtSecId}, function(){
        ajaxCallStop();
      });

    }
    function ajaxCallStart(){
    $(".loading").removeClass("d-none");
};
function ajaxCallStop(){
    $(".loading").addClass("d-none");
};

</script>

</div>