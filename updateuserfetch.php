<?php
$connect = mysqli_connect("localhost", "root", "", "Syllabus");
$output = '';
if(isset($_POST["yungsearch"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["yungsearch"]);
	$query = "
	SELECT * FROM CONTACT 
	WHERE CONTACT_ID= '".$search."'";

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	/* $output .= '<div class="table-responsive">
					<table class="table table-hover table-striped table-bordered" id="table" border="1">
						<tr>													
							<th>DESTINATION</th>
							<th>PURPOSE</th>
							<th>STATUS</th>							
						</tr>'; */
	while($row = mysqli_fetch_array($result))
	{
        $output .= '
		<input type="text" class="form-control" name="insname" value="'.$row['INSTRUCTOR'].'">
		<input type="text" class="form-control" name="inscont" value="'.$row['CONTACT_NO'].'">
		<input type="text" class="form-control" name="insmail" value="'.$row['EMAIL'].'">
		<input type="text" class="form-control" name="insmail" value="'.$row['CONSULTATION_HOURS'].'">        
    <br/>

    
		';
	}
	echo $output;
}
else
{
	
}
}

/* <div class="col-sm-6" style="padding: 0 0 0 5px">
            <div><label>Confirm New Password</label></div>
            <input type="text" class="form-control" name="cpass" autocomplete="off" required>
        </div> */
?>