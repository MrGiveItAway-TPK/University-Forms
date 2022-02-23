<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'universityforms';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT Level, password, Name,specialization,phnumber FROM admins WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($Level, $password, $Name,$specialization,$phnumber);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<script src="https://kit.fontawesome.com/ed238fd5b8.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<link href="../css/all.css" rel="stylesheet" type="text/css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Philadelphia University Forms</h1>
				<a href="adminhome.php"><i class="fas fa-home"></i>Home</a>
				<a href="adminprofile.php"><i class="fas fa-user"></i>Profile</a>
				<a href="adminallforms.php"><i class="fas fa-university"></i>All Forms</a>
				<a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				<a><i class="fas fa-bell"> 
					<?php
					if($Level=='Advisor') {
						$db = mysqli_connect("localhost", "root", "", "universityforms");
						$res = mysqli_query($db, "SELECT id FROM forms WHERE adstatus='Pending'");
						$counter = 0;
						while($row = mysqli_fetch_array($res)) {
							$counter++;
						}
						echo $counter;
					}
					if($Level=='HOD') {
						$db2 = mysqli_connect("localhost", "root", "", "universityforms");
						$res2 = mysqli_query($db2, "SELECT id FROM forms WHERE hodstatus='Pending'");
						$counter = 0;
						while($row = mysqli_fetch_array($res2)) {
							$counter++;
						}
						echo $counter;
					}
					?>
					</i>
					</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Full Name:</td>
						<td><?=$Name?></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Clearance:</td>
						<td><?=$Level?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Specialization:</td>
						<td><?=$specialization?></td>
					</tr>
					<tr>
						<td>Phone Number:</td>
						<td><?=$phnumber?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>