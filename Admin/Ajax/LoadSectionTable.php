<?php session_start(); ?>
<div class="mt-4">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Section</h1>
        </div>
        <div id="deleteMessage"></div>
    <div class="table-responsive">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                <th scope="col">Section</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
                include_once("../include/connection.php");
                $sql = "SELECT * FROM section";
                $result = mysqli_query($link, $sql);
                $row = mysqli_num_rows($result);
                $class = "";
                if($row > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['sectionId'];
            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td>
                                    <button onclick = "dele('<?php echo $id; ?>')" class="btn btn-danger" id="<?php echo $id; ?>-button">Delete</button>
                                    <button class="delete btn btn-danger d-none" type="button" id="<?php echo $id; ?>-delete" disabled>
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
        var sectionId = param;
        ajaxstart_delButton(param);
        $("#result").load("Process/DeleteSection.php",{sectionId: sectionId, submit: "set"}, function(){
            $("#ajax-table").load("Ajax/LoadSectionTable.php",{},function(){
                $("#deleteMessage").load("message/deleteMessage.php");
            });
            
        });
    }
</script>