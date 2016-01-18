<?php
include 'connection.php';
	
	$id =$_REQUEST['StudentID'];

	$update=mysql_query("Update student SET Password = 'Password' WHERE StudentID='$id'")or die (mysql_error());
	header('Location:http://localhost/myproject2/admin.php');
	
?>