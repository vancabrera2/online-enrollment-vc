<?php
session_start();
ob_start();

if(!isset($_SESSION['user_admin']))
{
include 'not_login.php'; 
}
else{
$un_admin=$_SESSION['user_admin'];
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
			<p class="loginas"> You are logged in as <strong> <?php echo $un_admin ?> </strong> <a href="logout.php"> (logout) </a>
	
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
		
		</div> <!-- end of navigation -->
		
		
		<img src="images/admin.jpg" class="adminimg">
		
		<div id="adminbox">
				
				<ul class="uladmin">
				<li> <input type="radio" onclick="addstudent()" name="radio"/>Enroll New Student</input> </li>
				<li> <input type="radio" onclick="editing()" name="radio" /> Edit Account </input> </li>
				<li> <input type="radio" onclick="reset()" name="radio" /> Reset Passwords </input> </li>
				<li> <input type="radio" onclick="addsubject()" name="radio"/> Add Subject </input> </li>
				<li> <input type="radio" onclick="addprofessor()" name="radio"/> Add Professor </input> </li>
				</ul>
		
		</div> <!-- end of admin box-->
		
		<div id="add-student">
			
				<form method="post" class="form">
							
							<table>
							<label class="txt-reg"> Add Account </label>
							<tr>
								<td>Username: (Student ID)</td>
								<td><input type="password" name="user" disabled/></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="pw" placeholder="student password here.."  required /></td>
							</tr>
							<tr>
								<td>Confirm Password</td>
								<td><input type="password" name="pw2" placeholder="confirm password.." required/></td>
							</tr>
							<tr>
								<td>FirstName</td>
								<td><input type="text" name="fn" placeholder="student firstname here.." required/></td>
							</tr>
							<tr>
								<td>LastName</td>
								<td><input type="text" name="ln" placeholder="student lastname here.." required/></td>
							</tr>
							<tr>
								<td>Address</td>
								<td><input type="text" name="address" placeholder="student address here.." required/></td>
							</tr>
							<tr>
								<td>Year Level</td>
								<td><select name="year"/>
									<option> 1st</option>
									<option> 2nd</option>
									<option> 3rd</option>
									<option> 4th</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Gender</td>
								<td><select name="gender"/>
									<option> MALE</option>
									<option> FEMALE</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Course</td>
								<td><select name="course"/>
									<option> BSIT</option>
									<option> BSBA</option>
									<option> JMA</option>
									<option> OMSA</option>
									</select>
								</td>
							</tr>
							
						</table>
	
			
				<div id="insert-subject">
				
				<form method="post">
							<table class="table-insert-subj">
							
							<label class="txt-insert"> Subjects </label>
							
								<td> <b>Subject 1 </b></td>
						<tr>
							<td> 
								<select name='subject1'>
									<?php	
										include 'connection.php';
										$result = mysql_query("SELECT category_name FROM category");

										while ($row = mysql_fetch_assoc($result)) {
										 $dropdown .= "\r\n <option value='{$row['SubjectCode']}'> {$row['SubjectCode']} </option>";
										}

										echo $dropdown; 
									?>
								</select> 
							</td>
						</tr>
							
										<td> <b>Subject 2 <b></td>
						<tr>
							<td> 
								<select name='subject2'> 
									<?php
										$result2 = mysql_query("SELECT SubjectCode FROM subjects where Subject_Num='Subject2'")or die (mysql_error());
					
										while ($row2 = mysql_fetch_assoc($result2)) {
										 $dropdown2 .= "\r\n <option value='{$row2['SubjectCode']}'> {$row2['SubjectCode']} </option>";
										}
											
										echo $dropdown2;
									?>	
								</select>
							</td>
						</tr>
						
									<td> <b>Subject 3 <b></td>
						<tr>
							<td> 
									<select name='subject3'> 
									<?php
										$result3 = mysql_query("SELECT SubjectCode FROM subjects where Subject_Num='Subject3'")or die (mysql_error());
									
						
										while ($row3 = mysql_fetch_assoc($result3)) {
										 $dropdown3 .= "\r\n <option value='{$row3['SubjectCode']}'> {$row3['SubjectCode']} </option>";
										}
											
										echo $dropdown3;
									?>	
									</select>
							</td>
						</tr>			
						</table>	
						
						<table class='table-insert-subj2'>
										<td> <b>Subject 4 <b></td>
						<tr>
							<td> 
									<select name='subject4'> 
									<?php
										$result4 = mysql_query("SELECT SubjectCode FROM subjects where Subject_Num='Subject4'")or die (mysql_error());
									
						
										while ($row4 = mysql_fetch_assoc($result4)) {
										 $dropdown4 .= "\r\n <option value='{$row4['SubjectCode']}'> {$row4['SubjectCode']} </option>";
										}
											
										echo $dropdown4;
									?>	
									</select>
							</td>
						</tr>
										
										<td> <b>Subject 5 <b></td>
						<tr>
							<td> 
									<select name='subject5'> 
									<?php
										$result5 = mysql_query("SELECT SubjectCode FROM subjects where Subject_Num='Subject5'")or die (mysql_error());
									
						
										while ($row5 = mysql_fetch_assoc($result5)) {
										 $dropdown5 .= "\r\n <option value='{$row5['SubjectCode']}'> {$row5['SubjectCode']} </option>";
										}
											
										echo $dropdown5;
									?>	
									</select>
							</td>
						</tr>
						
										<td> <b>Subject 6 <b></td>
						<tr>
							<td> 
									<select name='subject6'> 
									
									<?php
										$result6 = mysql_query("SELECT SubjectCode FROM subjects where Subject_Num='Subject6'")or die (mysql_error());
									
						
										while ($row6 = mysql_fetch_assoc($result6)) {
										 $dropdown6 .= "\r\n <option value='{$row6['SubjectCode']}'> {$row6['SubjectCode']} </option>";
										}
											
										echo $dropdown6;
									?>	
									</select>
							</td>
							
						
						<tr>
							<td> <input class="btnadd" style="height:50px; width:140px" type="submit" name="btnadd" value="Add" onclick=" return confirm('Are you sure you want to add this Student?') " > </td>
						</tr>
							
						
						</table>
						
						
							
							
			</form>
		
		<?php
			if (isset($_POST['btnadd']))
				{	   
				include 'connection.php';
				
								$password= $_POST['pw'] ;	
								$password2= $_POST['pw2'];
								$firstname=$_POST['fn'] ;
								$lastname=$_POST['ln'] ;
								$address=$_POST['address'] ;
								$year=$_POST['year'] ;
								$gender=$_POST['gender'] ;
								$course=$_POST['course'] ;
								$status='new';
								$subj1=$_POST['subject1'];
								$subj2=$_POST['subject2'];
								$subj3=$_POST['subject3'];
								$subj4=$_POST['subject4'];
								$subj5=$_POST['subject5'];
								$subj6=$_POST['subject6'];
								
								
					if ($password == $password2)
					{
					 $insertstud="INSERT INTO student(Password,FirstName,LastName,Address,Year,Gender,Course,Status,Subject1,Subject2,
					 Subject3,Subject4,Subject5,Subject6) 
					 VALUES (	'$password','$firstname','$lastname','$address','$year','$gender','$course','$status','$subj1','$subj2','$subj3','$subj4','$subj5','$subj6')";
					 
				$resultstud=mysql_query($insertstud);

				if($resultstud)
				{
				echo "<h3>Student Added.</h3>";
				}
				else
				{
				echo mysql_error($con);
				}
				}
				else
				{
				echo "<h3> Password Mimsatch.</h3>";
				}
				}
			?>			
			
						</form>
				</div>	<!-- end of insert subject-->	
		</div> <!-- end of add student -->	
	
		<div id="edit-accountadmin">
			<?php
			
				include "connection.php";

				$result = mysql_query("SELECT * FROM admin where AdminID=1");
				$row = mysql_fetch_array($result);
				if (!$result) 
						{
						die("Error: Data not found..");
						}
								$Password= $row['Password'] ;					


				if(isset($_POST['btnsavechange']))
				{	
					$pass_save = $_POST['changepass1'];
					$pass1=$_POST['changepass1'];
					$pass2=$_POST['changepass2'];
					if ( $pass1 == $pass2 )
					{
					mysql_query("UPDATE admin SET Password ='$pass_save'")
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
			<table class="table-editadmin"> 
			<form method="post" onload="editing()"> 
				<label class="txt-editstud"> <font size="5"> <b> Your Account </b> </font> </p> </label>
				<tr>
				<td> Username </td>
				<td> <input type="text" id="username" value="Admin" name="useradmin"  disabled > </td>
				</tr>
				<tr>
				<td> New Password </td>
				<td> <input type="password" id="password1" name="changepass1"  disabled required > </td>
				</tr>
				<tr>
				<td> Confirm Password </td> 
				<td> <input type="password" id="password2" name="changepass2" disabled required > </td>
				</tr>
				
				<tr>
				<td> <input type="submit" name="btnsavechange" value="save" onclick= " return confirm('Are you sure you want to save this changes?')"> </td>
			</form>
				<td> <input id="change" type="submit" name="btnchange" value="Click to change your password" onclick="change()"> </td>
				</tr>
		
			</table>
			
		</div> <!--end of edit-account-->
	
	

	<div id="reset-studentpass"  style="line-height:2em; overflow:auto; padding:5px;">
			<table border="1" class="table-admin">
					<label class="standardtxt"> <b> List of Students </b> </label>
							<tr> 
							<thead>	
								<th> Student ID </th>
								<th> Password </th>
								<th> Firstname </th>
								<th> Lastname </th>
								<th> Address </th>
								<th> Year </th>
								<th> Gender </th>
								<th> Course </th>
							</thead>
							</tr>
	
	<?php
						
						include("connection.php");
						
						$result=mysql_query("SELECT * FROM student");
						
						while($row = mysql_fetch_array($result)) 
						{
							$id=$row['StudentID'];
							$password = $row['Password'];
							$firstname = $row['Firstname'];
							$lastname = $row['Lastname'];
							$address = $row['Address'];
							$year = $row['Year'];
							$gender = $row['Gender'];
							$course = $row['Course'];
							echo "<tr align='center'>";	
							echo"<td><font color='black'>" . $id ."</font></td>";
							echo"<td><font color='black'>" . $password ."</font></td>";
							echo"<td><font color='black'>". $firstname. "</font></td>";
							echo"<td><font color='black'>".$lastname . "</font></td>";
							echo"<td><font color='black'>".$address . "</font></td>";
							echo"<td><font color='black'>". $year. "</font></td>";	
							echo"<td><font color='black'>".$gender . "</font></td>";
							echo"<td><font color='black'>". $course. "</font></td>";
							echo"<td> <a href ='reset.php?StudentID=$id'>" ."Reset Password" . "</a>"; 
												
							echo "</tr>";
						}
						mysql_close($con);
		?>	
	
						</table>
	</div> <!-- end of reset password -->
	
		<div id="add-subject">
		
				<form method="post" class="form">
									
						<table>
								<label class="txt-reg"> Add Subject </label>
								<tr>
									<td>Subject Name</td>
									<td><input type="text" name="subjname" placeholder="Input subject name here.." required/></td>
								</tr>
								<tr>
									<td>Subject Code</td>
									<td><input type="text" name="subjcode" placeholder="Input subject code here.." required /></td>
								</tr>
								<tr>
									<td> Subject No. </td>
									<td> 
									<select name="subjno">
									<option> Subject1 </option>
									<option> Subject2 </option>
									<option> Subject3 </option>
									<option> Subject4 </option>
									<option> Subject5 </option>
									<option> Subject6 </option>
									</select>
									</td>
								</tr>
									<tr>
									<td>Schedule</td>
									<td>
									<select name="subjtimeday">
									<option> 7:30am-9:30am Monday </option>
									<option> 9:30-11:30am Tuesday </option>
									<option> 9:30-11:30am Wednesday </option>
									<option> 1:30-3:30am Thursday </option>
									<option> 3:30am-5:30am Friday </option>
									<option> 7:30am-12nn Saturday </option>
									<option> 9:30am-11:30am Sunday </option>
									</td>
									</tr>
									<td> </td>
									<td> <input type="submit" style="height:50px; width:140px" value="add subject" name="btnsubject" OnClick=" return confirm('Are you sure you want to add this Subject?')" onload="addsubject()"> 	
			
						</table>
						
				</form>
				
		<?php
			
			if (isset($_POST['btnsubject']))
				{	   
				include 'connection.php';
				
								$subjname=$_POST['subjname'] ;
								$subjcode= $_POST['subjcode'] ;					
								$timeday=$_POST['subjtimeday'] ;	
								$subject_num=$_POST['subjno'];
					 $insertsubj="INSERT INTO subjects(SubjectName,SubjectCode,TimeDay,Subject_Num) 
					 VALUES ('$subjname','$subjcode','$timeday','$subject_num')";
					 
					 	$result= mysql_query($insertsubj);	
						if($result)
						{
						echo "<script> alert('Subject has been Added') </script>";
						}	
						else
						{
						echo mysql_error($con);
						}
			mysql_close($con);				
			}
			
	 ?>
		</div>
	
		<div id="add-professor">

				<form action="admin.php" method="post" class="form">
									
						<table>
								<label class="txt-reg"> Add Professor </label>
								<tr>
									<td>Last Name</td>
									<td><input type="text" name="proflname" placeholder="professor's name.." required /></td>
								</tr>
								<tr>
									<td>First Name</td>
									<td><input type="text" name="proffname" placeholder="professor's firstname.." required/></td>
								</tr>
								<tr>
									<td>Contact Number</td>
									<td><input type="text" name="profcontact" placeholder="professor's contact.." required/></td>
								</tr>
								<tr>
									<td>Email Address</td>
									<td><input type="text" name="profemail" placeholder="professor's email.." required /></td>
								</tr>
								<tr>
									<td>Username (subject code)</td>
									<td><?php	
							include 'connection.php';
							$result = mysql_query("SELECT SubjectCode FROM subjects");

							$dropdown = "<form method='post'>"; 
							$dropdown .= "<select name='subject_code'>";

							while ($row = mysql_fetch_assoc($result)) {
							 $dropdown .= "\r\n <option value='{$row['SubjectCode']}'> {$row['SubjectCode']} </option>";
							}
							$dropdown .= "\r\n</select>";
							$dropdown .= "</form>"; 

							echo $dropdown; 
					?> </td>
								</tr>
								<tr>
									<td>Password</td>
									<td><input type="password" name="profpass" placeholder="professor's password.."/></td>
								</tr>
								<tr>
								<td> </td>
								<td> <input type="submit" style="height:50px; width:140px" value="add professor" name="btnprof" onclick=" return confirm('Are you sure you want to add this Professor?') "> </td>
								</tr>
								
						</table>
						
					<?php 
						if (isset($_POST['btnprof']))
						{
						include 'connection.php';
						
						$prof_lname=$_POST['proflname'];
						$prof_fname=$_POST['proffname'];
						$prof_contact=$_POST['profcontact'];
						$prof_email=$_POST['profemail'];
						$prof_user=$_POST['subject_code'];
						$prof_pass=$_POST['profpass'];
						
						
						$insertprof="INSERT INTO professor (Prof_lname,Prof_fname,Prof_contact,Prof_email,Prof_user,Prof_pass) 
						VALUES ('$prof_lname','$prof_fname','$prof_contact','$prof_email','$prof_user','$prof_pass')";
						
						$resultprof=mysql_query($insertprof);
						
						if ($insertprof)
						{
						echo "<script> alert ('Professor has been Added.') </script>";
						}
						{
						echo mysql_error($con);
						}
						
						}
				
						?>
						
				</form>
		</div> <!-- end of add professor-->
		
		</div> <!-- end of content-->
		
		</div> <!-- end of wrapper-->
		
	
		<div id="barline">
		<img src="Images/barline.jpg" class="barline">	
		</div>
		<div id="footer">
			<p class="footext"> Website by: Van Cabrera <br>
			&copy; 	All Rights Reserved</p>
			
		</div>	<!-- end of footer -->

</body>
</html>