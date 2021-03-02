<?php
    sleep(5);
    session_start();
?>
<style>
.incorrect{
    display: none;
}
</style>
<div>
    <!-- Page Heading -->
    <h1 class="h1 mb-4 text-gray-800">Settings</h1>

    <!-- EMAIL CHANGING -->
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

        <button type="submit" class="sub btn btn-primary email-submit-button">Change</button>

        <button class="btn btn-primary email-loading-button d-none" type="button" disabled>
            <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
            Loading...
        </button>

    </form>

    <div id="email-result"></div>

    <!-- EMAIL CHANGING ENDS HERE -->


    <!-- PASSWORD CHANGING -->

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

    <button type="submit" class="btn btn-primary password-submit-button">Submit</button>

    <button class="btn btn-primary d-none password-loading-button" type="button" disabled>
        <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
        Loading...
    </button>

    </form>
    <div id="passwd-result"></div>


    <!-- PASSWORD CHANGING ENDS HERE -->


    <!-- VARIFICATION CODE CHANGING  -->

    <div class="mt-4 mb-4">
        <h1 class="h3 mb-0 text-gray-600">Change Varification Code</h1>
    </div>

    <form onsubmit = "return validateVerify()">

        <div class="form-group">
            <label for="class">Current Varification Code:</label>
            <input onfocus = "offValidate('currentPasswd2')" type="password" class="form-control" id="currentPasswd2" aria-describedby="emailHelp">
            <div class="invalid-feedback">Please enter a valid Passwd.</div>
        </div>

        <div class="form-group">
            <label for="initials">New Varification Code:</label>
            <input onfocus = "offValidate('newPasswd2')" type="password" class="form-control" id="newPasswd2" aria-describedby="emailHelp">
            <div class="invalid-feedback">Please enter a valid new password.</div>
        </div>

        <div class="form-group">
            <label for="initials">Confirm Varification Code:</label>
            <input onfocus = "offValidate('confirmPasswd2')" type="password" class="form-control" id="confirmPasswd2" aria-describedby="emailHelp">
            <div class="text-danger incorrect">Password mot matched.</div>
            <div class="invalid-feedback">Please enter valid confirm password.</div>
        </div>

        <div id="verify-message">

        </div>

        <button type="submit" class="btn btn-primary verify-submit-button">Submit</button>

        <button class="btn btn-primary verify-loading-button d-none" type="button" disabled>
            <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
            Loading...
        </button>

    </form>

    </div>
<div id="verify-result"></div>

<!-- VARIFICATION CODE CHANGING ENDS HERE -->



<script>
    function validateEmail(){
        var email = document.getElementById("email");
        if(email.value == ""){
            email.classList.add("is-invalid");
        }
        else{
            $(".email-submit-button").addClass("d-none");
            $(".email-loading-button").removeClass("d-none");
            $("#email-result").load("Process/ChangeEmail.php",{email: email.value, submit: "set"}, function(){
                $("#email-message").load("message/message.php",{}, function(){
                    $(".email-submit-button").removeClass("d-none");
                    $(".email-loading-button").addClass("d-none");
                });
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
            $(".password-submit-button").addClass("d-none");
            $(".password-loading-button").removeClass("d-none");
            $("#passwd-result").load("Process/ChangePasswd.php", {current: currentPasswd.value, new: newPasswd.value, Submit: 'set'},function(){
                $('#passwd-message').load("message/message.php",{}, function(){
                    $(".password-submit-button").removeClass("d-none");
                    $(".password-loading-button").addClass("d-none")
                });
            });
        }
        return false;
    }

    function validateVerify(){
        var currentPasswd = document.getElementById("currentPasswd2");
        var newPasswd = document.getElementById("newPasswd2");
        var confirmPasswd = document.getElementById("confirmPasswd2");
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
            $(".verify-submit-button").addClass("d-none");
            $(".verify-loading-button").removeClass("d-none");
            $("#verify-result").load("Process/ChangeVerification.php", {current: currentPasswd.value, new: newPasswd.value, Submit: 'set'},function(){
                $('#verify-message').load("message/message.php",{}, function(){
                    $(".verify-submit-button").removeClass("d-none");
                    $(".verify-loading-button").addClass("d-none");
                });
            });
        }
        return false;
    }

    function offValidate(param){
        document.getElementById(param).classList.remove("is-invalid");
        $(".incorrect").hide();
    }
</script>

