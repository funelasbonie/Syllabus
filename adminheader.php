<?php
  session_start();
  include 'conn.php';  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Syllabus</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="datetimepicker/jquery.datetimepicker.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet" type="text/css">

    <script src="js/jquery-1.11.3-jquery.min.js"></script> 
    <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>

    <script src="package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
  
    <link href="DataTables-1.10.20/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/adminstyle.css" rel="stylesheet">

    <script>
        function ss(){
            swal({
              title: 'Saved',
                type: 'success',
                showCancelButton: false,
                  confirmButtonColor: 'rgb(28,146,72)',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok'
              }).then((result) => {
                  if (result.value) {
                    window.location.href= 'usermanagement.php';
                }
              })
            }        
      </script>

    <style>
        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot');
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
        } 
        html {
            position: relative;
            min-height: 100%;
        }
        body {
        /* Margin bottom by footer height */
            margin-bottom: 60px;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */                     
        }
        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */
        .container .text-muted {
            margin: 20px 0;
        }

        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        code {
            font-size: 80%;
        }


        
        .navbar-fixed-top{
            background-color: rgb(0,115,170);            
            border: 1px solid rgb(0,115,170);            
        }          
        div.sidebar{         
          background-color: rgb(35,40,45);                              
        }                   
        ul.nav-sidebar li a{
            color: lightgray;
        }
        ul.nav-sidebar li.active a{
          background-color: rgb(34,34,34);
          color: rgb(0,115,170);  
        }    
        ul.nav-sidebar li.active a:hover{
          background-color: rgb(34,34,34);
          color: rgb(0,115,170);       
        }     
        ul.nav-sidebar li a:hover{
          background-color: rgb(25,30,35);
          color: rgb(0,115,170);    
        }  
        table{
          width: 100%;
        }
        .table thead tr th,td{
          text-align: center;
        } 
        a.disabled{
          cursor: pointer;
        }
        .dataTables_length select{
          padding: 5px;
          border-radius: 2px;
          border: 1px solid darkgray;
        }
        a.enabled{
          cursor: pointer;
        }
        input[type="search"]{
          padding: 5px;
          border-radius: 2px;
          border: 1px solid darkgray;
        }    
        .modal{
          background-color: rgba(0,0,0,0.4);
          padding: 20px;
        }
        #form, #form2, #form4, #form5, #form3,#form6{          
          padding: 30px;
          margin: auto;
        }        
        #addnewaccountform{          
          padding: 30px;
          margin: auto;
        }  
        /* .form-control{
          font-size: 18px;
          padding: 8px 8px;
          height:auto;
          border-radius: 6px;
        }       */
        
        
        

        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot');
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
        }      
    </style>

    
  </head>

  <body style="background-image: url(images/white.jpg);background-attachment: fixed;">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand brand" href="#" style="color: white">Syllabus</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">                  
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white">Acccount <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li style="text-align:center;padding: 15px;">                          
                            <span class="glyphicon glyphicon-user" style="background-color: rgb(0,115,170); font-size: 25px;color: white;border-radius: 50px;padding: 15px"></span><br/>                          
                            <?php echo $_SESSION['adminname']?>
                        </li>
                        <li style="text-align:center;padding: 0 15px;"><a href="index.php" class="btn btn-default btn-xs">Sign Out</a><br/></li>                        
                    </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php if($page == 'adminaccounts'){echo 'active';}?>"><a href="adminaccounts.php"><span class="glyphicon glyphicon-lock" style="padding-right: 10px"></span>  Accounts</a></li>               
            <li class="<?php if($page == 'adminstudents'){echo 'active';}?>"><a href="adminstudents.php"><span class="glyphicon glyphicon-user"  style="padding-right: 10px"></span> Students</a></li>
            <li class="<?php if($page == 'adminsubjects'){echo 'active';}?>"><a href="adminsubjects.php"><span class="glyphicon glyphicon-th-list"  style="padding-right: 10px"></span>Subjects</a></li>
            <li class="<?php if($page == 'admincourse'){echo 'active';}?>"><a href="admincourse.php"><span class="glyphicon glyphicon-folder-open"  style="padding-right: 10px"></span>Course</a></li>
            
          </ul>
        </div>