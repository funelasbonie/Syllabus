<?php
    $page = 'adminstudents';
    include_once('adminheader.php');    
    $_SESSION['studid'] = $_GET['studid'];

    $query1 = mysqli_query($con, "SELECT * FROM STUDENT INNER JOIN COURSE ON STUDENT.COURSE = COURSE.COURSE_ID WHERE STUDENT_ID = '".$_SESSION['studid']."'");
    $row1 = mysqli_fetch_array($query1);

    if(isset($_POST['submit'])){
        $studid = $_POST['studid'];
            
        $query = mysqli_query($con, "DELETE FROM STUDENT WHERE STUDENT_ID = '".$studid."'");
        if($query){
            echo '<script>alert("Succesfully Deleted!");
                  location.href="adminstudents.php";
                    </script>';
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Delete Students</h3>
    <div class="col-md-5" style="padding: 0">
        <form method="POST">
            <div><label>Student ID</label></div>
            <input type="text" name="studid" class="form-control" autocomplete="off" value="<?php echo $row1['STUDENT_ID']?>" required>
            <div><label>Name</label></div>
            <input type="text" name="studname" class="form-control" value="<?php echo $row1['NAME']?>" autocomplete="off" required>            
            <br>
            <input type="submit" name="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
</div>

<?php
    include_once('footer.php');
?>