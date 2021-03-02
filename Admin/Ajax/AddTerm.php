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
        <h1 class="h3 mb-0 text-gray-800">Add Terms</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <form onsubmit = "return validate()">

        <div class="form-group">
            <label for="class">Term</label>
            <input onfocus = "offValidate('term')" type="text" class="form-control" id="term" aria-describedby="emailHelp">
            <div class="invalid-feedback">Please enter a valid term.</div>
            <!-- <small id="emailHelp" class="form-text text-muted">Exp. for section a - A </small> -->
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
        $("#ajax-table").load("Ajax/LoadTermsTable.php");
    });
    function validate(){
        var term = document.getElementById("term");
        if(term.value == ""){
            term.classList.add("is-invalid");
        }
        if(term.value != ""){

            ajaxstart_subButton();
            $("#ajax-load").load("Process/AddTerm.php", {term: term.value, Submit: 'set'},function(){
                $("#ajax-table").load("Ajax/LoadTermsTable.php");
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

</script>

<div id="ajax-table">

</div>