<?php
    $page = 'adminstudents';
    include_once('adminheader.php');    
    $_SESSION['studid'] = $_GET['studid'];

    $query1 = mysqli_query($con, "SELECT * FROM STUDENT INNER JOIN COURSE ON STUDENT.COURSE = COURSE.COURSE_ID WHERE STUDENT_ID = '".$_SESSION['studid']."'");
    $row1 = mysqli_fetch_array($query1);

    if(isset($_POST['submit'])){
        $studid = $_POST['studid'];
        $studname = $_POST['studname'];
        $studcourse = $_POST['studcourse'];
        $studyear = $_POST['studyear'];
        $studsem = $_POST['studsem'];
        
        $query = mysqli_query($con, "UPDATE STUDENT SET STUDENT_ID = '".$studid."', NAME = '".$studname."', COURSE = '".$studcourse."', YEAR = '".$studyear."', SEMESTER = '".$studsem."' WHERE STUDENT_ID = '".$studid."'");
        if($query){
            echo '<script>alert("Succesfully Updated!");
                  location.href="adminstudents.php";
                    </script>';
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Edit Students</h3>
    <div class="col-md-6" style="padding: 0 10px 0 0">
        <form method="POST">
            <div><label>Student ID</label></div>
            <input type="text" name="studid" class="form-control" autocomplete="off" value="<?php echo $row1['STUDENT_ID']?>" required readonly>
            <div><label>Name</label></div>
            <input type="text" name="studname" class="form-control" value="<?php echo $row1['NAME']?>" autocomplete="off" required>
            <div><label>Course</label></div>
            <select type="text" name="studcourse" class="form-control" required>
                <option value="<?php echo $row1['COURSE_ID']?>"><?php echo $row1['TITLE']?></option>
                <?php
                    $query12 = mysqli_query($con, "SELECT * FROM COURSE");
                    while($row2 = mysqli_fetch_array($query2)){
                ?>
                <option value="<?php echo $row2['COURSE_ID']?>"><?php echo $row2['TITLE']?></option>
                <?php
                    }
                ?>
            </select>
    </div>
    <div class="col-md-6" style="padding: 0 0 0 10px">
            <div><label>Year</label></div>
            <select class="form-control" name="studyear" required>
                <option value="<?php echo $row1['YEAR']?>"><?php echo $row1['YEAR']?></option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
            </select>
            <div><label>Semester</label></div>
            <select class="form-control" name="studsem" required>
                <option value="<?php echo $row1['SEMESTER']?>"><?php echo $row1['SEMESTER']?></option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
            </select>
            <br>
            <div>
            <input type="submit" name="submit" class="btn btn-primary" value="Save Changes" style="float: right">
            </div>
        </form>
    </div>
</div>

<?php
    include_once('footer.php');
?>