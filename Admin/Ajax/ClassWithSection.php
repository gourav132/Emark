<?php 
    session_start(); 
    include_once("../include/connection.php");
    $sql = "SELECT * FROM section";
    $result = mysqli_query($link, $sql);
    $row = mysqli_num_rows($result);
    $section = "";
    if($row > 0){
        while($row = mysqli_fetch_assoc($result)){
            $section.= '<div class="form-check">
                            <input type="checkbox" class="form-check-input" id="'.$row['sectionId'].'">
                            <label class="form-check-label" for="'.$row['sectionId'].'">'.$row['sectionId'].'</label>
                        </div>';
        }
    }
    else{
        $section = "Sections not yet registered";
    }

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
        <h1 class="h3 mb-0 text-gray-800">Combine Class with Sections</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <form onsubmit = "return check()">
        <h4 class="h4">Select Class</h4>
        <select class = "btn btn-secondary" name="class" id="class">
            <option value="nill">Select Class</option>
            <?php echo $class; ?>
        </select>
        
        <h4 class="h4 mt-3">Check Sections associated with class</h4>
        <?php echo $section; ?>

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
        $("#ajax-table").load("Ajax/LoadClassWtSectionTable.php");
    });

    function check(){
        var clas = document.getElementById('class').value;
        var array = []
        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
        var length = checkboxes.length;
        if(length == 0){
            // error handling
        }
        else if(clas == "nill"){
            //error handling
        }
        else{
            for (var i = 0; i < checkboxes.length; i++) {
                array.push(checkboxes[i].id)
            }

            for (var i = 0; i < length; i++){
                var sec = array[i];
                ajaxstart_subButton();
                $("#ajax-load").load("Process/AddClassWithSection.php", {class: clas, section: sec, Submit: 'set'},function(){
                    $("#ajax-table").load("Ajax/LoadClassWtSectionTable.php");
                    $('#message').load("message/message.php",{},function(){
                        ajaxstop_subButton();
                    });
                });
            }
            // console.log(array);
            // console.log(clas);
        }

        return false;
 
    }
</script>

<div id="ajax-table"></div>