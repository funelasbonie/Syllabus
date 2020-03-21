<?php
    include 'conn.php';
    session_start();
    
    $query2 = mysqli_query($con, "DELETE FROM STD_SUBJECTS WHERE STUDENT_ID = '".$_GET['stdid']."' AND SUBJECT_ID = '".$_GET['sbjid']."'");
    if($query2){
        header('location:adminsubjectlist.php?studid='.$_SESSION['sbjstd'].'');
    }

?>