<?php
    $page = 'Reference';
    include_once('header.php');
    $subid = $_GET['subid'];
    $_SESSION['subid'] = $subid;        
?>
<div class="container">
    <p>        
        <ul>
            <?php
                $query2 = mysqli_query($con,"SELECT * FROM REFERENCE WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
                while($row2 = mysqli_fetch_array($query2)){
            ?>
                <li><?php echo $row2['REFERENCE']?></li>
            <?php
                }
            ?>
        </ul>
    </p>    
</div>
<?php
    include_once('userfooter.php');
?>