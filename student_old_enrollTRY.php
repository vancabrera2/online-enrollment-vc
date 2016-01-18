<?php
ob_start();
session_start();

$subj_id =$_REQUEST['SubjectID'];	
$subj1=$_SESSION['Subj1'];
include 'connection.php';

$get_subj = mysql_query("SELECT * FROM subjects WHERE SubjectID  = '$subj_id'");
$row_get_subj = mysql_fetch_array($get_subj);
if (!$get_subj) 
		{
		die("Error: Data not found..");
		}
		
			echo $subj1;
			echo $subj_id;
							$s_name=$row_get_subj['SubjectName'];
							$s_code = $row_get_subj['SubjectCode'];	
							$Timeday = $row_get_subj['TimeDay'];	
							$s_num=$row_get_subj['Subject_Num'];
		if ($s_num == 'Subject1')
		{
		
				 $insertsubj="INSERT INTO student_enroll(Subject1) 
					 VALUES ('$s_code')";
	 
			$result= mysql_query($insertsubj);	
					header('Location: http://localhost/myproject2/studentold2.php');
			
			}		
		
		
		else if ($s_num == 'Subject2')
		{
		$insertsubj="INSERT INTO student_enroll(Subject2) 
					 VALUES ('$s_code')";
						header('Location: http://localhost/myproject2/studentold2.php');
		}
		
		else if ($s_num == 'Subject3')
		{
		$insertsubj="INSERT INTO student_enroll(Subject3) 
					 VALUES ('$s_code')";
						header('Location: http://localhost/myproject2/studentold2.php');
		}
		
		else if ($s_num == 'Subject4')
		{
		$insertsubj="INSERT INTO student_enroll(Subject4) 
					 VALUES ('$s_code')";
						header('Location: http://localhost/myproject2/studentold2.php');
		}
		
		else if ($s_num == 'Subject5')
		{
		$insertsubj="INSERT INTO student_enroll(Subject5) 
					 VALUES ('$s_code')";
						header('Location: http://localhost/myproject2/studentold2.php');
		}
		
		else if ($s_num == 'Subject6')
		{
		$insertsubj="INSERT INTO student_enroll(Subject6) 
					 VALUES ('$s_code')";
						header('Location: http://localhost/myproject2/studentold2.php');
		}
?>