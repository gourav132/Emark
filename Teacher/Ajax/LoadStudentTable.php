<?php session_start();
$teacherclass = $_SESSION['TeachersClass']; ?>
<div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Class</h1>
        </div>
        <div id="deleteMessage"></div>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Roll No</th>
                    <th scope="col">Student's Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Admission No</th>
                    <th scope="col">Adhaar No</th>
                    <th scope="col">Father's Name</th>
                    <th scope="col">Mother's Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
                include_once("../include/connection.php");
                $sql = "SELECT * FROM students WHERE class = '$teacherclass' ORDER BY rollno ASC";
                $result = mysqli_query($link, $sql);
                $row = mysqli_num_rows($result);
                if($row > 0){
                    while($row = mysqli_fetch_assoc($result)){
            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['rollno']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['class']; ?></td>
                                <td><?php echo $row['admission']; ?></td>
                                <td><?php echo $row['adhaar']; ?></td>
                                <td><?php echo $row['father']; ?></td>
                                <td><?php echo $row['mother']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td>
                                    <button onclick = "dele('<?php echo $row['rollno']; ?>')" class="btn btn-danger" id="<?php echo $row['rollno']; ?>-button">Delete</button>
                                    <button class="delete btn btn-danger d-none" type="button" id="<?php echo $row['rollno']; ?>-delete" disabled>
                                        <span class="spinner-border spinner-border-sm mb-1" role="status" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>

            <?php
                    }
                }
            ?>
        </table>
    </div>
</div>

<div id="result"></div>

<script>
    function dele(param){
        var rollno = param;
        ajaxstart_delButton(param);
        $("#result").load("process/DeleteStudent.php",{rollno: rollno, submit: "set"}, function(){
            $("#ajax-table").load("Ajax/LoadStudentTable.php",{},function(){
                $("#deleteMessage").load("message/deleteMessage.php");
            });
            
        });
    }
</script>