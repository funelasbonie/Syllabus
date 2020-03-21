<?php
    $page = 'Syllabus'; 
    include_once('header.php');
    $subid = $_GET['subid'];
    $_SESSION['subid'] = $subid;
    $query1 = mysqli_query($con, "SELECT * FROM SYLLABUS INNER JOIN SUBJECT ON SYLLABUS.SUBJECT_ID = SUBJECT.SUBJECT_ID WHERE SYLLABUS.SUBJECT_ID = '".$_SESSION['subid']."'");    
    $row1 = mysqli_fetch_array($query1);
    if(mysqli_num_rows($query1) != 0){
?>
<div class="container  cont-syllabus">
    <div style="text-align: center">
        <div class="syllabus-title"><label class="subject-subname"><?php echo $row1['TITLE']?></label></div>
        <hr/>
        <button class="btn btn-default" onclick="location.href='reference.php?subid=<?php echo $_SESSION['subid'];?>'">References</button>
        <button class="btn btn-default" onclick="location.href='grading.php?subid=<?php echo $_SESSION['subid'];?>'">Grading System</button>
        <button class="btn btn-default" onclick="location.href='contact.php?subid=<?php echo $_SESSION['subid'];?>'">Contacts</button>
    </div>
    <hr/>    
    <label class="subject-subname">Description:</label> 
    <p class="subject-subdesc">        
        <?php echo $row1['DESCRIPTION']?>
    </p>  
    <hr/>
    <label class="subject-subname">Objectives:</label> 
    <p>        
        <ul>
            <?php
                $query2 = mysqli_query($con,"SELECT * FROM OBJECTIVES WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
                while($row2 = mysqli_fetch_array($query2)){
            ?>
                <li><?php echo $row2['OBJECTIVE']?></li>
            <?php
                }
            ?>
        </ul>
            </p>    
    <hr/><hr/>
    <label class="subject-subname">Activities:</label> 
            <div class="syllabus-table">
                <?php
                    $query3 = mysqli_query($con,"SELECT * FROM MODULES WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
                    while($row3 = mysqli_fetch_array($query3)){
                ?>
                <label>Module <?php echo $row3['MODULE_NO']?></label><br/>
                <label><?php echo $row3['TITLE']?></label><br/>
                    <table class="table table-hover table-bordered">                    
                        <tr>
                            <th>Topics and Activities</th>
                            <th style="width: 10px">Schedule</th>
                        </tr>
                        <?php
                            $query4 = mysqli_query($con,"SELECT * FROM ACTIVITIES WHERE MODULE_ID = '".$row3['MODULE_ID']."'");
                            while($row4 = mysqli_fetch_array($query4)){
                        ?>
                            <tr>
                                <td><p><?php echo $row4['TITLE']?></p></td>
                                <td><p><?php echo $row4['SCHEDULE']?></p></td>
                            </tr>
                        <?php
                            }
                        ?>    
                    <table>
                <?php
                    }
                ?>                     
            </div>            

</div>            
<?php
    }
    else{
        echo '<div style="text-align: center"><h3>No Syllabus Found!</h3></div>';
    }
?>
<?php
    include_once('userfooter.php');
?>