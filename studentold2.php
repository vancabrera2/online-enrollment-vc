<?php
session_start();

if(!isset($_SESSION['user_studold']))
{
include 'not_login.php'; 
}
else{
$un_studold=$_SESSION['user_studold'];
$studold_id=$_SESSION['sess_studold_id'];
}
?>

<html>
<head>
<title> Van's Project </title>
<link rel="stylesheet" href="CSS/style.css">
	<script type="text/javascript" src="Javascript/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="Javascript/functions.js"></script>
</head>
<body>

<div id="wrapper">

	<div id="content">
	
		<div id="header">
			<img src="Images/Feulogo.png" class="feulogopic">
			<p class="headtext"> Far Eastern University DILIMAN </p>
			<p class="loginas"> You are logged in as <strong> <?php echo $un_studold ?> </strong> <a href="logout.php"> (logout) </a>
		<div id="headnav">
		<ul>
			<li class="fb"> <a href="https://www.facebook.com/FEUdiliman"> <img src="Images/fblogo.png"> </a></li>
			<li class="twit"> <a href="https://twitter.com/FEUdiliman"> <img src="Images/twitlogo.png"> </a></li>
		</ul>

		</div> <!-- end of headnav-->
		
	
		</div> <!-- end of header-->
		
		<div id="nav-box">	
		
		<ul class="ul-index">
		<li class="home"> <a href="#"> HOME </a> </li>
		<li> <a href="#"> ABOUT </a> </li>
		<li> <a href="#"> ACADEMICS </a> </li>
		<li> <a href="#"> CONTACT US </a> </li>
		</ul>
		
		</div>
		
		<div id="adminbox">
				
		<img src="images/student.jpg" class="adminimg">

		<ul class="ulstudent">
		<li> <input type="radio" onclick="enrollold()" name="radio" /> Enroll Subject </input> </li>
		<li> <input type="radio" onclick="editaccount_studentold()" name="radio"/> Edit Account </input> </li>
		<li> <input type="radio" onclick="viewgradesold()" name="radio"/> View Grades </input> </li>
		<li> <input type="radio" onclick="viewscheduleold()" name="radio"/> View Schedule </input> </li>
		</ul>
		
		</div>
	
	<div id="enroll-subject" style="line-height:2em; overflow:auto; padding:5px;" > 
			<table border="1" class="table-oldstud"> 
							<label class="standardtxt"> <b> Available Subjects </b> </label>
									<tr> 
									<thead>
										<th> Subject Name </th>
										<th> Subject Code </th>
										<th> Time/Day </th>
									</thead>
									</tr>
									
						<?php
						include("connection.php");
						
							
						$result=mysql_query("SELECT * FROM subjects");
						
						while($row = mysql_fetch_array($result)) 
						{	
							$s_id=$row['SubjectID'];
							$s_name=$row['SubjectName'];
							$s_code = $row['SubjectCode'];	
							$Timeday = $row['TimeDay'];	
							
							echo "<tr align='center'>";	
							echo"<td><font color='black'>" . $s_name ."</font></td>";
							echo"<td><font color='black'>" . $s_code ."</font></td>";
							echo"<td><font color='black'>" . $Timeday ."</font></td>";
							echo"<td> <a href ='student_old_enroll.php?SubjectID=$s_id'>Enroll</a>";						
							echo "</tr>";
						}
							
						
						mysql_close($con); 
						
						?>	
			</table>
		
		
