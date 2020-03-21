<?php
    $page = 'adminstudents';
    include_once('adminheader.php');    

    if(isset($_POST['submit'])){
        $stdid = $_POST['stdid'];        
        $stdsubject = $_POST['stdsubject'];   
        
        $checkq = mysqli_query($con, "SELECT * FROM STD_SUBJECTS WHERE STUDENT_ID = '".$stdid."' AND SUBJECT_ID = '".$stdsubject."'"); 
        if(mysqli_num_rows($checkq) != 0){
            echo '<script>alert("This subject is already on the list!");</script>';  
        }
        else{
            $query = mysqli_query($con, "INSERT INTO STD_SUBJECTS VALUES('$stdid','$stdsubject')");
            if($query){            
                echo '<script>alert("Succesfully Added!");
                location.href="adminsubjectlist.php?studid='.$_SESSION['sbjstd'].'";
                </script>';                
            }
            else{
                echo '<script>alert("Oops! Error Encountered");</script>';
            }
        }                
      }
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Add Subject</h3>
    <div class="col-md-5" style="padding: 0">
        <form method="POST">
            <div><label>Student ID</label></div>
            <input type="text" name="stdid" class="form-control" autocomplete="off" value="<?php echo $_SESSION['sbjstd']?>" required readonly>            
            <div><label>Course</label></div>
            <select type="text" name="stdcourse" class="form-control" id="course" required>
                <option value="">---</option>
                <?php
                    $query1 = mysqli_query($con, "SELECT * FROM COURSE");
                    while($row1 = mysqli_fetch_array($query1)){
                ?>
                <option value="<?php echo $row1['COURSE_ID']?>"><?php echo $row1['TITLE']?></option>
                <?php
                    }
                ?>
            </select>               
            <div id="sbjresult">         
            </div>
            <br>
            <!--  -->
        </form>
    </div>
</div>

<?php
    include_once('footer.php');
?>