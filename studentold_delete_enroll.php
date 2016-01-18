<?php
session_start();
ob_start();
include 'connection.php';
	
	//$id =$_REQUEST['studold_id'];
	$studold_id=$_SESSION['sess_studold_id'];
	$s_code=$_SESSION['Subj1'];
	mysql_query("Delete from student2 WHERE StudentID='$studold_id' AND Subject1='$s_code'")or die (mysql_error());


?>