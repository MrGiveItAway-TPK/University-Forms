<?php
$con = mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'universityforms');
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Deny</title>
	<link href="../css/all.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div align="center"> 	
		<form action="" method="post">
			<textarea rows = "10" cols = "100" name = "comment" placeholder="Please Specify The Reason Of Approval/Rejection" required></textarea><br>
			<input type="submit" name="sub">
		</form>
	</div>
</body>
</html>
<?php 
if (isset($_POST['sub'])) {
	$comment=$_POST['comment'];
	$result = mysqli_query($con, "UPDATE forms SET hodstatus='Denied' WHERE id = $id");
	$result2 = mysqli_query($con, "UPDATE forms SET hodreason='$comment' WHERE id = $id");
	header("Location:adminhome.php");
}
?>
