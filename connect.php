<?php
$servername="localhost";
$username="root";
$password="";
$database_name="issuelist";

$conn=mysqli_connect($servername,$username,$password,$database_name);
//Setting up connection:
if(!$conn)
{
	die("Connection Failed: ".mysqli_connect_error());
}
if(isset($_POST['submit']))
{
	$deptname = $_POST['deptname'];
	$cptname= $_POST['cptname'];
	$roomno= $_POST['roomno'];
	$email = $_POST['email'];
	$dates = $_POST['dates'];
	$depts = $_POST['depts'];
	$lists=$_POST['lists'];
	$technician='Not Yet';
	$status="New";
	$sql_query="INSERT INTO issuelist(deptname, cptname, roomno, email, dates, depts, issue, technician, status) VALUES ('$deptname', '$cptname', '$roomno','$email', '$dates', '$depts', '$lists','$technician', '$status')";
	if(mysqli_query($conn,$sql_query))
	{
		include "submission.html";
	}
	else
	{
		echo "Error: ";
	}
	mysqli_close($conn);
	// Formspree:
	$formspreeUrl = 'https://formspree.io/f/mdoqokro';
	$ch = curl_init($formspreeUrl);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	// Handle the Formspree response if needed
	exit();
}
?>