</div> <!-- end of enroll -->

		<div id='table_enrolled_subj' style="line-height:2em; overflow:auto; padding:5px;">
				<p> <center> <b> Subjects </b> </center> </p>
					<table border='1' align='center'>
						<th> Subject Name </th>
						<th> Time Day </th>

					<?php
						include("connection.php");
						
					$result=mysql_query("SELECT * FROM student2 WHERE StudentID='$studold_id'");	
						
						while($row = mysql_fetch_array($result)) 
						{	
							//$s_enroll_id=$row['Subject_ID_enroll'];
							$stud_id=$row['StudentID'];
							$s_code = $row['Subject1'];	
							$s_code2 = $row['Subject2'];	
							$s_code3 = $row['Subject3'];	
							$s_code4 = $row['Subject4'];	
							$s_code5 = $row['Subject5'];	
							$s_code6 = $row['Subject6'];	
							
							//$_SESSION['Subjectid']=$s_code;		
						}
						///				
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subj_id = $select_subj_row['SubjectID'];
								$subject_name=$select_subj_row['SubjectName'];
								$timeday=$select_subj_row['TimeDay'];
								$_SESSION['subj_id']=$subj_id;
							
						///		
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code2' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subj_id2 = $select_subj_row['SubjectID'];
								$subject_name2=$select_subj_row['SubjectName'];
								$timeday2=$select_subj_row['TimeDay'];		
								$_SESSION['subj_id']=$subj_id2;
						///		
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code3' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday);
								$subj_id3 = $select_subj_row['SubjectID'];
								$subject_name3=$select_subj_row['SubjectName'];
								$timeday3=$select_subj_row['TimeDay'];	
								$_SESSION['subj_id']=$subj_id3;			
						///
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code4' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subj_id4 = $select_subj_row['SubjectID'];
								$subject_name4=$select_subj_row['SubjectName'];
								$timeday4=$select_subj_row['TimeDay'];	
								$_SESSION['subj_id']=$subj_id4;
						///		
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code5' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subj_id5 = $select_subj_row['SubjectID'];
								$subject_name5=$select_subj_row['SubjectName'];
								$timeday5=$select_subj_row['TimeDay'];	
								$_SESSION['subj_id']=$subj_id5;
						////	
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code6' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subj_id6 = $select_subj_row['SubjectID'];
								$subject_name6=$select_subj_row['SubjectName'];
								$timeday6=$select_subj_row['TimeDay'];
								$_SESSION['subj_id']=$subj_id6;
						
				
					echo	"<tr>";
					echo	"<td>" . $subject_name . "</td>";
					echo	"<td>" . $timeday . "</td>";	
					echo	"<td> <a href ='student_old_enrollDROP.php?SubjectID=$subj_id'>Drop</a> </td>";	
					echo	"</tr>";	
					
					echo	"<tr>";
					echo	"<td>" . $subject_name2 . "</td>";
					echo	"<td>" . $timeday2 . "</td>";	
					echo	"<td> <a href ='student_old_enrollDROP.php?SubjectID=$subj_id2'>Drop</a> </td>";	
					echo	"</tr>";
						
					echo	"<tr>";
					echo	"<td>" . $subject_name3 . "</td>";
					echo	"<td>" . $timeday3 . "</td>";	
					echo	"<td> <a href ='student_old_enrollDROP.php?SubjectID=$subj_id3'>Drop</a> </td>";	
					echo	"</tr>";
					
					echo	"<tr>";
					echo	"<td>" . $subject_name4 . "</td>";
					echo	"<td>" . $timeday4 . "</td>";	
					echo	"<td> <a href ='student_old_enrollDROP.php?SubjectID=$subj_id4'>Drop</a> </td>";	
					echo	"</tr>";
					
					echo	"<tr>";
					echo	"<td>" . $subject_name5 . "</td>";
					echo	"<td>" . $timeday5 . "</td>";	
					echo	"<td> <a href ='student_old_enrollDROP.php?SubjectID=$subj_id5'>Drop</a> </td>";	
					echo	"</tr>";
					
					echo	"<tr>";
					echo	"<td>" . $subject_name6 . "</td>";
					echo	"<td>" . $timeday6 . "</td>";	
					echo	"<td> <a href ='student_old_enrollDROP.php?SubjectID=$subj_id6'>Drop</a> </td>";	
					echo	"</tr>";
					
			 
			mysql_close($con); 
						
						?>	
			</table>
			 </div>
		<?php
			
				include "connection.php";

				$un=$_SESSION['sess_studold_id'];
				$result = mysql_query("SELECT * FROM student2 where StudentID='$un'") or die(mysql_error());
				$row = mysql_fetch_array($result);
				if (!$result) 
						{
						die("Error: Data not found..");
						}

								$Password= $row['Password'] ;
								$fn=$row['Firstname'];
								$ln=$row['Lastname'];
								$course=$row['Course'];
								


				if(isset($_POST['btnsavechange']))
				{	
					$pass_save = $_POST['changepass1'];
					$pass1=$_POST['changepass1'];
					$pass2=$_POST['changepass2'];
					
					if ( $pass1 == $pass2 )
					{
					mysql_query("UPDATE student SET Password ='$pass_save'")
								or die(mysql_error()); 
					echo "<script> alert('Password has been change.') </script>";
					}
					else
					{
					echo "<script> alert('Password mismatch.')</script>";
					}
					}

					mysql_close($con);
					?>
	<div id="edit-account" >
			
			<table class="table-editstudent"> 
			<form method="post">
				<label class="txt-editstud"> <font size="5"> <b> Your Account </b> </font> </p> </label>
				<tr>
				<td> Your Firstname </td>
				<td> <input type="text" value="<?php echo $fn ?>" name="fname" disabled> </td>
				</tr>
				<tr>
				<td> Your Lastname </td>
				<td> <input type="text" value="<?php echo $ln ?>" name="lname" disabled> </td>
				</tr>
				<tr>
				<tr>
				<td> Your Course </td>
					<td> <input type="text" value="<?php echo $course ?>" name="course" disabled> </td>
				</tr>
				<tr>
				<td> New Password </td>
				<td> <input id="password1" type="password" name="changepass1" placeholder="enter new password.." disabled> </td>
				</tr>
				
				<tr>
				<td> Confirm Password </td> 
				<td> <input id="password2" type="password" name="changepass2" placeholder="re-enter new password.." disabled> </td>
				</tr>
				
				<tr>
				<td> <input type="submit" name="btnsavechange" value="save"> </td>
				</form>
				<td> <input type="submit" name="change" value="click to change password" onclick="change()"> </td>
				</tr>
				
				
			</table>
	
	
		</div> <!--end of edit-studentold-->
		
		<div id="view-gradesold">
			
			<table border="1" class="table-oldstud">
					<label class="standardtxt"> <b> Your Grades </b> </label>
						<tr>
								<thead>
								<th> Subject Name </th>
								<th> GPA </th>
								<th> Verdict </th>
								</thead>
								</tr>
	
						<?php

			include("connection.php");
						
						$result=mysql_query("SELECT * FROM student2 where StudentID='$studold_id'");	
						while($row = mysql_fetch_array($result)) 
						{	
							
							
							$s_code=$row['Subject1'];
							$s_code2=$row['Subject2'];
							$s_code3=$row['Subject3'];
							$s_code4=$row['Subject4'];
							$s_code5=$row['Subject5'];
							$s_code6=$row['Subject6'];
							
							//$gpa=$row['gpa'];
							//$verdict=$row['verdict'];
							
						////					SUBJECT1
						$query1 = mysql_query("SELECT * FROM student2 WHERE StudentID='$studold_id'")or die(mysql_error());
						$rows1 = mysql_num_rows($query1);
						
						if ($rows1 == 1){
						$select_subj1 = mysql_query("SELECT * FROM subject1_grade WHERE StudentID='$studold_id' ")or die(mysql_error());
						$select_subj_row1 = mysql_fetch_array($select_subj1); 
								
								$gpa=$select_subj_row1['GPA'];
								$verdict=$select_subj_row1['Verdict'];
						
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subject_name=$select_subj_row['SubjectName'];
								$timeday=$select_subj_row['TimeDay'];
										}
										
						//////				SUBJECT2
						$query2 = mysql_query("SELECT * FROM student2 WHERE StudentID='$studold_id'")or die(mysql_error());
						$rows2 = mysql_num_rows($query2);
						
						if ($rows2 == 1){
						$select_subj1 = mysql_query("SELECT * FROM subject2_grade WHERE StudentID='$studold_id' ")or die(mysql_error());
						$select_subj_row1 = mysql_fetch_array($select_subj1); 
	
								$gpa2=$select_subj_row1['GPA'];
								$verdict2=$select_subj_row1['Verdict'];
								
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code2' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subject_name2=$select_subj_row['SubjectName'];
								$timeday2=$select_subj_row['TimeDay'];		
										}
										
						//////				SUBJECT3
						$query3 = mysql_query("SELECT * FROM student2 WHERE StudentID='$studold_id'")or die(mysql_error());
						$rows3 = mysql_num_rows($query3);
						
						if ($rows3 == 1){
						$select_subj1 = mysql_query("SELECT * FROM subject3_grade WHERE StudentID='$studold_id' ")or die(mysql_error());
						$select_subj_row1 = mysql_fetch_array($select_subj1); 
	
								$gpa3=$select_subj_row1['GPA'];
								$verdict3=$select_subj_row1['Verdict'];
						
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code3' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subject_name3=$select_subj_row['SubjectName'];
								$timeday3=$select_subj_row['TimeDay'];
										}
										
						//////				SUBJECT4
						$query4 = mysql_query("SELECT * FROM student2 WHERE StudentID='$studold_id'")or die(mysql_error());
						$rows4 = mysql_num_rows($query4);
						
						if ($rows4 == 1){
						$select_subj1 = mysql_query("SELECT * FROM subject4_grade WHERE StudentID='$studold_id' ")or die(mysql_error());
						$select_subj_row1 = mysql_fetch_array($select_subj1); 
	
								$gpa4=$select_subj_row1['GPA'];
								$verdict4=$select_subj_row1['Verdict'];
						
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code4' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subject_name4=$select_subj_row['SubjectName'];
								$timeday4=$select_subj_row['TimeDay'];
										}
										
						/////				SUBJECT5
						$query5 = mysql_query("SELECT * FROM student2 WHERE StudentID='$studold_id'")or die(mysql_error());
						$rows5 = mysql_num_rows($query5);
						
						if ($rows5 == 1){
						$select_subj1 = mysql_query("SELECT * FROM subject5_grade WHERE StudentID='$studold_id' ")or die(mysql_error());
						$select_subj_row1 = mysql_fetch_array($select_subj1); 
	
								$gpa5=$select_subj_row1['GPA'];
								$verdict5=$select_subj_row1['Verdict'];
								
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code5' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subject_name5=$select_subj_row['SubjectName'];
								$timeday5=$select_subj_row['TimeDay'];		
										}
										
						/////				SUBJECT6
						$query6 = mysql_query("SELECT * FROM student2 WHERE StudentID='$studold_id'")or die(mysql_error());
						$rows6 = mysql_num_rows($query6);
						
						if ($rows6 == 1){
						$select_subj1 = mysql_query("SELECT * FROM subject6_grade WHERE StudentID='$studold_id' ")or die(mysql_error());
						$select_subj_row1 = mysql_fetch_array($select_subj1); 
	
								$gpa6=$select_subj_row1['GPA'];
								$verdict6=$select_subj_row1['Verdict'];
								
						$select_subject_timeday = mysql_query("SELECT * FROM subjects WHERE SubjectCode='$s_code6' ")or die(mysql_error());
						$select_subj_row = mysql_fetch_array($select_subject_timeday); 
								$subject_name6=$select_subj_row['SubjectName'];
								$timeday6=$select_subj_row['TimeDay'];		
										}
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name ."</font></td>";
							echo "<td><font color='black'>" . $gpa ."</font></td>";
							echo "<td><font color='black'>" . $verdict ."</font></td>";
							//echo "<td><font color='black'>" . $gpa ."</font></td>";
							//echo "<td> <font color='black'>" . $verdict ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name2 ."</font></td>";
							echo "<td><font color='black'>" . $gpa2 ."</font></td>";
							echo "<td> <font color='black'>" . $verdict2 ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name3 ."</font></td>";
							echo "<td><font color='black'>" . $gpa3 ."</font></td>";
							echo "<td> <font color='black'>" . $verdict3 ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name4 ."</font></td>";
							echo "<td><font color='black'>" . $gpa4 ."</font></td>";
							echo "<td> <font color='black'>" . $verdict4 ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name5 ."</font></td>";
							echo "<td><font color='black'>" . $gpa5 ."</font></td>";
							echo "<td> <font color='black'>" . $verdict5 ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name6 ."</font></td>";
							echo "<td><font color='black'>" . $gpa6 ."</font></td>";
							echo "<td> <font color='black'>" . $verdict6 ."</font></td>";
							echo "</tr>";
			
						}
						mysql_close($con);

		?>
					</table>
			
		</div>
		
		
		<div id="view-schedule">
		
			<table border="1" class="table-oldstud">
					<label class="standardtxt"> <b> Your Schedule </b> </label>
					<tr> 
					<th> Subject Name </th>
					<th> Subject Code </th>
					<th> Time/Day </th>
					</tr>
					
					
		<?php
					
					echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name ."</font></td>";
							echo "<td><font color='black'>" . $s_code ."</font></td>";
							echo "<td><font color='black'>" . $timeday ."</font></td>";
							//echo "<td><font color='black'>" . $gpa ."</font></td>";
							//echo "<td> <font color='black'>" . $verdict ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name2 ."</font></td>";
							echo "<td><font color='black'>" . $s_code2 ."</font></td>";
							echo "<td> <font color='black'>" . $timeday2 ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name3 ."</font></td>";
							echo "<td><font color='black'>" . $s_code3 ."</font></td>";
							echo "<td> <font color='black'>" . $timeday3 ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name4 ."</font></td>";
							echo "<td><font color='black'>" . $s_code4 ."</font></td>";
							echo "<td> <font color='black'>" . $timeday4 ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name5 ."</font></td>";
							echo "<td><font color='black'>" . $s_code5 ."</font></td>";
							echo "<td> <font color='black'>" . $timeday5 ."</font></td>";
							echo "</tr>";
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $subject_name6 ."</font></td>";
							echo "<td><font color='black'>" . $s_code6 ."</font></td>";
							echo "<td> <font color='black'>" . $timeday6 ."</font></td>";
							echo "</tr>";
							
			?>
				
			</table>
		
		</div> <!-- end of view-schedule-->
		
		
		</div> <!-- end of content-->
		
		
		
		
		
	</div> <!-- end of content-->
		<div id="barline">
		<img src="Images/barline.jpg" class="barline">	
		</div>
		<div id="footer">
			<p class="footext"> Website by: Van Cabrera <br>
			&copy; 	All Rights Reserved</p>
			
		</div>	
</div>


</body>
</html>