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
        <h1 class="h3 mb-0 text-gray-800">Marks for <?php echo $subject; ?> of class <?php echo $classCode; ?></h1>
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
                        if($value2 > 0){
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
                                <td><?php echo $row2['marks']; ?></td>
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

<?php }?>