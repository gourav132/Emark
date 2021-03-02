<!-- <title>Admin - Manage Section</title> -->
<?php session_start(); ?>
<style>
    .load{
        display: none;
    }
</style>

<div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Section</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <form onsubmit = "return validate()">

        <div class="form-group">
            <label for="class">Section ID</label>
            <input onfocus = "offValidate('section')" type="text" class="form-control" id="section" aria-describedby="emailHelp">
            <div class="invalid-feedback">Please enter a valid section.</div>
            <small id="emailHelp" class="form-text text-muted">Eg. for section a - A </small>
        </div>

        <div id="message"></div>

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
        $("#ajax-table").load("Ajax/LoadSectionTable.php");
    });
    function validate(){
        var section = document.getElementById("section");
        if(section.value == ""){
            section.classList.add("is-invalid");
        }
        if(section.value != ""){
            ajaxstart_subButton();
            $("#ajax-load").load("Process/AddSection.php", {Section: section.value, Submit: 'set'},function(){
                $("#ajax-table").load("Ajax/LoadSectionTable.php");
                $('#message').load("message/message.php",{}, function(){
                    ajaxstop_subButton();
                });
            });
        }
        return false;
    }

    function offValidate(param){
        document.getElementById(param).classList.remove("is-invalid");
    }

    // $(document).ajaxStart(function(){
    //         $(".load").css("display", "block");
    //         $(".sub").css("display", "none");
    //         });
    // $(document).ajaxComplete(function(){
    //         $(".sub").css("display", "block");
    //         $(".load").css("display", "none");
    //         });
</script>

<div id="ajax-table">

</div>