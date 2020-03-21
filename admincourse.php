<?php
    $page = 'admincourse';
    include_once('adminheader.php');    
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Course
    <button class="btn btn-default" id="add" onclick="location.href='adminaddcourse.php'"><span class="glyphicon glyphicon-plus"></span> Add New</button>    
    </h3>
    <div class="table-responsive">
        <table class="table table-hover table-striped" id="myTable">
            <thead>
                <tr>
                    <th>COURSE ID</th>
                    <th>TITLE</th>                    
                    <th>ACTION</th>                
                </tr>
            </thead>
            <tbody>
            <?php
                $query1 = mysqli_query($con, "SELECT * FROM COURSE");
                while($row1 = mysqli_fetch_array($query1)){
            ?>
                <tr>
                    <td><?php echo $row1['COURSE_ID'];?></td>
                    <td><?php echo $row1['TITLE'];?></td>                    
                    <td><a href="admineditcourse.php?couid=<?php echo $row1['COURSE_ID'];?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="admindeletecourse.php?couid=<?php echo $row1['COURSE_ID'];?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>                    
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