<?php
    session_start();
    $teacherId = $_SESSION['TeachersId'];
    include_once("../include/connection.php");

    // Classes
    $sql = "SELECT * FROM teachersclass";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    $class = "";
    if($row > 0){
        while($row = mysqli_fetch_assoc($result)){
            $class.= '<option vlaue="'.$row['code'].'">'.$row['code'].'</option>';
        }
    }
    else{
        $class = "Classes not yet registered";
    }


    // Sections
    $sql = "SELECT * FROM term";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    $term = "";
    if($row > 0){
        while($row = mysqli_fetch_assoc($result)){
            $term.= '<option vlaue="'.$row['termId'].'">'.$row['termId'].'</option>';
        }
    }
    else{
        $term = "Subjects not yet registered";
    }

?>

<style>
.load{
    display: none;
}
</style>
<!-- ADD CLASS DESIGN -->
<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add marks and subject</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <form onsubmit = "return validate()">

    <div class="form-group">
        <label for="class">Class</label>
        <select onfocus = "offValidate('class')" class="form-control" name="" id="class">
            <option value="Nill">Select Class</option>
            <?php echo $class; ?>
        </select>
        <div class="invalid-feedback">Please select a valid class.</div>
    </div>

    <div class="form-group">
        <label for="class">Term</label>
        <select onfocus = "offValidate('term')" class="form-control" name="" id="term">
            <option value="Nill">Select Term</option>
            <?php echo $term; ?>
        </select>
        <div class="invalid-feedback">Please select a valid term.</div>
    </div>

    <div id="message">

    </div>

    <button type="submit" class="sub btn btn-primary"><b>Next</b> <i class="ml-2 fa fa-arrow-down"></i></button>

    <button class="load btn btn-primary" type="button" disabled>
        <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
        Loading...
    </button>

    </form>

</div>

<div id="ajax-load"></div>
<div id="resul"></div>

<script>
    function validate(){
        var Class = document.getElementById("class");
        var term = document.getElementById("term");
        if(Class.value == "Nill"){
            Class.classList.add("is-invalid");
        }

        if(term.value == "Nill"){
            term.classList.add("is-invalid");
        }

        if(Class.value != "Nill" && term.value != "Nill"){
            
            $("#ajax-table").load("Ajax/ViewMarksTable.php", {Class: Class.value, term: term.value, Submit: 'set'},function(){
                // $('#message').load("message/message.php");
            });
        }
        return false;
    }

    function offValidate(param){
        document.getElementById(param).classList.remove("is-invalid");
    }

    $(document).ajaxStart(function(){
            $(".load").css("display", "block");
            $(".sub").css("display", "none");
            });
    $(document).ajaxComplete(function(){
            $(".sub").css("display", "block");
            $(".load").css("display", "none");
            });
</script>


<br>


<div id="ajax-table">

</div>
