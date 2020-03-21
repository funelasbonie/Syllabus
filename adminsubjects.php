<?php
    $page = 'adminsubjects';
    include_once('adminheader.php');    
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Subjects
    <button class="btn btn-default" id="add" onclick="location.href='adminaddsubjects.php'"><span class="glyphicon glyphicon-plus"></span> Add New</button>    
    </h3>
    <div class="table-responsive">
        <table class="table table-hover table-striped" id="myTable">
            <thead>
                <tr>                    
                    <th>CODE</th>
                    <th>TITLE</th>
                    <th>COURSE</th>
                    <th>DESCRIPTION</th>                
                    <th width="10%">ACTION</th>                
                </tr>
            </thead>
            <tbody>
            <?php
                $query1 = mysqli_query($con, "SELECT *,SUBJECT.TITLE AS S_TITLE, COURSE.TITLE AS C_TITLE FROM SUBJECT INNER JOIN COURSE ON SUBJECT.COURSE = COURSE.COURSE_ID");
                while($row1 = mysqli_fetch_array($query1)){
            ?>
                <tr>                    
                    <td><?php echo $row1['CODE'];?></td>
                    <td><?php echo $row1['S_TITLE'];?></td>
                    <td><?php echo $row1['C_TITLE'];?></td>
                    <td style="text-align:justify"><?php echo $row1['DESCRIPTION'];?></td>                    
                    <td><a href="admineditsubjects.php?subid=<?php echo $row1['SUBJECT_ID'];?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="admindeletesubjects.php?subid=<?php echo $row1['SUBJECT_ID'];?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                    <a href="adminaddsyllabus.php?subid=<?php echo $row1['SUBJECT_ID'];?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-leaf"></span></a></td>                    
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