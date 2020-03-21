<?php
    $page = 'adminaccounts';
    include_once('adminheader.php');    
    $_SESSION['accid'] = $_GET['accid'];
    
    $query1 = mysqli_query($con, "SELECT * FROM ACCOUNTS WHERE USER_ID = '".$_SESSION['accid']."'");
    $row1 = mysqli_fetch_array($query1);

    if(isset($_POST['submit'])){
        $userid = $_POST['userid'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = mysqli_query($con, "UPDATE ACCOUNTS SET USER_ID = '".$userid."', NAME = '".$name."', TYPE = '".$type."', USERNAME = '".$username."', PASSWORD = '".$password."' WHERE USER_ID = '".$userid."'");
        if($query){
            echo '<script>alert("Succesfully Updated!");
                  location.href="adminaccounts.php";
                    </script>';
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }

?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Edit Account</h3>
    <div class="col-md-6"style="padding: 0 10px 0 0">
        <form method="POST">
            <div><label>User ID</label></div>
            <input type="text" name="userid" class="form-control" autocomplete="off" value="<?php echo $row1['USER_ID']?>" required readonly>
            <div><label>Name</label></div>
            <input type="text" name="name" class="form-control" autocomplete="off" value="<?php echo $row1['NAME']?>" required>
            <div><label>Type</label></div>
            <select type="text" name="type" class="form-control" required>
                <option value="<?php echo $row1['TYPE']?>"><?php echo $row1['TYPE']?></option>
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
            </select>
    </div>
    <div class="col-md-6" style="padding: 0 0 0 10px">
            <div><label>Username</label></div>
            <input type="text" name="username" class="form-control" autocomplete="off" value="<?php echo $row1['USERNAME']?>" required>
            <div><label>Password</label></div>
            <input type="text" name="password" class="form-control" autocomplete="off" value="<?php echo $row1['PASSWORD']?>" required>
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