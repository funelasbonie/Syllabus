<?php
    $page = 'adminstudents';
    include_once('adminheader.php');    

    if(isset($_POST['submit'])){
        $studid = $_POST['studid'];
        $studname = $_POST['studname'];
        $studcourse = $_POST['studcourse'];
        $studyear = $_POST['studyear'];
        $studsem = $_POST['studsem'];
        
        $query = mysqli_query($con, "INSERT INTO STUDENT VALUES('$studid','$studname','$studcourse','$studyear','$studsem')");
        if($query){
            $query2 = mysqli_query($con, "INSERT INTO ACCOUNTS VALUES('$studid','$studname','Student','$studid','12345678')");
            if($query2){
                echo '<script>alert("Succesfully Added!");</script>';
            }            
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Add New Student</h3>
    <div class="col-md-6" style="padding: 0 10px 0 0">
        <form method="POST">
            <div><label>Student ID</label></div>
            <input type="text" name="studid" class="form-control" autocomplete="off" required>
            <div><label>Name</label></div>
            <input type="text" name="studname" class="form-control" autocomplete="off" required>
            <div><label>Course</label></div>
            <select type="text" name="studcourse" class="form-control" required>
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
    </div>
    <div class="col-md-6" style="padding: 0 0 0 10px">
            <div><label>Year</label></div>
            <select class="form-control" name="studyear" required>
                <option value="">---</option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="3rd">3rd</option>
                <option value="4th">4th</option>
            </select>
            <div><label>Semester</label></div>
            <select class="form-control" name="studsem" required>
                <option value="">---</option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
            </select>
            <br>
            <div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add to List" style="float: right">
            </div>
        </form>
    </div>
</div>

<?php
    include_once('footer.php');
?>