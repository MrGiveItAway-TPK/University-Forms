<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'universityforms';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$name=$_POST['Name'];
$acnumber=$_POST['AcademicNumber'];
$specialization=$_POST['Specialization'];
$phnumber=$_POST['PhoneNumber'];
$subject=$_POST['Subject'];
$description=$_POST['Description'];
$type=$_POST['Type'];
$adstatus=$_POST['Status'];
$hodstatus=$_POST['Status'];
$cnumber=$_POST['CourseNumber'];
$cname=$_POST['CourseName'];
$cdnumber=$_POST['CourseDNumber'];
$reqhours=$_POST['reqhours'];
$gpa=$_POST['gpa'];
$expecY=$_POST['expecY'];

if ($type == 'Call Up') {
	$sql_send="INSERT INTO forms (name,acnumber,specialization,phnumber,subject,description,type,adstatus,hodstatus) VALUES ('$name','$acnumber','$specialization','$phnumber','$subject','$description','$type','$adstatus','$hodstatus')";
}
if ($type == 'Closed Divion') {
	$sql_send="INSERT INTO forms (name,acnumber,specialization,phnumber,coursenumber,coursename,coursednumber,type,adstatus,hodstatus) VALUES ('$name','$acnumber','$specialization','$phnumber','$cnumber','$cname','$cdnumber','$type','$adstatus','$hodstatus')";
}
if ($type == 'Overload') {
	$sql_send="INSERT INTO forms (name,acnumber,specialization,phnumber,reqhours,gpa,expecY,description,type,adstatus,hodstatus) VALUES ('$name','$acnumber','$specialization','$phnumber','$reqhours','$gpa','$expecY','$description','$type','$adstatus','$hodstatus')";
}

$sql=mysqli_query($con,$sql_send);
echo '<script>alert("Submitted Succesfully");window.location.href = "home.php";</script>';
?>