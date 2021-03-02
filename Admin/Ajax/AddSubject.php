<?php session_start(); ?>
<style>
.load{
    display: none;
}
</style>
<!-- ADD CLASS DESIGN -->
<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Subject</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <form onsubmit = "return validate()">

    <div class="form-group">
        <label for="class">Subject</label>
        <input onfocus = "offValidate('class')" type="text" class="form-control" id="class" aria-describedby="emailHelp" Placeholder="Chesmistry">
        <div class="invalid-feedback">Please enter a valid class.</div>
    </div>

    <div class="form-group">
        <label for="initials">Subject Code</label>
        <input onfocus = "offValidate('initials')" type="text" class="form-control" id="initials" aria-describedby="emailHelp" placeholder="CHEM">
        <div class="invalid-feedback">Please enter a valid initials.</div>
        <small id="emailHelp" class="form-text text-muted">SUB CODE - First four-five letters of the subject</small>
        <small id="emailHelp" class="form-text text-muted">Physics - PHYS</small>
        <small id="emailHelp" class="form-text text-muted">English Language - ELAN</small>
        <small id="emailHelp" class="form-text text-muted">Hindi Literature - HLIT</small>
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
        $("#ajax-table").load("Ajax/LoadSubjectsTable.php");
    });
    function validate(){
        var Class = document.getElementById("class");
        var Initial = document.getElementById("initials");
        if(Class.value == ""){
            Class.classList.add("is-invalid");
        }
        if(Initial.value == ""){
            Initial.classList.add("is-invalid");
        }
        if(Class.value != "" && Initial.value != ""){
            ajaxstart_subButton();
            $("#ajax-load").load("Process/AddSubject.php", {Subject: Class.value, SubjectId: Initial.value, Submit: 'set'},function(){
                $("#ajax-table").load("Ajax/LoadSubjectsTable.php");
                $('#message').load("message/message.php",{},function(){
                    ajaxstop_subButton();
                });
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
