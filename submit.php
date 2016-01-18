<?php
session_start();
include 'connection.php';

$id =$_REQUEST['StudentID'];

$q1=$_SESSION['q1'];
$mt=$_SESSION['mt'];
$q2=$_SESSION['q2'];
$project=$_SESSION['proj'];
$finals=$_SESSION['finals'];


$ans= ($q1+$mt+$q2+$project+$finals);
$insert="INSERT INTO student(Grade) VALUES('$ans')";
	$result=mysql_query($insert);

				if($result)
				{
				echo "Grade added success.";
				}
				else
				{
				echo mysql_error($con);
				}
				

mysql_close($con);
?>