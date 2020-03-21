<?php
    $page = 'adminsubjects';
    include_once('adminheader.php');    
    $_SESSION['subid'] = $_GET['subid'];

    $query1 = mysqli_query($con, "SELECT *,SUBJECT.TITLE AS S_TITLE, COURSE.TITLE AS C_TITLE FROM SUBJECT INNER JOIN COURSE ON SUBJECT.COURSE = COURSE.COURSE_ID WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
    $row1 = mysqli_fetch_array($query1);

    if(isset($_POST['submit'])){
        $subcode = $_POST['subcode'];       
        $subtitle = $_POST['subtitle'];       
        $subcourse = $_POST['subcourse'];
        $subdesc = $_POST['subdesc'];   
        
        $query = mysqli_query($con, "UPDATE SUBJECT SET CODE = '".$subcode."', TITLE = '".$subtitle."', COURSE = '".$subcourse."', DESCRIPTION = '".$subdesc."' WHERE CODE = '".$subcode."'");
        if($query){
            echo '<script>alert("Succesfully Updated!");
                  location.href="adminsubjects.php";
                    </script>';
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Edit Subjects</h3>
    <div class="col-md-6" style="padding: 0 10px 0 0">
        <form method="POST">
            <div><label>Code</label></div>
            <input type="text" name="subcode" class="form-control" autocomplete="off" value="<?php echo $row1['CODE']?>" required readonly>
            <div><label>Title</label></div>
            <input type="text" name="subtitle" class="form-control" value="<?php echo $row1['S_TITLE']?>" autocomplete="off" required>
            <div><label>Course</label></div>
            <select type="text" name="subcourse" class="form-control" required>
                <option value="<?php echo $row1['COURSE_ID']?>"><?php echo $row1['C_TITLE']?></option>
                <?php
                    $query2 = mysqli_query($con, "SELECT * FROM COURSE");
                    while($row2 = mysqli_fetch_array($query2)){
                ?>
                <option value="<?php echo $row1['COURSE_ID']?>"><?php echo $row2['TITLE']?></option>
                <?php
                    }
                ?>
            </select>
    </div>
    <div class="col-md-6" style="padding: 0 0 0 10px">
            <div><label>Description</label></div>
            <textarea class="form-control" name="subdesc"><?php echo $row1['DESCRIPTION']?></textarea>            
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