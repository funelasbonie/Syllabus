<?php
    $page = 'admincourse';
    include_once('adminheader.php');    
    $_SESSION['couid'] = $_GET['couid'];
    
    $query1 = mysqli_query($con, "SELECT * FROM COURSE WHERE COURSE_ID = '".$_SESSION['couid']."'");
    $row1 = mysqli_fetch_array($query1);

    if(isset($_POST['submit'])){
        $courseid = $_POST['courseid']; 
        $coursetitle = $_POST['coursetitle']; 
        
        $query = mysqli_query($con, "UPDATE COURSE SET TITLE = '".$coursetitle."' WHERE COURSE_ID = '".$courseid."'");
        if($query){
            echo '<script>alert("Succesfully Updated!");
                  location.href="admincourse.php";
                    </script>';
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }

?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Edit Course</h3>
    <div class="col-md-5" style="padding: 0">
        <form method="POST">
            <div><label>User ID</label></div>
            <input type="text" name="courseid" class="form-control" autocomplete="off" value="<?php echo $row1['COURSE_ID']?>" required readonly>
            <div><label>Name</label></div>
            <input type="text" name="coursetitle" class="form-control" autocomplete="off" value="<?php echo $row1['TITLE']?>" required>            
            <br>
            <input type="submit" name="submit" class="btn btn-primary" value="Save Changes">
        </form>
    </div>
</div>

<?php
    include_once('footer.php');
?>