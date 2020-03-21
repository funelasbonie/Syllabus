<?php
    $page = 'Subjects';
    include_once('header.php');
?>
<div class="container">    
    <?php
        $query1 = mysqli_query($con, "SELECT * FROM STD_SUBJECTS INNER JOIN SUBJECT ON STD_SUBJECTS.SUBJECT_ID = SUBJECT.SUBJECT_ID WHERE STUDENT_ID = '".$_SESSION['user']."'");
        while($row1 = mysqli_fetch_array($query1)){                    
    ?>
        <div class="col-xs-12 col-sm-12 col-md-12 subjects">
            <div class="subjects-sub">
                <label><?php echo $row1['TITLE']?></label>        
                <br/>             
                <button class="btn btn-primary" onclick="location.href='syllabus.php?subid=<?php echo $row1['SUBJECT_ID']?>'">View Syllabus</button>                                 
            </div>
        </div>
        <br/>
    <?php
        }
    ?>
</div>
<?php
    include_once('userfooter.php');
?>