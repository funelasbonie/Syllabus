<?php
    include 'conn.php';
    $query1 = mysqli_query($con,"INSERT INTO SYLLABUS ( SUBJECT_ID, OBJECTIVE_ID, MODULE_ID, REFERENCE, CONTACT) VALUES ('','','','','')");
    if($query1){
        header('location:adminaddsylabus.php');
    }

?