<?php
    $page = 'adminaccounts';
    include_once('adminheader.php');    
    $_SESSION['accid'] = $_GET['accid'];
    
    $query1 = mysqli_query($con, "SELECT * FROM ACCOUNTS WHERE USER_ID = '".$_SESSION['accid']."'");
    $row1 = mysqli_fetch_array($query1);

    if(isset($_POST['submit'])){
        $userid = $_POST['userid'];
            
        $query = mysqli_query($con, "DELETE FROM ACCOUNTS WHERE USER_ID = '".$userid."'");
        if($query){
            echo '<script>alert("Succesfully Deleted!");
                  location.href="adminaccounts.php";
                    </script>';
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }

?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Delete Account</h3>
    <div class="col-md-5" style="padding: 0">
        <form method="POST">
            <div><label>User ID</label></div>
            <input type="text" name="userid" class="form-control" autocomplete="off" value="<?php echo $row1['USER_ID']?>" required>
            <div><label>Name</label></div>
            <input type="text" name="name" class="form-control" autocomplete="off" value="<?php echo $row1['NAME']?>" required>            
            <br>
            <input type="submit" name="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
</div>

<?php
    include_once('footer.php');
?>