<?php
    $page = 'adminsubjects';
    include_once('adminheader.php');    
    $_SESSION['subid'] = $_GET['subid'];

    $query1 = mysqli_query($con, "SELECT *,SUBJECT.TITLE AS S_TITLE, COURSE.TITLE AS C_TITLE FROM SUBJECT INNER JOIN COURSE ON SUBJECT.COURSE = COURSE.COURSE_ID WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
    $row1 = mysqli_fetch_array($query1);

    if(isset($_POST['objsubmit'])){
        $obj = $_POST['obj'];
        $sid = $_POST['sid'];
        $obid = uniqid();
                
        $query = mysqli_query($con, "INSERT INTO OBJECTIVES(OBJECTIVE_ID,OBJECTIVE,SUBJECT_ID) VALUES('$obid','$obj','$sid')");
        if($query){            
            echo '<script>alert("Succesfully Updated!");
            location.href="adminaddsyllabus.php?subid='.$_SESSION['subid'].'";
              </script>';
                  
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
    else if(isset($_POST['updateobjsubmit'])){
        $sid = $_POST['sid'];    
        $objid = $_POST['objid'];
        $newobj = $_POST['newobj'];        
                
        $query = mysqli_query($con, "UPDATE OBJECTIVES SET OBJECTIVE = '$newobj' WHERE OBJECTIVE_ID = '$objid'");
        if($query){            
            echo '<script>alert("Succesfully Updated!");
            location.href="adminaddsyllabus.php?subid='.$_SESSION['subid'].'";
              </script>';
                  
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
    else if(isset($_POST['modsubmit'])){
                
        $countq = mysqli_query($con,"SELECT * FROM MODULES WHERE SUBJECT_ID = '".$_SESSION['subid']."'ORDER BY MODULE_NO DESC LIMIT 1");
        $rowmod = mysqli_fetch_array($countq);
        
        $modid = uniqid();
        $modno = $rowmod['MODULE_NO'] + 1;
        $modtitle = $_POST['mod'];        
        $sid = $_POST['sid'];

        $query = mysqli_query($con, "INSERT INTO MODULES(MODULE_ID,MODULE_NO,TITLE,ACTIVITIES,SUBJECT_ID) VALUES('$modid','$modno','$modtitle','$modid','$sid')");
        if($query){            
            echo '<script>alert("Succesfully Updated!");
            location.href="adminaddsyllabus.php?subid='.$_SESSION['subid'].'";
              </script>';
                  
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
      else if(isset($_POST['actsubmit'])){
               
        $actid = uniqid();
        $sid = $_POST['sid'];        
        $actmod = $_POST['actmod'];
        $act = $_POST['act'];
        $sked = $_POST['sked'];

        $query = mysqli_query($con, "INSERT INTO ACTIVITIES(ACTIVITY_ID,TITLE,SCHEDULE,MODULE_ID,SUBJECT_ID) 
        VALUES('$actid','$act','$sked','$actmod','$sid')");
        if($query){            
            echo '<script>alert("Succesfully Updated!");
            location.href="Activities.php?subid='.$_SESSION['subid'].'";
              </script>';
                  
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
      else if(isset($_POST['refsubmit'])){
               
        $refid = uniqid();
        $sid = $_POST['sid'];        
        $ref = $_POST['ref'];
        
        $query = mysqli_query($con, "INSERT INTO REFERENCE(REFERENCE_ID,REFERENCE,SUBJECT_ID) 
        VALUES('$refid','$ref','$sid')");
        if($query){            
            echo '<script>alert("Succesfully Updated!");
            location.href="adminaddsyllabus.php?subid='.$_SESSION['subid'].'";
              </script>';
                  
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
      else if(isset($_POST['consubmit'])){
               
        $contid = uniqid();
        $sid = $_POST['sid'];        
        $insname = $_POST['insname'];
        $inscont = $_POST['inscont'];
        $insmail = $_POST['insmail'];
        $hr = $_POST['from'] .' - '. $_POST['to'] ;        

        
        $query = mysqli_query($con, "INSERT INTO CONTACT(CONTACT_ID,INSTRUCTOR,CONTACT_NO,EMAIL,CONSULTATION_HOURS,SUBJECT_ID) 
        VALUES('$contid','$insname','$inscont','$insmail','$hr','$sid')");
        if($query){            
            echo '<script>alert("Succesfully Updated!");
            location.href="adminaddsyllabus.php?subid='.$_SESSION['subid'].'";
              </script>';
                  
        }
        else{
          echo '<script>alert("Oops! Error Encountered");</script>';
        }
      }
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Create Syllabus</h3>
    <ul class="nav nav-tabs" role="tablist">            
        <li role="presentation"><a href="adminaddsyllabus.php?subid=<?php echo $_SESSION['subid']?>">Objectives</a></li>
        <li role="presentation"><a href="Modules.php?subid=<?php echo $_SESSION['subid']?>">Modules</a></li>
        <li role="presentation" class="active"><a href="Activities.php?subid=<?php echo $_SESSION['subid']?>">Activities</a></li>
        <li role="presentation"><a href="SyllReference.php?subid=<?php echo $_SESSION['subid']?>">Reference</a></li>          
        <li role="presentation"><a href="SyllContact.php?subid=<?php echo $_SESSION['subid']?>">Contact</a></li>         
    </ul> 
    <br/>
    <div class="col-md-8" style="padding: 0">
        <!-- <form>             -->
            <div><label>Subject</label></div>
            <input type="text" name="subtitle" class="form-control" value="<?php echo $row1['S_TITLE']?>" autocomplete="off" style="text-align: center" required readonly>                                                
            <br/>
            <!-- <div><label>Objectives <button class="btn btn-primary btn-xs" id="add"><span class="glyphicon glyphicon-plus"></span></button> </label></div>
            <table class="table table-bordered">                
                    <?php
                        $query2 = mysqli_query($con, "SELECT * FROM OBJECTIVES WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
                        while($row2 = mysqli_fetch_array($query2)){
                            echo '<tr >
                                    <td style="text-align:left">'.$row2['OBJECTIVE'].'</td>
                                    <td width="10%"><a id="edit" class="btn btn-danger btn-xs" name="edit" href="deleteobjective.php?id='.$row2['OBJECTIVE_ID'].'"><span class="glyphicon glyphicon-trash"></a></td>
                                  </tr>';
                        }

                    ?>  
            </table>
            <div><label>Modules <button class="btn btn-primary btn-xs" id="addmodule"><span class="glyphicon glyphicon-plus"></span></button> </label></div>
            <table class="table table-bordered">                
                    <?php
                        $query2 = mysqli_query($con, "SELECT * FROM MODULES WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
                        while($row2 = mysqli_fetch_array($query2)){
                            echo '<tr >
                            <td style="text-align:left">'.$row2['MODULE_NO'].'</td>
                            <td style="text-align:left">'.$row2['TITLE'].'</td>
                            <td width="10%"><a id="edit" class="btn btn-danger btn-xs" name="edit" href="deletemodule.php?id='.$row2['MODULE_ID'].'"><span class="glyphicon glyphicon-trash"></a></td>
                                  </tr>';
                        }

                    ?>  
            </table> -->
            <div><label>Activities <button class="btn btn-primary btn-xs" id="addnewacti"><span class="glyphicon glyphicon-plus"></span></button> </label></div>
            <table class="table table-bordered">                
                    <?php
                        $query2 = mysqli_query($con, "SELECT *,ACTIVITIES.TITLE AS A_TITLE FROM ACTIVITIES INNER JOIN MODULES ON ACTIVITIES.MODULE_ID = MODULES.MODULE_ID  WHERE ACTIVITIES.SUBJECT_ID = '".$_SESSION['subid']."'");
                        while($row2 = mysqli_fetch_array($query2)){
                            echo '<tr >
                            <td style="text-align:left">'.$row2['MODULE_NO'].'</td>
                            <td style="text-align:left">'.$row2['A_TITLE'].'</td>
                            <td style="text-align:left">'.$row2['SCHEDULE'].'</td>
                            <td width="10%"><a id="edit" class="btn btn-danger btn-xs" name="edit" href="deleteactivity.php?id='.$row2['ACTIVITY_ID'].'"><span class="glyphicon glyphicon-trash"></a></td>
                                  </tr>';
                        }

                    ?>  
            </table>
            <!-- <div><label>Reference <button class="btn btn-primary btn-xs" id="addnewref"><span class="glyphicon glyphicon-plus"></span></button> </label></div>
            <table class="table table-bordered">                
                    <?php
                        $query2 = mysqli_query($con, "SELECT * FROM REFERENCE WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
                        while($row2 = mysqli_fetch_array($query2)){
                            echo '<tr >
                            <td style="text-align:left">'.$row2['REFERENCE'].'</td>
                            <td width="10%"><a id="edit" class="btn btn-danger btn-xs" name="edit" href="deletereference.php?id='.$row2['REFERENCE_ID'].'"><span class="glyphicon glyphicon-trash"></a></td>
                                  </tr>';
                        }

                    ?>  
            </table>
            <div><label>Contact <button class="btn btn-primary btn-xs" id="addnewcontact"><span class="glyphicon glyphicon-plus"></span></button> </label></div>
            <table class="table table-bordered">                
                    <?php
                        $query2 = mysqli_query($con, "SELECT * FROM CONTACT WHERE SUBJECT_ID = '".$_SESSION['subid']."'");
                        while($row2 = mysqli_fetch_array($query2)){
                            echo '<tr >
                            <td style="text-align:left">'.$row2['INSTRUCTOR'].'</td>
                            <td style="text-align:left">'.$row2['CONTACT_NO'].'</td>
                            <td style="text-align:left">'.$row2['EMAIL'].'</td>
                            <td style="text-align:left">'.$row2['CONSULTATION_HOURS'].'</td>
                            <td width="10%"><a id="edit" class="btn btn-danger btn-xs" name="edit" href="deletecontact.php?id='.$row2['CONTACT_ID'].'"><span class="glyphicon glyphicon-trash"></a></td>
                                  </tr>';
                        }

                    ?>  
            </table> -->
        <!-- </form> -->


            <div id="id01" class="modal" style="display:none">
                <div class="col-sm-4">
                </div>
                    <form class="col-sm-4 modal-content animate" id="form" method="POST" style="display:none" enctype="multipart/form-data"><!-- importante to sa upload -->
                                        
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
                                <a class="btn btn-default" id="close"  value="Close" style="width: 30%; float: right">Cancel</a>
                            </div>            
                            <br/><br/>
                    </form>
                    <div class="col-sm-4">
                    </div>
            </div>


            <div id="id02" class="modal" style="display:none">
                <div class="col-sm-3">
                </div>
                <form class="col-sm-6 modal-content animate" id="form2" method="POST" style="display:none" enctype="multipart/form-data"><!-- importante to sa upload -->
                                    
                        <h4>Update User</h4>                        
                        <hr/>
                        <div>
                            <label>User Id</label>
                            <input type="text" class="form-control" id="sid" name="sid" value="<?php echo $_SESSION['subid']?>" autocomplete="off" required readonly>                            
                        </div> 
                        <div>                           
                            <input type="text" class="form-control sid" name="sid" value="<?php echo $_SESSION['subid']?>" autocomplete="off" style="display: none" required readonly>                            
                        </div>   
                        <br/>
                        <div id="objresult">             
                        </div>
                              
                        <div class="col-xs-12" style="padding: 20px 0 0">                     
                            <input type="submit" class="form-control btn btn-primary" id="update" value="Save Changes" name="updateobjsubmit" style="width: 30%; float: right;margin-left: 5px">
                            <a class="btn btn-default" id="close2"  value="Close" style="width: 30%; float: right">Cancel</a>
                        </div> 
                </form>
                <div class="col-sm-3">
                </div>
            </div>    
            
            <div id="id03" class="modal" style="display:none">
                <div class="col-sm-4">
                </div>
                <form class="col-sm-4 modal-content animate" id="form3" method="POST" style="display:none" enctype="multipart/form-data"><!-- importante to sa upload -->
                                        
                            <h4>Add New Module</h4>
                            <span id="message"></span>
                            <hr/>              
                            <input type="text" class="form-control" name="sid" value="<?php echo $_SESSION['subid']?>" autocomplete="off" required readonly>                  
                            <br/>
                            <div class="col-sm-12" style="padding: 0 0 0 0">
                                <textarea class="form-control" name="mod" autocomplete="off" required></textarea>  
                                
                            </div>
                            
                            <div class="col-xs-12" style="padding: 20px 0 0">                     
                                <input type="submit" class="form-control btn btn-primary save" id="save" value="Add to List" name="modsubmit" style="width: 30%; float: right;margin-left: 5px">
                                <a class="btn btn-default" id="close3"  value="Close" style="width: 30%; float: right">Cancel</a>
                            </div>            
                            <br/><br/>
                    </form>
                    <div class="col-sm-4">
                    </div>
            </div>
            <div id="id04" class="modal" style="display:none">
                <div class="col-sm-3">
                </div>
                <form class="col-sm-6 modal-content animate" id="form4" method="POST" style="display:none" enctype="multipart/form-data"><!-- importante to sa upload -->
                                        
                            <h4>Add New Activity</h4>
                            <span id="message"></span>
                            <hr/>              
                            <input type="text" class="form-control" name="sid" value="<?php echo $_SESSION['subid']?>" autocomplete="off" required readonly>                  
                            <br/>
                            <label>Module</label>
                            <select type="text" name="actmod" class="form-control" required>
                                <option value="">---</option>
                                <?php
                                    $query1 = mysqli_query($con, "SELECT * FROM MODULES WHERE SUBJECT_ID='".$_SESSION['subid']."'");
                                    while($row1 = mysqli_fetch_array($query1)){
                                ?>
                                <option value="<?php echo $row1['MODULE_ID']?>"><?php echo $row1['TITLE']?></option>
                                <?php
                                    }
                                ?>
                            </select>                                 
                            <div class="col-sm-12" style="padding: 0 0 0 0">
                            <label>Title</label>
                                <textarea class="form-control" name="act" autocomplete="off" required></textarea>                                  
                            </div>
                            <label>Schedule</label>
                            <input type="text" class="form-control" name="sked" autocomplete="off" required>
                            
                            <div class="col-xs-12" style="padding: 20px 0 0">                     
                                <input type="submit" class="form-control btn btn-primary save" id="save" value="Add to List" name="actsubmit" style="width: 30%; float: right;margin-left: 5px">
                                <a class="btn btn-default" id="close4"  value="Close" style="width: 30%; float: right">Cancel</a>
                            </div>            
                            <br/><br/>
                    </form>
                    <div class="col-sm-3">
                    </div>
            </div>
            <div id="id05" class="modal" style="display:none">
                <div class="col-sm-4">
                </div>
                <form class="col-sm-4 modal-content animate" id="form5" method="POST" style="display:none" enctype="multipart/form-data"><!-- importante to sa upload -->
                                        
                            <h4>Add New Reference</h4>
                            <span id="message"></span>
                            <hr/>              
                            <input type="text" class="form-control" name="sid" value="<?php echo $_SESSION['subid']?>" autocomplete="off" required readonly>                  
                            <br/>
                            <div class="col-sm-12" style="padding: 0 0 0 0">
                                <textarea class="form-control" name="ref" autocomplete="off" required></textarea>  
                                
                            </div>
                            
                            <div class="col-xs-12" style="padding: 20px 0 0">                     
                                <input type="submit" class="form-control btn btn-primary save" id="save" value="Add to List" name="refsubmit" style="width: 30%; float: right;margin-left: 5px">
                                <a class="btn btn-default" id="close5"  value="Close" style="width: 30%; float: right">Cancel</a>
                            </div>            
                            <br/><br/>
                    </form>
                    <div class="col-sm-4">
                    </div>
            </div>
            <div id="id06" class="modal" style="display:none">
                <div class="col-sm-4">
                </div>
                <form class="col-sm-4 modal-content animate" id="form6" method="POST" style="display:none" enctype="multipart/form-data"><!-- importante to sa upload -->
                                        
                            <h4>Add Contact</h4>
                            <span id="message"></span>
                            <hr/>              
                            <input type="text" class="form-control" name="sid" value="<?php echo $_SESSION['subid']?>" autocomplete="off" required readonly>                  
                            <label>Name</label>
                            <input type="text" class="form-control" name="insname">
                            <label>Contact No.</label>
                            <input type="text" class="form-control" name="inscont">
                            <label>E-mail</label>
                            <input type="text" class="form-control" name="insmail">
                            <div><label>Consultation Hours</label></div>
                            <div class="col-sm-6" style="padding: 0 0 10px 0">
                                <label>From</label>
                                <input type="text" name="from"  class="form-control" id="picker1">  
                            </div>
                            <div class="col-sm-6" style="padding: 0 0 0 10px">
                                <label>To</label>
                                <input type="text" name="to" class="form-control" name="insmail" id="picker2">  
                            </div>
                            
                            <div class="col-xs-12" style="padding: 20px 0 0">                     
                                <input type="submit" class="form-control btn btn-primary save" id="save" value="Add to List" name="consubmit" style="width: 30%; float: right;margin-left: 5px">
                                <a class="btn btn-default" id="close6"  value="Close" style="width: 30%; float: right">Cancel</a>
                            </div>            
                            <br/><br/>
                    </form>
                    <div class="col-sm-4">
                    </div>
            </div>


            <!-- <button class="btn btn-success" onclick="location.href='complete.php?subid=<?php echo $_SESSION['subid']?>'">Complete Syllabus</button> -->
    </div>
</div>

<?php
    include_once('footer.php');
?>