<?php
sleep(3);
    session_start();
    $teacherId = $_SESSION['TeachersId'];
    include_once("../include/connection.php");

    // Classes
    $sql = "SELECT * FROM class";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    $class = "";
    if($row > 0){
        while($row = mysqli_fetch_assoc($result)){
            $class.= '<option vlaue="'.$row['classId'].'">'.$row['classId'].'</option>';
        }
    }
    else{
        $class = "Classes not yet registered";
    }

    // Subjects
    $sql = "SELECT * FROM subject";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    $subject = "";
    if($row > 0){
        while($row = mysqli_fetch_assoc($result)){
            $subject.= '<option vlaue="'.$row['subjectId'].'">'.$row['subjectId'].'</option>';
        }
    }
    else{
        $subject = "Subjects not yet registered";
    }

    // Sections
    $sql = "SELECT * FROM section";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    $section = "";
    if($row > 0){
        while($row = mysqli_fetch_assoc($result)){
            $section.= '<option vlaue="'.$row['sectionId'].'">'.$row['sectionId'].'</option>';
        }
    }
    else{
        $section = "Subjects not yet registered";
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
    <h1 class="h3 mb-0 text-gray-800">Add class to your profile</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <form onsubmit = "return validate()">

    <div class="form-group">
        <!--
        <input onfocus = "offValidate('class')" type="text" class="form-control" id="class" aria-describedby="emailHelp">
        <div class="invalid-feedback">Please enter a valid class.</div> -->
        <label for="class">Class</label>
        <select onfocus = "offValidate('class')" class="form-control" name="" id="class">
            <option value="Nill">Select Class</option>
            <?php echo $class; ?>
        </select>
        <div class="invalid-feedback">Please select a valid class.</div>
    </div>

    <div class="form-group">
        <!-- <input onfocus = "offValidate('initials')" type="text" class="form-control" id="initials" aria-describedby="emailHelp">
        <div class="invalid-feedback">Please enter a valid initials.</div>
        <small id="emailHelp" class="form-text text-muted">Roman Nummerals for class initials (Eg: XII, III, UKG, LKG)</small> -->
        <label for="section">Section</label>
        <select onfocus = "offValidate('section')" class="form-control" id="section">
            <option value="Nill">Select Section</option>
            <?php echo $section; ?>
        </select>
        <div class="invalid-feedback">Please select a valid section.</div>
    </div>

    <div class="form-group">
        <!-- <input onfocus = "offValidate('initials')" type="text" class="form-control" id="initials" aria-describedby="emailHelp">
        
        <small id="emailHelp" class="form-text text-muted">Roman Nummerals for class initials (Eg: XII, III, UKG, LKG)</small> -->
        <label for="section">Subject</label>
        <select onfocus = "offValidate('subject')" class="form-control" id="subject">
            <option value="Nill">Select Subject</option>
            <?php echo $subject; ?>
        </select>
        <div class="invalid-feedback">Please select a valid subject.</div>
    </div>

    <div id="message">

    </div>

    <button type="submit" class="sub btn btn-primary">Submit</button>

    <button class="load btn btn-primary" type="button" disabled>
        <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
        Loading...
    </button>

    </form>

</div>

<div id="ajax-load"></div>

<script>
    $(document).ready(function(){
        $("#ajax-table").load("Ajax/LoadClassTable.php");
    });

    function validate(){
        var Class = document.getElementById("class");
        var section = document.getElementById("section");
        var subject = document.getElementById("subject");
        if(Class.value == "Nill"){
            Class.classList.add("is-invalid");
        }
        if(section.value == "Nill"){
            section.classList.add("is-invalid");
        }
        if(subject.value == "Nill"){
            subject.classList.add("is-invalid");
        }
        if(Class.value != "Nill" && section.value != "Nill" && subject.value != "Nill"){
            ajaxstart_subButton();
            $("#ajax-load").load("process/AddClass.php", {Class: Class.value, section: section.value, subject: subject.value, Submit: 'set'},function(){
                $("#ajax-table").load("Ajax/LoadClassTable.php");
                $('#message').load("message/message.php");
                ajaxstop_subButton();
            });
        }
        return false;
    }

    function offValidate(param){
        document.getElementById(param).classList.remove("is-invalid");
    }

</script>


<br>


<div id="ajax-table">

</div>
