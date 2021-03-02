<?php session_start();
$teacherId = $_SESSION['TeachersId']; ?>
<div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Class</h1>
        </div>
        <div id="deleteMessage"></div>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-dark">
            <thead>
                <tr>
                <th scope="col">Class Id</th>
                <th scope="col">Section ID</th>
                <th scope="col">Subject ID</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
                include_once("../include/connection.php");
                $sql = "SELECT * FROM teachersclass WHERE teacherId = '$teacherId'";
                $result = mysqli_query($link, $sql);
                $row = mysqli_num_rows($result);
                if($row > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['classId'];
            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['classId']; ?></td>
                                <td><?php echo $row['sectionId']; ?></td>
                                <td><?php echo $row['subjectId']; ?></td>
                                <td>
                                    <button onclick = "dele('<?php echo $row['code']; ?>')" class="btn btn-danger" id="<?php echo $row['code']; ?>-button">Delete</button>
                                    <button class="delete btn btn-danger d-none" type="button" id="<?php echo $row['code']; ?>-delete" disabled>
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
        var code = param;
        ajaxstart_delButton(param);
        $("#result").load("process/DeleteClass.php",{code: code, submit: "set"}, function(){
            $("#ajax-table").load("Ajax/LoadClassTable.php",{},function(){
                $("#deleteMessage").load("message/deleteMessage.php");
            });
            
        });
    }
</script>