<?php
session_start();
require("connection.php");

$id=$_REQUEST['StudentID']; 
$prof_code_editgrade=$_SESSION['sess_prof_user_code'];

$get_name = mysql_query("SELECT * FROM student2 WHERE StudentID  = '$id'");
$row_get_name = mysql_fetch_array($get_name);
if (!$get_name) 
		{
		die("Error: Data not found..");
		}
				$fn=$row_get_name['Firstname'];
				$ln=$row_get_name['Lastname'];
				$s_name1=$row_get_name['Subject1'];
				$s_name2=$row_get_name['Subject2'];
				$s_name3=$row_get_name['Subject3'];
				$s_name4=$row_get_name['Subject4'];
				$s_name5=$row_get_name['Subject5'];
				$s_name6=$row_get_name['Subject6'];

						
$query1 = mysql_query("SELECT * FROM student2 WHERE Subject1='$prof_code_editgrade'")or die(mysql_error());
						$rows1 = mysql_num_rows($query1);
if ($rows1 == 1){						
$result = mysql_query("SELECT * FROM subject1_grade");
$row = mysql_fetch_array($result);  //WHERE StudentID  = '$id'
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
$stud_id=$row['StudentID'];		
				
if (empty($stud_id))	
{
	$insert_id="INSERT INTO subject1_grade(StudentID,Firstname,LastName,SubjectName) 
					 VALUES ('$id','$fn','$ln','$s_name1')";
					 
				$result_insert_id=mysql_query($insert_id);

}

				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];				
				$gpa_tbl=$row['GPA'];				
				$verdict_tbl=$row['Verdict'];				
				
