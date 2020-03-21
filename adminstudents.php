<?php
    $page = 'adminstudents';
    include_once('adminheader.php');    
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Students
    <button class="btn btn-default" id="add" onclick="location.href='adminaddstudents.php'"><span class="glyphicon glyphicon-plus"></span> Add New</button>    
    </h3>
    <div class="table-responsive">
        <table class="table table-hover table-striped" id="myTable">
            <thead>
                <tr>
                    <th>STUDENT ID</th>
                    <th>NAME</th>
                    <th>COURSE</th>
                    <th>YEAR</th>
                    <th>SEMESTER</th>                
                    <th>ACTION</th>                
                </tr>
            </thead>
            <tbody>
            <?php
                $query1 = mysqli_query($con, "SELECT * FROM STUDENT INNER JOIN COURSE ON STUDENT.COURSE = COURSE.COURSE_ID");
                while($row1 = mysqli_fetch_array($query1)){
            ?>
                <tr>
                    <td><?php echo $row1['STUDENT_ID'];?></td>
                    <td><?php echo $row1['NAME'];?></td>
                    <td><?php echo $row1['TITLE'];?></td>
                    <td><?php echo $row1['YEAR'];?></td>
                    <td><?php echo $row1['SEMESTER'];?></td>                    
                    <td><a href="admineditstudents.php?studid=<?php echo $row1['STUDENT_ID'];?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="admindeletestudents.php?studid=<?php echo $row1['STUDENT_ID'];?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                    <a href="adminsubjectlist.php?studid=<?php echo $row1['STUDENT_ID'];?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-file"></span></a>
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