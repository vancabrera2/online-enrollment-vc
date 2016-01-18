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
		
		</div> <!-- end of nav-box -->
		
		<div id="adminbox">
				
		<img src="images/student.jpg" class="adminimg">

		<ul class="ulstudent">
		<li> <input type="radio" onclick="enroll()" name="radio"/> Enroll Subject </input> </li>
		<li> <input type="radio" onclick="editaccount_student()" name="radio"/> Edit Account </input> </li>
		<li> <input type="radio" onclick="viewgrades()" name="radio"/> View Grades </input> </li>
		<li> <input type="radio" onclick="viewschedule()" name="radio"/> View Schedule </input> </li>
		</ul>
		
		</div>
	
	<div id="enroll-subject"  style="line-height:2em; overflow:auto; padding:5px;"> 
			<table border="1" class="table-oldstud"> 
							<label class="standardtxt"> <b> Available Subjects </b> </label>
									<tr> 
									<thead>
										<th> Subject Code </th>
										<th> Subject Name </th>
										<th> Time </th>
										<th> Day </th>
									</thead>
									</tr>
									
									<tr align="center">
										<td> WEBDES1 </td>
										<td> Web Designing 1 </td>
										<td> 9:30AM-11:30AM </td>
										<td> WW-Wednesday </td>
										<td> <a href="#"> Enroll </a> </td>
										<td> <a href="#"> Drop </td>
									</tr>
									
									<tr align="center">
									<td> Programming 2 </td>
									<td> WEBDES3 </td>
									<td> 9:30am-11:30am </td>
									<td> WW-Wednesday </td>
									<td> <a href="#"> Enroll </a> </td>
									<td> <a href="#"> Drop </td>
									</tr>
									
										<tr align="center">
									<td> Data Admin </td>
									<td> WEBDES3 </td>
									<td> 9:30am-11:30am </td>
									<td> WW-Wednesday </td>
									<td> <a href="#"> Enroll </a> </td>
										<td> <a href="#"> Drop </td>
									</tr>
									
										<tr align="center">
									<td> League of Legends </td>
									<td> WEBDES3 </td>
									<td> 9:30am-11:30am </td>
									<td> WW-Wednesday </td>
									<td> <a href="#"> Enroll </a> </td>
										<td> <a href="#"> Drop </td>
									</tr>
									
										<tr align="center">
									<td> Physics </td>
									<td> WEBDES3 </td>
									<td> 9:30am-11:30am </td>
									<td> WW-Wednesday </td>
									<td> <a href="#"> Enroll </a> </td>
										<td> <a href="#"> Drop </td>
									</tr>
									
										<tr align="center">
									<td> Physical Education 2 </td>
									<td> WEBDES3 </td>
									<td> 9:30am-11:30am </td>
									<td> WW-Wednesday </td>
									<td> <a href="#"> Enroll </a> </td>
										<td> <a href="#"> Drop </td>
									</tr>
									
						<?php
						/*include("connection.php");
						
							
						$result=mysql_query("SELECT * FROM stud_data");
						
						while($row = mysql_fetch_array($result)) 
						{
							$id=$row['StudentID'];
							$username = $row['Username'];	
							$password = $row['Password'];
							$firstname = $row['Firstname'];
						
							echo "<tr align='center'>";	
							echo"<td><font color='black'>" . $id ."</font></td>";
							echo"<td><font color='black'>" . $username ."</font></td>";
							echo"<td><font color='black'>" . $password ."</font></td>";
							echo"<td><font color='black'>". $firstname. "</font></td>";
							echo"<td> <a href ='view.php?StudentID=$id'>Enroll</a>"; 

												
							echo "</tr>";
						}
						mysql_close($con); */
						?>
							
			</table>
	</div> <!-- end of enroll -->
		
	<?php
			
				include "connection.php";

				$un=$_SESSION['sess_studold_id'];
				$result = mysql_query("SELECT * FROM student where StudentID='$un'") or die(mysql_error());
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
	<div id="edit-account">
			
			<table class="table-editstudent"> 
				<label class="txt-editstud"> <font size="5"> <b> Your Account </b> </font> </p> </label>
				<tr>
				<td> Your Firstname </td>
				<td> <input type="text" value="Van" name="fname" disabled > </td>
				</tr>
				<tr>
				<td> Your Lastname </td>
				<td> <input type="text" value="Cabrera" name="lname" disabled> </td>
				</tr>
				<tr>
				<td> Your Username </td>
					<td> <input type="text" value="vancabrera1" name="username" disabled> </td>
				</tr>
				<tr>
				<td> Your Course </td>
					<td> <input type="text" value="BSIT" name="course" disabled> </td>
				</tr>
				<tr>
				<td> Your Password </td>
				<td> <input type="password" name="changepass" 	> </td>
				</tr>
				
				<tr>
				<td> Confirm Password </td> 
				<td> <input type="text" name="changepass2"> </td>
				</tr>
				
				<tr>
				<td> <input type="submit" name="btnsavechange" value="save"> </td>
				</tr>
				
			</table>
	
	
		</div> <!--end of edit-studentold-->
		
		<div id="view-grades">
			
			<table border="1" class="table-oldstud">
					<label class="standardtxt"> <b> Your Grades </b> </label>
					<tr> 
					<th> Subject Name </th>
					<th> Subject Code </th>
					<th> Time </th>
					<th> Day </th>
					<th> Grade </th>
					</tr>
					
					<tr align="center">
					<td> WEB DESIGNING 3 </td>
					<td> WEBDES3 </td>
					<td> 9:30am-11:30am </td>
					<td> WW-Wednesday </td>
					<td> 4.0 Passed </td>
					</tr>		
			</table>
			
		</div>
		
		
		<div id="view-schedule">
		
			<table border="1" class="table-oldstud">
					<label class="standardtxt"> <b> Your Schedule </b> </label>
					<tr> 
					<th> Subject Name </th>
					<th> Subject Code </th>
					<th> Time </th>
					<th> Day </th>
					</tr>
					
					<tr align="center">
					<td> WEB DESIGNING 3 </td>
					<td> WEBDES3 </td>
					<td> 9:30am-11:30am </td>
					<td> WW-Wednesday </td>
					</tr>		
					
						<tr align="center">
					<td> Programming 2 </td>
					<td> WEBDES3 </td>
					<td> 9:30am-11:30am </td>
					<td> WW-Wednesday </td>
					</tr>
					
						<tr align="center">
					<td> Data Admin </td>
					<td> WEBDES3 </td>
					<td> 9:30am-11:30am </td>
					<td> WW-Wednesday </td>
					</tr>
					
						<tr align="center">
					<td> League of Legends </td>
					<td> WEBDES3 </td>
					<td> 9:30am-11:30am </td>
					<td> WW-Wednesday </td>
					</tr>
					
						<tr align="center">
					<td> Physics </td>
					<td> WEBDES3 </td>
					<td> 9:30am-11:30am </td>
					<td> WW-Wednesday </td>
					</tr>
					
						<tr align="center">
					<td> Physical Education 2 </td>
					<td> WEBDES3 </td>
					<td> 9:30am-11:30am </td>
					<td> WW-Wednesday </td>
					</tr>
			</table>
		
		</div> <!-- end of view-schedule-->
		
		
		</div> <!-- end of content-->
		
		
	</div> <!-- end of wrapper-->
	
		<div id="barline">
		<img src="Images/barline.jpg" class="barline">	
		</div>
		
		<div id="footer">
			<p class="footext"> Website by: Van Cabrera <br>
			&copy; 	All Rights Reserved</p>
			
		</div>	

</body>
</html>