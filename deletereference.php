<?php
    include 'conn.php';
    session_start();
    
    $query2 = mysqli_query($con, "DELETE FROM REFERENCE WHERE REFERENCE_ID = '".$_GET['id']."'");
    if($query2){
        header('location:adminaddsyllabus.php?subid='.$_SESSION['subid'].'');
    }

?>