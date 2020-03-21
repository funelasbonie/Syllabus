<?php
    $page = 'admincourse';
    include_once('adminheader.php');   
    
    if(isset($_POST['submit'])){
        $coursetitle = $_POST['coursetitle'];        
        
        $query = mysqli_query($con, "INSERT INTO COURSE (TITLE) VALUES('$coursetitle')");
        if($query){
            echo '<script>alert("Succesfully Added!");</script>';
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Add New Course</h3>
    <div class="col-md-5" style="padding: 0">
        <form method="POST">
            <div><label>Course Title</label></div>
            <input type="text" name="coursetitle" class="form-control" autocomplete="off" required>            
            <br>
            <input type="submit" name="submit" class="btn btn-primary" value="Add to List">
        </form>
    </div>
</div>

<?php
    include_once('footer.php');
?>