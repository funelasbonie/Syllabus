<?php
    session_start();
    include 'conn.php';
    
    $query1 = mysqli_query($con, "SELECT * FROM SYLLABUS WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
    if(mysqli_num_rows($query1) != 0){
        $query2 = mysqli_query($con, "DELETE FROM SYLLABUS WHERE SUBJECT_ID = '".$_SESSION[subid]."'");    
        if($query2){
            $query3 = mysqli_query($con, "INSERT INTO SYLLABUS(SUBJECT_ID) VALUES('$_SESSION[subid]')");        
            if($query3){   
                echo '<script>alert("Succesfully Created a Syllabus!");
                    location.href="adminsubjects.php";
                      </script>';        
            }         
        }
    }
    else{
        $query4 = mysqli_query($con, "INSERT INTO SYLLABUS(SUBJECT_ID) VALUES('$_SESSION[subid]')");
        if($query4){   
            echo '<script>alert("Succesfully Created a Syllabus!");
                location.href="adminsubjects.php";
                </script>';        
        }         
    }
    
    
?>