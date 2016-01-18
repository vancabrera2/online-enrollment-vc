<html>
<head>
<title> Van's Project </title>
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<div id="wrapper">
	

	
	<div id="content">
	
		<div id="header">
			<a href="http://localhost/myproject2/index.php"><img src="Images/Feulogo.png" class="feulogopic"></a>
			<p class="headtext"> Far Eastern University DILIMAN </p>
			<p class="loginas"> You are not login. <a href="http://localhost/myproject2/index.php"> (login) </a>
			
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
		
		<div id="contactcontent">
		
		
		<form method="post" class="contactform">
		<p> <b> <font size="6"> CONTACT FORM </font> </b></p>
		<table>
		
		<td> <label> YOUR NAME </label> </td>
		<tr>
		<td> <input type="text" name='name' size="40" placeholder="Input your name here..."> </td>
		</tr>
		
		<td> <label> YOUR EMAIL ADDRESS </label> </td>
		<tr>
		<td> <input type="text" name='email' size="40" placeholder="youraddress@email.com"> </td>
		</tr>
		
		<td> <label> YOUR CONTACT NUMBER </label> </td>
		<tr>
		<td> <input type="text" name='contact' size="40" placeholder="Your contact number here"> </td>
		</tr>
		
		<td> <label> YOUR MESSAGE </label> </td>
		<tr>
		<td> <textarea rows="4" cols="50" placeholder="Your message here.." name='message'	></textarea> </td>
		</tr>
		
		<tr>
		<td> <input type="submit" value="Submit" name="submit"> </td>
		</tr>
		
		</table>
		
		 <?php
		 if (isset($_POST['submit']))
		 {
			include 'connection.php';
			$_name=$_POST['name'];
			$_email=$_POST['email'];
			$_contact=$_POST['contact'];
			$_msgs=$_POST['message'];
		 
			$insert="INSERT INTO contact(Name,Email,Contact,Message) VALUES ('$_name','$_email','$_contact','$_msgs')";
			$result=mysql_query($insert);
			
			if ($result)
			{
			echo "<script> alert ('Thank you for your message') </script>";
			}
			else
			{
			echo mysql_error($con);
			}
	
		 
		 mysql_close($con);
		 	 }
		 ?>	
		

		</form>
		 
		 </div>
		
		 <div id="contactright">
		 	 <label class="righttxtconta"> CONTACT US! </label>

			<label> <strong> <font size="5"> Contact Person </font> </strong> </label>
			<p> <font size="3"> Mr James Catayas </font> </p>

			<label> <strong> <font size="5">Contact Number </font></strong> </label>
			<p> <font size="3"> +63(2) 931 6064 (College)  </font> </p>
			
			<label> <strong> <font size="5">School Address </font></strong> </label>
			<p> <font size="3"> Sampaguita Avenue, 
								Mapayapa Village, <br>
								Diliman, Quezon City 1101, 
								Philippines  </font> </p>
			
			<label> <strong> <font size="5">School Email </font></strong> </label>
			<p> <font size="3"> FEUdiliman@tamaraws.ph </font> </p>
		 </div>
		 
		 
		 <div id="contactleft">
		 <ul class="internet">
		 <p class='socialtxt'> <font size="6"> Social Networking Sites </font></p>
		 <li> <b> LIKE US: </b><a href="#"> www.facebook.com/FEUdiliman </a> </li>
		 <li> <b> TWEET US: </b><a href="#"> www.twitter.com/FEUdiliman </a> </li>
		 <li> <b> VISIT US: </b><a href="#"> www.feudiliman.edu.ph </a> </li>
		 <ul>
		 </div>
		 
		 <img src="Images/contactimg.png" class="contactimg"> 
		 
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