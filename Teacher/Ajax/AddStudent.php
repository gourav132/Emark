<?php
    session_start();
    $teacherId = $_SESSION['TeachersId'];
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
    <h1 class="h3 mb-0 text-gray-800">Add students to your class</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <form onsubmit = "return validate()">

    <div class="form-group">
        <label for="name">Full Name</label>
        <input onfocus = "offValidate('name')" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    <div class="form-group">
    <label for="gender">Gender</label>
        <select onfocus = "offValidate('gender')" class="form-control" id="gender">
            <option value="Nill">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
        </select>
    </div>
    <div class="form-group">
        <label for="rollno">Roll No</label>
        <input onfocus = "offValidate('rollno')" type="text" class="form-control" id="rollno" aria-describedby="emailHelp" placeholder="Enter roll number">
    </div>
    <div class="form-group">
        <label for="father">Father's Name</label>
        <input onfocus = "offValidate('father')" type="text" class="form-control" id="father" aria-describedby="emailHelp" placeholder="Father's name">
    </div>
    <div class="form-group">
        <label for="mother">Mother's Name</label>
        <input onfocus = "offValidate('mother')" type="text" class="form-control" id="mother" aria-describedby="emailHelp" placeholder="Mother's name">
    </div>
    <div class="form-group">
        <label for="admission">Admission No</label>
        <input onfocus = "offValidate('admission')" type="text" class="form-control" id="admission" aria-describedby="emailHelp" placeholder="Admission Number">
    </div>
    <div class="form-group">
        <label for="adhaar">Adhaar No</label>
        <input onfocus = "offValidate('adhaar')" type="number" class="form-control" id="adhaar" aria-describedby="emailHelp" placeholder="Adhaar Number">
    </div>
    <div class="form-group">
        <label for="phone">Phone No</label>
        <input onfocus = "offValidate('phone')" type="number" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Phone Number">
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
        $("#ajax-table").load("Ajax/LoadStudentTable.php");
    });

    function validate(){
        var name = document.getElementById("name");
        var father = document.getElementById("father");
        var mother = document.getElementById("mother");
        var admission = document.getElementById("admission");
        var adhaar = document.getElementById("adhaar");
        var phone = document.getElementById("phone");
        var gender = document.getElementById("gender");
        var rollno = document.getElementById("rollno");
        var status = 'true';
        if(name.value.trim() == ""){
            name.className += ' is-invalid';
            status = 'false';
        }
        if(father.value.trim() == ""){
            father.className += ' is-invalid';
            status = 'false';
        }
        if(mother.value.trim() == ""){
            mother.className += ' is-invalid';
            status = 'false';
        }
        if(admission.value.trim() == ""){
            admission.className += ' is-invalid';
            status = 'false';
        }
        if(adhaar.value.trim() == ""){
            adhaar.className += ' is-invalid';
            status = 'false';
        }
        if(phone.value.trim() == "" || phone.value.lenght < 10){
            phone.className += ' is-invalid';
            status = 'false';
        }
        if(rollno.value.trim() == ""){
            rollno.className += ' is-invalid';
            status = 'false';
        }
        if(gender.value == "Nill"){
            gender.className += ' is-invalid';
            status = 'false';
        }

        if(status == 'true'){
            ajaxstart_subButton();
            $("#ajax-load").load("process/AddStudent.php", {name: name.value, father: father.value, mother: mother.value, gender: gender.value, phone: phone.value, admission: admission.value, adhaar: adhaar.value, submit: "set", rollno: rollno.value}, function(){
                $("#ajax-table").load("Ajax/LoadStudentTable.php");
                $("#message").load("message/message.php");
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
