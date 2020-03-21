<?php
    $page = 'adminaccounts';
    include_once('adminheader.php');    
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Accounts
    <button class="btn btn-default" onclick="location.href='adminaddaccounts.php'" ><span class="glyphicon glyphicon-plus"></span> Add New</button>    
    <!--  -->
    <!-- id="addnewaccountbutton" -->
    </h3>
    <div class="table-responsive">
        <table class="table table-hover table-striped" id="myTable">
            <thead>
                <tr>
                    <th>USER ID</th>
                    <th>NAME</th>
                    <th>TYPE</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>                
                    <th>ACTION</th>                
                </tr>
            </thead>
            <tbody>
            <?php
                $query1 = mysqli_query($con, "SELECT * FROM ACCOUNTS");
                while($row1 = mysqli_fetch_array($query1)){
            ?>
                <tr>
                    <td><?php echo $row1['USER_ID'];?></td>
                    <td><?php echo $row1['NAME'];?></td>
                    <td><?php echo $row1['TYPE'];?></td>
                    <td><?php echo $row1['USERNAME'];?></td>
                    <td><?php echo $row1['PASSWORD'];?></td>                    
                    <td><a href="admineditaccounts.php?accid=<?php echo $row1['USER_ID'];?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
                    <a href="admindeleteaccounts.php?accid=<?php echo $row1['USER_ID'];?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></td>                    
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>

    <div id="addnewaccountmodal" class="modal" style="display:none">
        <div class="col-sm-4">
        </div>
            <form class="col-sm-4 modal-content animate" id="addnewaccountform" method="POST" style="display:none" enctype="multipart/form-data"><!-- importante to sa upload -->                                
                    <h4>Add New Objective</h4>
                    <span id="message"></span>
                    <hr/>              
                    <input type="text" class="form-control" name="sid" value="<?php echo $_SESSION['subid']?>" autocomplete="off" required readonly>                  
                    <br/>
                    <div class="col-sm-12" style="padding: 0 0 0 0">
                        <textarea class="form-control" name="obj" autocomplete="off" required></textarea>                                  
                    </div>
                    
                    <div class="col-xs-12" style="padding: 20px 0 0">                     
                        <input type="submit" class="form-control btn btn-primary save" id="save" value="Add to List" name="objsubmit" style="width: 30%; float: right;margin-left: 5px">
                        <a class="btn btn-default" id="addnewaccountclose"  value="Close" style="width: 30%; float: right">Cancel</a>
                    </div>            
                    <br/><br/>
            </form>
            <div class="col-sm-4">
            </div>
    </div>

</div>
<?php
    include_once('footer.php');
?>