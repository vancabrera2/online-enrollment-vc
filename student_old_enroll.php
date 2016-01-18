<?php
ob_start();
session_start();

$subj_id =$_REQUEST['SubjectID'];
$studold_id=$_SESSION['sess_studold_id'];		
include 'connection.php';
	
$get_subj = mysql_query("SELECT * FROM subjects WHERE SubjectID  = '$subj_id'");
$row_get_subj = mysql_fetch_array($get_subj);
if (!$get_subj) 
		{
		die("Error: Data not found..");
		}
							$s_name=$row_get_subj['SubjectName'];
							$s_code = $row_get_subj['SubjectCode'];	
							$Timeday = $row_get_subj['TimeDay'];	
							$s_num=$row_get_subj['Subject_Num'];
		if ($s_num == 'Subject1')
		{
		mysql_query("UPDATE student2 SET Subject1='$s_code' WHERE StudentID = '$studold_id'")
				or die(mysql_error());
					header('Location: http://localhost/myproject2/studentold2.php');
		}
		else if ($s_num == 'Subject2')
		{
		mysql_query("UPDATE student2 SET Subject2='$s_code' WHERE StudentID = '$studold_id'")
				or die(mysql_error());
						header('Location: http://localhost/myproject2/studentold2.php');
		}
		else if ($s_num == 'Subject3')
		{
		mysql_query("UPDATE student2 SET Subject3='$s_code' WHERE StudentID = '$studold_id'")
				or die(mysql_error());
						header('Location: http://localhost/myproject2/studentold2.php');
		}
		else if ($s_num == 'Subject4')
		{
		mysql_query("UPDATE student2 SET Subject4='$s_code' WHERE StudentID = '$studold_id'")
				or die(mysql_error());
						header('Location: http://localhost/myproject2/studentold2.php');
		}
		else if ($s_num == 'Subject5')
		{
		mysql_query("UPDATE student2 SET Subject5='$s_code' WHERE StudentID = '$studold_id'")
				or die(mysql_error());
						header('Location: http://localhost/myproject2/studentold2.php');
		}
		else if ($s_num == 'Subject6')
		{
		mysql_query("UPDATE student2 SET Subject6='$s_code' WHERE StudentID = '$studold_id'")
				or die(mysql_error());
						header('Location: http://localhost/myproject2/studentold2.php');
		}
?>