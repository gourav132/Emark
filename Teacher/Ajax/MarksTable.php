<?php 
    session_start();
    $info;
    if(isset($_POST['Submit'])){
        $Class = $_POST['Class'];
        $info = explode("-",$Class);
        $class = $info[0];
        $section = $info[1];
        $subject = $info[2];
        $teacherId = $_SESSION['TeachersId'];
        $classCode = $class.'-'.$section; 
        $term = $_POST['term'];
?>

<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage marks of <?php echo $subject; ?></h1>
    </div>
    <div id="deleteMessage"></div>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Roll No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Admission No</th>
                    <th scope="col">Marks</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
                include_once("../include/connection.php");
                $sql = "SELECT * FROM students WHERE class = '$classCode' ORDER BY rollno ASC";
                $result = mysqli_query($link, $sql);
                $row = mysqli_num_rows($result);
                if($row > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $sql2 = "SELECT * FROM marks WHERE admission = ? AND rollno = ? AND subjectId = ? AND termId = ?";
                        $stmt2 = mysqli_prepare($link, $sql2);
                        mysqli_stmt_bind_param($stmt2, "ssss", $row['admission'], $row['rollno'], $subject, $term);
                        mysqli_stmt_execute($stmt2);
                        $result2 = mysqli_stmt_get_result($stmt2);
                        $value2 = mysqli_num_rows($result2);
                        // echo $value2;
                        // echo mysqli_error($link);
                        if($value2 == 0){
                            $rollno = $row['rollno'];
                            $adhaar = $row['adhaar'];
                            ?>
                            <tbody>
                            <tr>
                                <td><?php echo $row['rollno']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['admission']; ?></td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" value = "<?php echo $row['admission']; ?>" id = "<?php echo $row['admission']; ?>">
                                        <input type="hidden" value = "<?php echo $rollno; ?>" id = "<?php echo $rollno; ?>">
                                        <input type="hidden" value = "<?php echo $classCode; ?>" id = "classCode1">
                                        <input type="hidden" value = "<?php echo $term; ?>" id = "term1">
                                        <input type="hidden" value = "<?php echo $subject; ?>" id = "subject1">
                                        <input onfocus = "offValidate('<?php echo $adhaar; ?>')" type="text" placeholder = "Enter Marks..." class="form-control" id="<?php echo $row['adhaar']; ?>" aria-describedby="emailHelp">
                                    </div>
                                </td>
                                <td><button onclick = "submitMarks('<?php echo $rollno; ?>','<?php echo $row['admission']; ?>','<?php echo $adhaar; ?>')" class="btn btn-success">Submit</button></td>
                            </tr> 
                        </tbody>
                        <?php
                        }
                        
                        else{
                            $rollno = $row['rollno'];
                            $adhaar = $row['adhaar'];
                            if($value2 > 0)
                            {          
                                while($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['rollno']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['admission']; ?></td>
                                <td>
                                    <div class="form-group">
                                        <input type="hidden" value = "<?php echo $row['admission']; ?>" id = "<?php echo $row['admission']; ?>">
                                        <input type="hidden" value = "<?php echo $rollno; ?>" id = "<?php echo $rollno; ?>">
                                        <input type="hidden" value = "<?php echo $classCode; ?>" id = "classCode">
                                        <input type="hidden" value = "<?php echo $term; ?>" id = "term">
                                        <input type="hidden" value = "<?php echo $subject; ?>" id = "subject">
                                        <input onfocus = "offValidate('<?php echo $row['adhaar']; ?>')" type="text" placeholder = "Update Marks (<?php echo $row2['marks'] ?>)" class="form-control" id="<?php echo $row['adhaar']; ?>" aria-describedby="emailHelp">
                                    </div>
                                </td>
                                <td><button onclick ="updateMarks('<?php echo $rollno; ?>','<?php echo $row['admission']; ?>','<?php echo $adhaar; ?>')" class="btn btn-warning">Update</button></td>
                            </tr>
                        </tbody>
                        <?php
                                }
                            }
                        }
                    }
                }
            ?>
        </table>
    </div>
</div>



<script>

    function submitMarks(rollno,adminno,adhaar){ 
        // console.log(rollno);
        var classCode = document.getElementById("classCode1").value.trim();
        var admission = document.getElementById(adminno).value.trim();
        var rollno = document.getElementById(rollno).value.trim();
        var term = document.getElementById("term1").value.trim();
        var subject = document.getElementById("subject1").value.trim();
        var marks = document.getElementById(adhaar).value.trim();
        if(marks == ""){
            document.getElementById(adhaar).className += ' is-invalid';
        }
        else{
            $("#resul").load("process/AddMarks.php", {classCode: classCode, admission: admission, rollno: rollno, term: term, subject: subject, marks: marks, submit: "set"}, function(){
                $("#ajax-table").load("Ajax/MarksTable.php", {Class: '<?php echo $Class; ?>', term: term, Submit: 'set'},function(){
            $("#deleteMessage").load("message/deleteMessage.php");
                });
        });
        // console.log(admission,rollno);
    }
    }

    function updateMarks(rollno,adminno,adhaar){ 
        var classCode = document.getElementById("classCode").value.trim();
        var admission = document.getElementById(adminno).value.trim();
        var rollno = document.getElementById(rollno).value.trim();
        var term = document.getElementById("term").value.trim();
        var subject = document.getElementById("subject").value.trim();
        var marks = document.getElementById(adhaar).value.trim();

        if(marks == ""){
            document.getElementById(adhaar).className += ' is-invalid';
        }
        else{
            $("#resul").load("process/UpdateMarks.php", {classCode: classCode, admission: admission, rollno: rollno, term: term, subject: subject, marks: marks, submit: "set"}, function(){
                $("#ajax-table").load("Ajax/MarksTable.php", {Class: '<?php echo $Class; ?>', term: term, Submit: 'set'},function(){
            $("#deleteMessage").load("message/deleteMessage.php");
                });
        });
        // console.log(classCode,admission,rollno,term,subject,marks);
    }
    }

</script>

<?php }?>