<?php
    $page = 'adminaccounts';
    include_once('adminheader.php');    
    if(isset($_POST['addaccountsubmit'])){
        $userid = $_POST['userid'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $query = mysqli_query($con, "INSERT INTO ACCOUNTS VALUES('$userid','$name','$type','$username','$password')");
        if($query){
            echo '<script>alert("Succesfully Added!");</script>';
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Add New Account</h3>
    <div class="col-md-6" style="padding: 0 10px 0 0">
        <form method="POST">
            <div><label>User ID</label></div>
            <input type="text" name="userid" class="form-control" autocomplete="off" required>
            <div><label>Name</label></div>
            <input type="text" name="name" class="form-control" autocomplete="off" required>
            <div><label>Type</label></div>
            <select type="text" name="type" class="form-control" required>
                <option value="">---</option>
                <option value="Student">Student</option>
                <option value="Admin">Admin</option>
            </select>
    </div>
    <div class="col-md-6" style="padding: 0 0 0 10px">
            <div><label>Username</label></div>
            <input type="text" name="username" class="form-control" autocomplete="off" required>
            <div><label>Password</label></div>
            <input type="password" name="password" class="form-control" autocomplete="off" required>            
            <br>
            <div>
            <input type="submit" name="addaccountsubmit" class="btn btn-primary" value="Add to List" style="float: right">
            </div>
        </form>
    </div>
</div>

<?php
    include_once('footer.php');
?>