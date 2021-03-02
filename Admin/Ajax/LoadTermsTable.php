<?php session_start(); ?>
<div class="mt-4">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Terms</h1>
        </div>
        <div id="deleteMessage"></div>
    <div class="table-responsive">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                <th scope="col">Term</th>
                <th scope="col">Term ID</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
                include_once("../include/connection.php");
                $sql = "SELECT * FROM term";
                $result = mysqli_query($link, $sql);
                $row = mysqli_num_rows($result);
                if($row > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['termId'];
            ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['term']; ?></td>
                                <td><?php echo $row['termId']; ?></td>
                                <td>
                                    <button onclick = "dele('<?php echo $row['termId']; ?>')" class="btn btn-danger" id="<?php echo $row['termId']; ?>-button">Delete</button>
                                    <button class="delete btn btn-danger d-none" type="button" id="<?php echo $row['termId']; ?>-delete" disabled>
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
        var termId = param;
        ajaxstart_delButton(param);
        $("#result").load("Process/DeleteTerm.php",{termId: termId, submit: "set"}, function(){
            $("#ajax-table").load("Ajax/LoadTermsTable.php",{},function(){
                $("#deleteMessage").load("message/deleteMessage.php");
            });
            
        });
    }
</script>