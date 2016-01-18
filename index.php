<?php
	session_start();
	ob_start(); 
	if (isset($_POST['login'])){
	
		include 'connection.php';
	
		$uname=$_POST['un']; 
		$pass=$_POST['pw']; 
		
		$query = mysql_query("SELECT * FROM admin WHERE Password='$pass' AND Username='$uname'")or die(mysql_error());
		
		$rows = mysql_num_rows($query);
		
		if ($rows == 1) {
		$row = mysql_fetch_array($query); 
		$_SESSION['user_admin'] = $row['Username'];
		header("location:admin.php");
		}
		
		
		/* prof */
		$query2 = mysql_query("SELECT * FROM professor WHERE Prof_pass='$pass' AND Prof_user='$uname'")or die(mysql_error());
		$rows2 = mysql_num_rows($query2);
		if ($rows2 == 1){
		$row = mysql_fetch_array($query2); 
		$_SESSION['sess_prof_user_code']=$row['Prof_user'];
		$_SESSION['user_prof'] = $row['Prof_fname'];
		$_SESSION['sess_prof_id']= $row['ProfessorID'];
		header("location:professor.php");
		}
		
		
		/* stud old and new */
		$query3 = mysql_query("SELECT * FROM student2 WHERE StudentID='$uname' AND Password='$pass'")or die (mysql_error());
		$row=mysql_fetch_array($query3);
		$status=$row['status'];
		$rows3= mysql_num_rows($query3);
		echo $status;
		if ($rows3 == 1)
		{
		
			if ($status == "new")
			{
				$_SESSION['user_studnew']=$row['Firstname'];
				$_SESSION['sess_studnew_id']= $row['StudentID'];
				header("location:studentnew.php");
			}else
		
			if ($status == "old")
				{
					$_SESSION['user_studold']=$row['Firstname'];
					$_SESSION['sess_studold_id']= $row['StudentID'];
					header("location:studentold2.php");
				
				}
		}
		else
		{
		echo "<script> alert('Wrong Username or Password'); </script>";
		}
		}
	
	
?>

<html>
<head>
<title> Home | Online Enrollment </title>
<link rel="stylesheet" href="CSS/style.css">
<script type="text/javascript" src="Javascript/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>

<div id="wrapper">
	

	
	<div id="content">
	
		<div id="header">
			<a href="http://localhost/myproject2/index.php"><img src="Images/Feulogo.png" class="feulogopic"></a>
			<p class="headtext"> Far Eastern University DILIMAN </p>
			<p class="loginas"> You are not login. <a href="#"> (login) </a>
			
		<div id="headnav">
		<ul>
			<li class="fb"> <a href="https://www.facebook.com/FEUdiliman"> <img src="Images/fblogo.png"> </a></li>
			<li class="twit"> <a href="https://twitter.com/FEUdiliman"> <img src="Images/twitlogo.png"> </a></li>
		</ul>

		</div> <!-- end of headnav-->
		
	
		</div> <!-- end of header-->
		
		<div id="nav-box">	
		
		<ul class="ul-index">
		<li class="home"> <a href="index.php"> HOME </a> </li>
		<li> <a href="about.php"> ABOUT </a> </li>
		<li> <a href="academics.php"> ACADEMICS </a> </li>
		<li> <a href="contact.php"> CONTACT US </a> </li>
		</ul>
		
		</div>
		
		<div id="login">
		<p> <strong> <font size="10"> User Portal </font> </strong> </p>
		<img src="Images/login.jpg" class="loginC">
		
		<form method="post" class="loginForm">
		<table>
		
		<tr>
		<td> Username </td>
		<td> <input type="text" name='un'> </td>
		</tr>
		
		<tr>
		<td> Password </td>
		<td><input type="password" name='pw'> </td>
		</tr>
		
		<tr>
		<td><input type="submit" name='login' value='login'> </td>
		</tr>
		
		</table>
		</form>
		
		</div> <!-- end of login-->
		
		<div id="gym">
		<img src="Images/gym.jpg" width="600px" height="300px" class="gymright"> 
		</div>
		
		<div id="tamlogoright">
			<img src="Images/tamlogo.png" class="tamlogo">
			<p> FEU DILIMAN </p>
	<marquee behavior="alternate" bgcolor="white" loop="-1" width="91%" class="marqueetxt"> Welcome Tamaraws! </marquee>
		</div>
		 
		 <div id="paraindex">
		 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin feugiat dignissim viverra. Nullam quis dapibus sem. Vivamus placerat ipsum at lacus sollicitudin volutpat. Vivamus tempus sodales fringilla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut ut posuere mauris, sed rutrum eros. Cras tempor nec sapien vitae vehicula. Integer venenatis molestie volutpat. Sed commodo nunc laoreet, molestie erat ut, porta libero. Donec justo risus, bibendum et leo nec, fermentum rutru
			Vivamus placerat ipsum at lacus sollicitudin volutpat. Vivamus tempus sodales fringilla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut ut posuere mauris, sed rutrum eros. Cras tempor nec sapien vitae vehicula. Integer venenatis molestie volutpat. Sed commodo nunc laoreet, molestie erat ut, porta libero. Donec justo risus, bibendum et leo nec, fermentum rutru 
		
		<br> <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin feugiat dignissim viverra. Nullam quis dapibus sem. Vivamus placerat ipsum at lacus sollicitudin volutpat. Vivamus tempus sodales fringilla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut ut posuere mauris, sed rutrum eros. Cras tempor nec sapien vitae vehicula. Integer venenatis molestie volutpat. Sed commodo nunc laoreet, molestie erat ut, porta libero. Donec justo risus, bibendum et leo nec, fermentum rutru
			Vivamus placerat ipsum at lacus sollicitudin volutpat. Vivamus tempus sodales fringilla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut ut posuere mauris, sed rutrum eros. Cras tempor nec sapien vitae vehicula. Integer venenatis molestie volutpat. Sed commodo nunc laoreet, molestie erat ut, porta libero. Donec justo risus, bibendum et leo nec, fermentum rutru </p>
			
		 </div>
		 
		 
	</div> <!-- end of content-->
			
		<div id="barline">
		<p class="loginasfoot"> You are not login. <a href="#"> (login) </a>
		<img src="Images/barline.jpg" class="barline">
		
					
		</div>	
		
		<div id="footer">
			<p class="footext"> Website by: Van Cabrera <br>
			&copy; 	All Rights Reserved</p>
			
		</div>	
</div>


</body>
</html>