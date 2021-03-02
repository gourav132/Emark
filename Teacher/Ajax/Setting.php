<?php session_start(); ?>
<style>
.load{
    display: none;
}
.incorrect{
    display: none;
}
</style>
<div>
    <!-- Page Heading -->
    <h1 class="h1 mb-4 text-gray-800">Settings</h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-600">Change Email : </h1>
    </div>

    <form onsubmit = "return validateEmail()">

        <div class="form-group">
            <label for="class">New Email</label>
            <input onfocus = "offValidate('email')" type="text" class="form-control" id="email" aria-describedby="emailHelp">
            <div class="invalid-feedback">Please enter a valid class.</div>
        </div>

        <div id="email-message"></div>

        <button type="submit" class="sub btn btn-primary">Change</button>

        <button class="load btn btn-primary" type="button" disabled>
            <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
            Loading...
        </button>

    </form>

    <div id="email-result"></div>


    <div class="mt-4 mb-4">
        <h1 class="h3 mb-0 text-gray-600">Change Password</h1>
    </div>

    <form onsubmit = "return validate()">

    <div class="form-group">
        <label for="class">Current Password:</label>
        <input onfocus = "offValidate('currentPasswd')" type="password" class="form-control" id="currentPasswd" aria-describedby="emailHelp">
        <div class="invalid-feedback">Please enter a valid Passwd.</div>
    </div>

    <div class="form-group">
        <label for="initials">New Password:</label>
        <input onfocus = "offValidate('newPasswd')" type="password" class="form-control" id="newPasswd" aria-describedby="emailHelp">
        <div class="invalid-feedback">Please enter a valid new password.</div>
    </div>

    <div class="form-group">
        <label for="initials">Confirm Password:</label>
        <input onfocus = "offValidate('confirmPasswd')" type="password" class="form-control" id="confirmPasswd" aria-describedby="emailHelp">
        <div class="text-danger incorrect">Password mot matched.</div>
        <div class="invalid-feedback">Please enter valid confirm password.</div>
    </div>

    <div id="passwd-message">

    </div>

    <button type="submit" class="sub btn btn-primary">Submit</button>

    <button class="load btn btn-primary" type="button" disabled>
        <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
        Loading...
    </button>

    </form>
    </div>
<div id="passwd-result"></div>



<script>
    function validateEmail(){
        var email = document.getElementById("email");
        if(email.value == ""){
            email.classList.add("is-invalid");
        }
        else{
            $("#email-result").load("Process/ChangeEmail.php",{email: email.value, submit: "set"}, function(){
                $("#email-message").load("message/message.php");
            });
        }
        return false
    }


    function validate(){
        var currentPasswd = document.getElementById("currentPasswd");
        var newPasswd = document.getElementById("newPasswd");
        var confirmPasswd = document.getElementById("confirmPasswd");
        // console.log(currentPasswd.value);
        // console.log(newPasswd.value);
        // console.log(confirmPasswd.value);
        if(currentPasswd.value == ""){
            currentPasswd.classList.add("is-invalid");
        }
        if(newPasswd.value == ""){
            newPasswd.classList.add("is-invalid");
        }
        if(confirmPasswd.value == ""){
            confirmPasswd.classList.add("is-invalid");
        }
        if(newPasswd.value != confirmPasswd.value){
            $(".incorrect").show();
        }
        if(currentPasswd.value != "" && newPasswd.value != "" && newPasswd.value == confirmPasswd.value){

            $("#passwd-result").load("Process/ChangePasswd.php", {current: currentPasswd.value, new: newPasswd.value, Submit: 'set'},function(){
                $('#passwd-message').load("message/message.php");
            });
        }
        return false;
    }

    function offValidate(param){
        document.getElementById(param).classList.remove("is-invalid");
        $(".incorrect").hide();
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