if(isset($_POST['save']))
{	

	$q1_save = $_POST['q1'];
	$mt_save = $_POST['mt'];
	$q2_save = $_POST['q2'];	
	$proj_save = $_POST['proj'];
	$finals_save = $_POST['finals'];
	
	$update=mysql_query("UPDATE subject1_grade SET Quiz1 ='$q1_save', Midterms ='$mt_save',
		 Quiz2 ='$q2_save',Project ='$proj_save',Finals ='$finals_save'WHERE StudentID = '$id'")
				or die(mysql_error());
				
$result = mysql_query("SELECT * FROM subject1_grade WHERE StudentID  = '$id'");		
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];		
		
	if($update)
		{
		$compute=(($q1_tbl*0.15)+($mt_tbl*0.25)+($q2_tbl*0.15)+($proj_tbl*.20)+($final_tbl*0.25));	
		
	if ($compute < 70){
			
		mysql_query("UPDATE subject1_grade SET  GPA = '0' , Verdict='failed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');
	}
	
	if ($compute == 70){
			
		mysql_query("UPDATE subject1_grade SET GPA = '1', Verdict='passed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');				
	}
	
	if ($compute == 75){
			
		mysql_query("UPDATE subject1_grade SET GPA = '1', Verdict='passed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');				
	}
}	
		mysql_close($con);
	
		}
		}
/// subj 2

$query2 = mysql_query("SELECT * FROM student2 WHERE Subject2='$prof_code_editgrade'")or die(mysql_error());
						$rows2 = mysql_num_rows($query2);
if ($rows2 == 1){						
$result = mysql_query("SELECT * FROM subject2_grade");
$row = mysql_fetch_array($result);  //WHERE StudentID  = '$id'
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
$stud_id=$row['StudentID'];		
				
if (empty($stud_id))	
{
	$insert_id="INSERT INTO subject2_grade(StudentID,Firstname,LastName,SubjectName) 
					 VALUES ('$id','$fn','$ln','$s_name2')";
					 
				$result_insert_id=mysql_query($insert_id);

				/*if($result_insert_id)
				{
				echo "<h3>Id added.</h3>";
				}
				else
				{
				echo mysql_error($con);
				}*/
}

				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];				
				$gpa_tbl=$row['GPA'];				
				$verdict_tbl=$row['Verdict'];				
				
if(isset($_POST['save']))
{	

	$q1_save = $_POST['q1'];
	$mt_save = $_POST['mt'];
	$q2_save = $_POST['q2'];	
	$proj_save = $_POST['proj'];
	$finals_save = $_POST['finals'];
	
	$update=mysql_query("UPDATE subject2_grade SET Quiz1 ='$q1_save', Midterms ='$mt_save',
		 Quiz2 ='$q2_save',Project ='$proj_save',Finals ='$finals_save'WHERE StudentID = '$id'")
				or die(mysql_error());
				
$result = mysql_query("SELECT * FROM subject2_grade WHERE StudentID  = '$id'");		
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];		
		
	if($update)
		{
		$compute=(($q1_tbl*0.15)+($mt_tbl*0.25)+($q2_tbl*0.15)+($proj_tbl*.20)+($final_tbl*0.25));	
		
	if ($compute < 70){
			
		mysql_query("UPDATE subject2_grade SET  GPA = '0' , Verdict='failed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');
	}
	
	if ($compute > 70){
			
		mysql_query("UPDATE subject2_grade SET GPA = '4', Verdict='passed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');				
	}
}	
		mysql_close($con);
	
		}
		}
///subj 3

$query3 = mysql_query("SELECT * FROM student2 WHERE Subject3='$prof_code_editgrade'")or die(mysql_error());
						$rows3 = mysql_num_rows($query3);
if ($rows3 == 1){						
$result = mysql_query("SELECT * FROM subject3_grade");
$row = mysql_fetch_array($result);  //WHERE StudentID  = '$id'
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
$stud_id=$row['StudentID'];		
				
if (empty($stud_id))	
{
	$insert_id="INSERT INTO subject3_grade(StudentID,Firstname,LastName,SubjectName) 
					 VALUES ('$id','$fn','$ln','$s_name3')";
					 
				$result_insert_id=mysql_query($insert_id);

				/*if($result_insert_id)
				{
				echo "<h3>Id added.</h3>";
				}
				else
				{
				echo mysql_error($con);
				}*/
}

				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];				
				$gpa_tbl=$row['GPA'];				
				$verdict_tbl=$row['Verdict'];				
				
if(isset($_POST['save']))
{	

	$q1_save = $_POST['q1'];
	$mt_save = $_POST['mt'];
	$q2_save = $_POST['q2'];	
	$proj_save = $_POST['proj'];
	$finals_save = $_POST['finals'];
	
	$update=mysql_query("UPDATE subject3_grade SET Quiz1 ='$q1_save', Midterms ='$mt_save',
		 Quiz2 ='$q2_save',Project ='$proj_save',Finals ='$finals_save'WHERE StudentID = '$id'")
				or die(mysql_error());
				
$result = mysql_query("SELECT * FROM subject3_grade WHERE StudentID  = '$id'");		
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];		
		
	if($update)
		{
		$compute=(($q1_tbl*0.15)+($mt_tbl*0.25)+($q2_tbl*0.15)+($proj_tbl*.20)+($final_tbl*0.25));	
		
	if ($compute < 70){
			
		mysql_query("UPDATE subject3_grade SET  GPA = '0' , Verdict='failed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');
	}
	
	if ($compute > 70){
			
		mysql_query("UPDATE subject3_grade SET GPA = '4', Verdict='passed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');				
	}
}	
		mysql_close($con);
	
		}
		}
////subj 4

$query4 = mysql_query("SELECT * FROM student2 WHERE Subject4='$prof_code_editgrade'")or die(mysql_error());
						$rows4 = mysql_num_rows($query4);
if ($rows4 == 1){						
$result = mysql_query("SELECT * FROM subject4_grade");
$row = mysql_fetch_array($result);  //WHERE StudentID  = '$id'
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
$stud_id=$row['StudentID'];		
				
if (empty($stud_id))	
{
	$insert_id="INSERT INTO subject4_grade(StudentID,Firstname,LastName,SubjectName) 
					 VALUES ('$id','$fn','$ln','$s_name4')";
					 
				$result_insert_id=mysql_query($insert_id);

				/*if($result_insert_id)
				{
				echo "<h3>Id added.</h3>";
				}
				else
				{
				echo mysql_error($con);
				}*/
}

				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];				
				$gpa_tbl=$row['GPA'];				
				$verdict_tbl=$row['Verdict'];				
				
if(isset($_POST['save']))
{	

	$q1_save = $_POST['q1'];
	$mt_save = $_POST['mt'];
	$q2_save = $_POST['q2'];	
	$proj_save = $_POST['proj'];
	$finals_save = $_POST['finals'];
	
	$update=mysql_query("UPDATE subject4_grade SET Quiz1 ='$q1_save', Midterms ='$mt_save',
		 Quiz2 ='$q2_save',Project ='$proj_save',Finals ='$finals_save'WHERE StudentID = '$id'")
				or die(mysql_error());
				
$result = mysql_query("SELECT * FROM subject4_grade WHERE StudentID  = '$id'");		
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];		
		
	if($update)
		{
		$compute=(($q1_tbl*0.15)+($mt_tbl*0.25)+($q2_tbl*0.15)+($proj_tbl*.20)+($final_tbl*0.25));	
		
	if ($compute < 70){
			
		mysql_query("UPDATE subject4_grade SET  GPA = '0' , Verdict='failed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');
	}
	
	if ($compute == 70){
			
		mysql_query("UPDATE subject4_grade SET GPA = '4', Verdict='passed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');				
	}
}	
		mysql_close($con);
	
		}
		}
//// subj 5

$query5 = mysql_query("SELECT * FROM student2 WHERE Subject5='$prof_code_editgrade'")or die(mysql_error());
						$rows5 = mysql_num_rows($query5);
if ($rows5 == 1){						
$result = mysql_query("SELECT * FROM subject5_grade");
$row = mysql_fetch_array($result);  //WHERE StudentID  = '$id'
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
$stud_id=$row['StudentID'];		
				
if (empty($stud_id))	
{
	$insert_id="INSERT INTO subject5_grade(StudentID,Firstname,LastName,SubjectName) 
					 VALUES ('$id','$fn','$ln','$s_name5')";
					 
				$result_insert_id=mysql_query($insert_id);

				/*if($result_insert_id)
				{
				echo "<h3>Id added.</h3>";
				}
				else
				{
				echo mysql_error($con);
				}*/
}

				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];				
				$gpa_tbl=$row['GPA'];				
				$verdict_tbl=$row['Verdict'];				
				
if(isset($_POST['save']))
{	

	$q1_save = $_POST['q1'];
	$mt_save = $_POST['mt'];
	$q2_save = $_POST['q2'];	
	$proj_save = $_POST['proj'];
	$finals_save = $_POST['finals'];
	
	$update=mysql_query("UPDATE subject4_grade SET Quiz1 ='$q1_save', Midterms ='$mt_save',
		 Quiz2 ='$q2_save',Project ='$proj_save',Finals ='$finals_save'WHERE StudentID = '$id'")
				or die(mysql_error());
				
$result = mysql_query("SELECT * FROM subject4_grade WHERE StudentID  = '$id'");		
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];		
		
	if($update)
		{
		$compute=(($q1_tbl*0.15)+($mt_tbl*0.25)+($q2_tbl*0.15)+($proj_tbl*.20)+($final_tbl*0.25));	
		
	if ($compute < 70){
			
		mysql_query("UPDATE subject4_grade SET  GPA = '0' , Verdict='failed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');
	}
	
	if ($compute == 70){
			
		mysql_query("UPDATE subject4_grade SET GPA = '4', Verdict='passed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');				
	}
}	
		mysql_close($con);
	
		}
		}		
//// subj 6

$query6 = mysql_query("SELECT * FROM student2 WHERE Subject6='$prof_code_editgrade'")or die(mysql_error());
						$rows6 = mysql_num_rows($query6);
if ($rows6 == 1){						
$result = mysql_query("SELECT * FROM subject6_grade");
$row = mysql_fetch_array($result);  //WHERE StudentID  = '$id'
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
$stud_id=$row['StudentID'];		
				
if (empty($stud_id))	
{
	$insert_id="INSERT INTO subject6_grade(StudentID,Firstname,LastName,SubjectName) 
					 VALUES ('$id','$fn','$ln','$s_name6')";
					 
				$result_insert_id=mysql_query($insert_id);

				/*if($result_insert_id)
				{
				echo "<h3>Id added.</h3>";
				}
				else
				{
				echo mysql_error($con);
				}*/
}

				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];				
				$gpa_tbl=$row['GPA'];				
				$verdict_tbl=$row['Verdict'];				
				
if(isset($_POST['save']))
{	

	$q1_save = $_POST['q1'];
	$mt_save = $_POST['mt'];
	$q2_save = $_POST['q2'];	
	$proj_save = $_POST['proj'];
	$finals_save = $_POST['finals'];
	
	$update=mysql_query("UPDATE subject4_grade SET Quiz1 ='$q1_save', Midterms ='$mt_save',
		 Quiz2 ='$q2_save',Project ='$proj_save',Finals ='$finals_save'WHERE StudentID = '$id'")
				or die(mysql_error());
				
$result = mysql_query("SELECT * FROM subject4_grade WHERE StudentID  = '$id'");		
$row = mysql_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
		
				$q1_tbl=$row['Quiz1'];
				$mt_tbl=$row['Midterms'];
				$q2_tbl=$row['Quiz2'];
				$proj_tbl=$row['Project'];
				$final_tbl=$row['Finals'];
				$FG_tbl=$row['Grade'];		
		
	if($update)
		{
		$compute=(($q1_tbl*0.15)+($mt_tbl*0.25)+($q2_tbl*0.15)+($proj_tbl*.20)+($final_tbl*0.25));	
		
	if ($compute < 70){
			
		mysql_query("UPDATE subject4_grade SET  GPA = '0' , Verdict='failed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');
	}
	
	if ($compute == 70){
			
		mysql_query("UPDATE subject4_grade SET GPA = '4', Verdict='passed', Grade ='$compute' WHERE StudentID = '$id'")
				or die(mysql_error());
				
					header('Location: http://localhost/myproject2/professortry.php');				
	}
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