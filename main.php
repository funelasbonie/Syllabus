<?php
    $page = 'Syllabus';
    include_once('header.php');
    
    $query1 = mysqli_query($con, "SELECT * FROM STUDENT WHERE STUDENT_ID = '".$_SESSION['user']."'");
    $row1 = mysqli_fetch_array($query1);
?>
<div class="container cont-index">    
    <div class="std">                
        <span class="glyphicon glyphicon-user std-icon"></span>
        <h2><?php echo $row1['NAME']?></h2>
        <label class=""><?php echo $row1['STUDENT_ID']?></label>        
        <hr/>
        <h3>
            <?php
                $query2 = mysqli_query($con, "SELECT * FROM COURSE WHERE COURSE_ID = '".$row1['COURSE']."'");
                $row2 = mysqli_fetch_array($query2);
                echo $row2['TITLE'];
            ?>
        </h3>
        <div>
            <label class="year"><?php echo $row1['YEAR']?> Year - </label>
            <label class="sem"><?php echo $row1['SEMESTER']?> Sem</label>
        </div>
        <br/>
        <button class="btn btn-default btn-lg" onclick="location.href='subjects.php'"><span class="glyphicon glyphicon-file"></span> My Subjects</button>
    </div>
</div>    
<?php
    include_once('userfooter.php');
?>