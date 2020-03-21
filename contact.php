<?php
    $page = 'Contact';
    include_once('header.php');
    $subid = $_GET['subid'];
    $_SESSION['subid'] = $subid;    
    $query1 = mysqli_query($con, "SELECT * FROM SYLLABUS INNER JOIN SUBJECT ON SYLLABUS.SUBJECT_ID = SUBJECT.SUBJECT_ID WHERE SYLLABUS.SUBJECT_ID = '".$_SESSION['subid']."'");
    $row1 = mysqli_fetch_array($query1);
?>
<div class="container cont-contact">
    <?php
        $query2 = mysqli_query($con,"SELECT * FROM CONTACT WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
        while($row2 = mysqli_fetch_array($query2)){
    ?>
        <div class="col-xs-12 cont-div-main">
            <div class="col-xs-12 cont-div">
                <label class="name"><?php echo $row2['INSTRUCTOR'];?></label><br/>    
                <label><span class="glyphicon glyphicon-phone"> </span> <?php echo $row2['CONTACT_NO'];?></label><br/>
                <label><span class="glyphicon glyphicon-envelope"> </span> <?php echo $row2['EMAIL'];?></label><br/>
                <label><span class="glyphicon glyphicon-time"> </span> <?php echo $row2['CONSULTATION_HOURS'];?></label>
            </div>    
        </div>
    <?php
        }
    ?>
</div>
<?php
    include_once('userfooter.php');
?>