<?php
$connect = mysqli_connect("localhost", "root", "", "syllabus");
$output = '';
if(isset($_POST["dun"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["dun"]);
	$query = "
	SELECT SUBJECT.TITLE AS TITLE, SUBJECT.SUBJECT_ID AS SUBJECT_ID FROM SUBJECT INNER JOIN COURSE ON SUBJECT.COURSE = COURSE.COURSE_ID
	WHERE SUBJECT.COURSE = '".$search."'";

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '
				<div><label>Subject</label></div>
				<select type="text" name="stdsubject" class="form-control" id="stdsubject" required>
				<option value="">---</option>
		';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
		
				<option value="'.$row['SUBJECT_ID'].'">'.$row['TITLE'].'</option>		                 
		
		';
    }
	$output .= '</select>
	<br/>
	<input type="submit" name="submit" class="btn btn-primary" value="Add to List">
	';
	echo $output;
}
else
{
	echo '
	<br/>
	No Subject Found';
}
}

/* <div class="col-sm-6" style="padding: 0 0 0 5px">
            <div><label>Confirm New Password</label></div>
            <input type="text" class="form-control" name="cpass" autocomplete="off" required>
        </div> */
?>