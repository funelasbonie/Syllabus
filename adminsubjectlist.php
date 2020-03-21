<?php
    $page = 'adminstudents';
    include_once('adminheader.php');   
    $_SESSION['sbjstd'] = $_GET['studid']; 
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">
        <span class="glyphicon glyphicon-user">
        </span>
        <?php 
            $stdquery = mysqli_query($con, 'SELECT * FROM STUDENT WHERE STUDENT_ID = "'.$_SESSION['sbjstd'].'"');
            $stdrow = mysqli_fetch_array($stdquery);
            echo $stdrow['NAME'];
        ?> - Subjects
    <button class="btn btn-default" id="add" onclick="location.href='adminaddsubjectlist.php'"><span class="glyphicon glyphicon-plus"></span> Add New</button>    
    </h3>
    <div class="table-responsive">
        <table class="table table-hover table-striped" id="myTable">
            <thead>
                <tr>
                    <th>SUBJECT ID</th>
                    <th>CODE</th>
                    <th>TITLE</th>                                 
                    <th>ACTION</th>                                 
                </tr>
            </thead>
            <tbody>
            <?php
                $query1 = mysqli_query($con, "SELECT STUDENT_ID,CODE,TITLE,STD_SUBJECTS.SUBJECT_ID AS SUBJECT_ID FROM STD_SUBJECTS INNER JOIN SUBJECT ON STD_SUBJECTS.SUBJECT_ID = SUBJECT.SUBJECT_ID WHERE STD_SUBJECTS.STUDENT_ID = '$_SESSION[sbjstd]'" );
                while($row1 = mysqli_fetch_array($query1)){
            ?>
                <tr>
                    <td><?php echo $row1['SUBJECT_ID'];?></td>
                    <td><?php echo $row1['CODE'];?></td>
                    <td><?php echo $row1['TITLE'];?></td>                    
                    <td width="10%">
                    <a class="btn btn-danger btn-xs" name="edit" href="deletesubjectlist.php?stdid=<?php echo $row1['STUDENT_ID'];?>&sbjid=<?php echo $row1['SUBJECT_ID'];?>"><span class="glyphicon glyphicon-trash"></a>
                    </td>  
                                    
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php
    include_once('footer.php');
?>