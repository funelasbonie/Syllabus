<?php
    $page = 'adminsubjects';
    include_once('adminheader.php');   
    
    if(isset($_POST['submit'])){
        $subcode = $_POST['subcode'];       
        $subtitle = $_POST['subtitle'];       
        $subcourse = $_POST['subcourse'];
        $subdesc = $_POST['subdesc'];       
        
        $query = mysqli_query($con, "INSERT INTO SUBJECT (CODE,TITLE,COURSE,DESCRIPTION) VALUES('$subcode','$subtitle','$subcourse','$subdesc')");
        if($query){
            echo '<script>alert("Succesfully Added!");</script>';
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }

?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Add New Subject</h3>
    <div class="col-md-6" style="padding: 0 10px 0 0">
        <form method="POST">
            <div><label>Code</label></div>
            <input type="text" name="subcode" class="form-control" autocomplete="off" required>
            <div><label>Title</label></div>
            <input type="text" name="subtitle" class="form-control" autocomplete="off" required>
            <div><label>Course</label></div>
            <select type="text" name="subcourse" class="form-control" required>
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
            <div><label>Description</label></div>
            <textarea class="form-control" name="subdesc"></textarea>            
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