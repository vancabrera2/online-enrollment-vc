<?php
require("connection.php");
$id=$_REQUEST['StudentID']; 
$result = mysql_query("SELECT * FROM student WHERE StudentID  = '$id'");
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$fn=$row['Firstname'];
				$ln=$row['Lastname'];
				$q1_tbl=$row['q1'];
				$mt_tbl=$row['mt'];
				$q2_tbl=$row['q2'];
				$proj_tbl=$row['proj'];
				$final_tbl=$row['finals'];
				$FG_tbl=$row['FG'];				

if(isset($_POST['save']))
{	

	$q1_save = $_POST['q1'];
	$mt_save = $_POST['mt'];
	$q2_save = $_POST['q2'];	
	$proj_save = $_POST['proj'];
	$finals_save = $_POST['finals'];
	
	$update=mysql_query("UPDATE student SET q1 ='$q1_save', mt ='$mt_save',
		 q2 ='$q2_save',proj ='$proj_save',finals ='$finals_save'WHERE StudentID = '$id'")
				or die(mysql_error());
				
$result = mysql_query("SELECT * FROM student WHERE StudentID  = '$id'");		
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
				$q1_tbl=$row['q1'];
				$mt_tbl=$row['mt'];
				$q2_tbl=$row['q2'];
				$proj_tbl=$row['proj'];
				$final_tbl=$row['finals'];
				$FG_tbl=$row['FG'];		
		
	if($update)
		{
		$compute=(($q1_tbl*0.15)+($mt_tbl*0.25)+($q2_tbl*0.15)+($proj_tbl*.20)+($final_tbl*0.25));	
		
	if ($compute < 70){
			
		mysql_query("UPDATE student SET  gpa = '0' , verdict='failed', FG ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professor.php');
	}
	
	if ($compute > 70){
			
		mysql_query("UPDATE student SET gpa = '4', verdict='passed', FG ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professor.php');				
	}
		mysql_close($con);
	
		}
		}
		


?>


<html>
<head>
<title>Untitled Document</title>
<link rel="stylesheet" href="CSS/style.css">
</head>

<body>
<form method="post">

<div align='center'>
<fieldset class='fs_editgrade_prof'>
<legend> <font size='4'> Student Name: <b><?php echo $fn ?> <?php echo $ln ?> </b></font></legend> 
<table border='1' class='table_editgrade_prof'>

		
	<tr>
		<th>Quiz1</th>
		<td><input type="text" name="q1" value="<?php echo $q1_tbl ?>"/></td>
	</tr>
	<tr>
		<th>Midterms</th>
		<td><input type="text" name="mt" value="<?php echo $mt_tbl ?>"/></td>
	</tr>
	<tr>
		<th>Quiz2</th>
		<td><input type="text" name="q2" value="<?php echo $q2_tbl ?>"/></td>
	</tr>
	<tr>
		<th>Project</th>
		<td><input type="text" name="proj" value="<?php echo $proj_tbl ?>"/></td>
	</tr>	
	<tr>
		<th>Finals</th>
		<td><input type="text" name="finals" value="<?php echo $final_tbl ?>"/></td>
	</tr>
	<tr>
		<th>Total Grade</th>
		<td><input type="text" name="total_grade" value="<?php echo $FG_tbl ?>" disabled /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="submit" name="save" value="save" /></td>
	</tr>
</table>
</fieldset>
</div>
</body>
</html>