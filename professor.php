<?php
session_start();
ob_start();


if(!isset($_SESSION['user_prof']))
{
include 'not_login.php'; 
}
else{
$un_prof=$_SESSION['user_prof'];
$prof_id=$_SESSION['sess_prof_id'];
$prof_code=$_SESSION['sess_prof_user_code'];
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
			<a href='http://localhost/myproject2/professor.php'><img src="Images/Feulogo.png" class="feulogopic"></a>
			<p class="headtext"> Far Eastern University DILIMAN </p>
			<p class="loginas"> You are logged in as <strong> <?php echo $un_prof ?> </strong> <a href="logout.php"> (logout) </a>
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
				
		<img src="images/professor.jpg" class="adminimg">

		<ul class="ulstudent">
			<li> <input type="radio" onclick="search()" name="radio" /> Search Student </input> </li>
			<li> <input type="radio" onclick="give()" name="radio"/> Give Grades </input> </li>
			<li> <input type="radio" onclick="edit()" name="radio"/> Edit Account </input> </li>
		</ul>
		
		</div>
		
		
		<div id="search-stud">
		
				
				
				<form method="post" class="form">
									
					<table>
						<label class="txt-reg"> Search Student </label>
								<tr>
									<td>Enter Student Id</td>
									<td><input type="text" name='searchid' placeholder="Input student id "/></td>
								</tr>
								<tr>
									<td> <input type="submit" name="btnsearchstud" /> </td>
								</tr>
					</table>
		
							
					
	<?php
			if (isset($_POST['btnsearchstud']))
				{	   
					include 'connection.php'; 
					$search =$_POST['searchid'];										
					$search_query = mysql_query("SELECT * FROM student WHERE StudentID  = '$search'");
					
			if ($search_query) 
				{
					 
					 while($output = mysql_fetch_array($search_query)) 
						{
								$id=$output['StudentID'];
								$username=$output['Username'] ;				
								$firstname=$output['Firstname'] ;
								$lastname=$output['Lastname'] ;
								$address=$output['Address'] ;
								$year=$output['Year'] ;
								$gender=$output['Gender'] ;
								$course=$output['Course'] ;
						
	?>	
					<div id="table-result">				
					<table border="1" class="table-search">
						<label class="txtsearch"> <font size="5"> <b> Search result: </b> </font>		
			
							<tr>
								<th> Student ID </th>
								<th> Username </th>
								<th> FirstName </th>
								<th> LastName </th>
								<th> Address </th>
								<th> Year </th>
								<th> Gender </th>
								<th> Course </th>
								<th> Subject </th>
								</tr>
			
		
								
								<tr align="center">
								<td> <?php echo $id; ?> </td>
								<td> <?php echo $username; ?> </td>
								<td> <?php echo $firstname; ?> </td>
								<td> <?php echo $lastname; ?> </td>
								<td> <?php echo $address; ?> </td>
								<td> <?php echo $year; ?> </td>
								<td> <?php echo $gender; ?> </td>		
								<td> <?php echo $course; ?> </td>
								<td> Subject </td>
								</tr>
				</table>
					</div> 
	<?php	
						
				}
				}
				else
					{
			echo "<h3>No Record found</h3>";
				}
					mysql_close($con);	
			}
				
	?>
					
				</form>
		</div> <!-- end of search-->
		
		

		<div id="give-grade" style="line-height:2em; overflow:auto; padding:5px;">
		
			
									
					<table border="1" class="table-givegrade">
						<label class="standardtxt">  Grading System  </label>
								<tr>
								<thead>
								<th> Student ID </th>
								<th> Last Name </th>
								<th> Quiz 1 </th>
								<th> MIDTERMS </th>
								<th> Quiz 2 </th>
								<th> PROJECT </th>
								<th> Finals </th>
								<th> Grade </th>
								<th> GPA (0-4) </th>
								<th> Verdict </th>
								</thead>
								</tr>
	
						<?php

					include("connection.php");
					
						$result=mysql_query("SELECT * FROM student WHERE Subject1='$prof_code' OR Subject2='$prof_code' OR Subject3='$prof_code' OR Subject4='$prof_code' OR Subject5='$prof_code' OR Subject6='$prof_code'" );
						
						while($row = mysql_fetch_array($result)) 
						{	
							echo '<form method="POST">';
							$id=$row['StudentID'];
							$ln = $row['Lastname'];	
							///
							
							$q1=$row['q1'];
							$mt=$row['mt'];
							$q2=$row['q2'];
							$proj=$row['proj'];
							$finals=$row['finals'];
							$grade=$row['FG'];
							$gpa=$row['gpa'];
							$verdict=$row['verdict'];
							
							
							echo "<tr align='center'>";	
							echo "<td><font color='black'>" . $id ."</font></td>";
							echo "<td><font color='black'>" . $ln ."</font></td>";
							echo "<td> <input type='text' value='$q1' size='1' placeholder='15' disabled/> </td>";
							echo "<td> <input type='text' value='$mt' size='1' placeholder='25' disabled /> </td>"; 
							echo	"<td> <input type='text' value='$q2' size='1' placeholder='15' disabled/> </td>";
							echo	"<td> <input type='text' value='$proj' size='1' placeholder='20' disabled/> </td>";
							echo	"<td> <input type='text' value='$finals' size='1' placeholder='25' disabled/> </td>";
							echo	"<td> <input type='text' value='$grade' name='grade' size='1'placeholder='grade' disabled /> </td>";
							echo	"<td> <input type='text' value='$gpa' size='1' placeholder='gpa' disabled /> </td>";
							echo	"<td> <input type='text' value='$verdict' size='2'  disabled  /> </td>";
							//echo 	"<td> <input type='submit' name='submit' value='submit'> </td>";
							echo "<td> <a href='prof_editgrade.php?StudentID=$id'>EDIT</a> </td>";
								echo "</tr>";
							echo '</form>';
									
							
						}
						mysql_close($con);

		?>
					</table>
					
		<?php					

			if(isset($_POST['save']))	
			{	
				$q1=$_POST['quiz1'];
				$mt=$_POST['midterms'];
				
				$grade=$q1+$mt;
				
				mysql_query("UPDATE student SET Grade ='$grade' WHERE StudentID = '$id'")
							or die(mysql_error()); 
				echo "Saved!";
				header('Location:http://localhost/myproject2/professor.php');
			}
		?>		
			
		</div> <!-- end of give grade-->
		
	<div id="edit-accountprof">
	
					<?php
			
			include "connection.php";

				$id=$_SESSION['sess_prof_id'];
				$result = mysql_query("SELECT * FROM professor where ProfessorID='$id'") or die(mysql_error());
				$row = mysql_fetch_array($result);
				if (!$result) 
						{
						die("Error: Data not found..");
						}
								$un=$row['Prof_user'];
								$fn=$row['Prof_fname'];
								$ln=$row['Prof_lname'];
								


				if(isset($_POST['save_pass_admin']))
				{	
					$pass_save = $_POST['changepass1'];
					$pass2=$_POST['changepass2'];
					
					if ( $pass_save == $pass2 )
					{
					mysql_query("UPDATE professor SET Prof_pass ='$pass_save'")
								or die(mysql_error()); 
					echo "<script> alert('Password has been change.') </script>";
					}
					else
					{
					echo "<script> alert('Password mismatch.') </script>";
					}
					}

					mysql_close($con);
?>
			
			
		<form method="post" class="editform">
			<table>
					<label class="txt-edit"> <font size="5"> <b> Edit Account </b> </font> </label>
						<tr>
							<td>Username</td>
							<td><input type="text" name="uname" value="<?php echo $un ?>" disabled /> </td>
						</tr>
						
						<tr>
							<td>FirstName</td>
							<td><input type="text" name="fname" value="<?php echo $fn ?>" disabled /></td>
						</tr>
						
						<tr>
							<td>LastName</td>
							<td><input type="text" name="lname" value="<?php echo $ln ?>" disabled /></td>
						</tr>

						<tr>
							<td>New Password</td>
							<td><input id="password1" type="password" name="changepass1" placeholder='enter new password..' /></td>
						</tr>
						<tr>
						
							<td>Confirm Password</td>
							<td><input id="password2" type="password" name="changepass2"  placeholder='re-enter new password..'/></td>
						
						</tr>
						
						<tr>
						<td> </td>	
						<td><input type="submit" name="save_pass_admin" value="save" /></td>
							</tr>
							
				</form> 
								
			</table>
	
	
	</div> <!-- end of edit accunt -->
	
	
		</div> <!-- end of content-->
		
		
	</div> <!-- end of wrapper-->
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