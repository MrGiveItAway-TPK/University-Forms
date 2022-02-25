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
$stmt = $con->prepare('SELECT Name FROM students WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($Name);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<script src="https://kit.fontawesome.com/ed238fd5b8.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<link href="css/all.css" rel="stylesheet" type="text/css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Philadelphia University Forms</h1>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user"></i>Profile</a>
				<a href="myforms.php"><i class="fas fa-university"></i>My Forms</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				<a style="color: white">Pending Forms: 
					<?php
					$db = mysqli_connect("localhost", "root", "", "universityforms");
					$res = mysqli_query($db, "SELECT id FROM forms WHERE name='$Name' && (adstatus='Pending' || hodstatus='Pending')");
					$counter = 0;
					while($row = mysqli_fetch_array($res)) {
						$counter++;
					}
					echo $counter;
					?>
					</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome, <?=$Name?></p>
		</div>
	</body>
</html>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PUOJ</title>
		<link href="css/all.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="content">
			<h2>Forms</h2>
			<p>
					<tr>
						<td><a style="text-decoration:none" href="forms/callup.php">Call up Form</a></td>
					</tr>
				</p>
				<p>
					<tr>
						<td><a style="text-decoration:none" href="forms/closeddivison.php">Applying For A Closed Divison</a></td>
					</tr>
				</p>
				<p>
					<tr>
						<td><a style="text-decoration:none" href="forms/overload.php">Approval Of Overloading Study-Hours</a></td>
					</tr>
				</p>
		</div>
	</body>
</html>
