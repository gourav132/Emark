<?php
    session_start();
    include_once("../include/connection.php");
    
    $sql = "SELECT * FROM announcement ORDER BY slno DESC";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
       // output data of each row
       
        while($row = mysqli_fetch_assoc($result)) { 
            $id = $row['slno'];?>
            <div class="announcement border rounded p-3 m-2 mb-3">
                <div class="delete-button uk-align-right mr-2">
                    <span onclick = "initialize('<?php echo $id ?>')" uk-icon="trash" style="color: #ff5050;"  uk-toggle="target: #modal-example"></span>
                </div>

                <div class="content-area ml-2">
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom"><?php echo $row['title']; ?></h3>
                        <p class="uk-text-meta mt-1"><time datetime="2016-04-01T19:00"><?php echo $row["date"]; ?></time></p>
                    </div>
                    <p><?php echo $row['body']; ?></p>
                </div>
            </div>
            <?php
        }
    } 
    else {
        echo "<div class='uk-text-center'><h5>No announcements</h5></div>";
    }
?>



