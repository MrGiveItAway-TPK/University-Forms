<?php
require 'adminmodal.php';
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
$stmt = $con->prepare('SELECT Name,Level FROM admins WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($Name,$Level);
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
		<link href=".//css/all.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="view" align="center">
			<h5 align="center">Pending Forms</h5>
			<form action="" method="post">
				<select name="studentlist">
					<option value="0">Select Student Number</option>
					<?php
					if($Level=='Advisor') {
						$db = mysqli_connect("localhost", "root", "", "universityforms");
						$res = mysqli_query($db, "SELECT DISTINCT acnumber FROM forms WHERE adstatus='Pending'");
						while($row = mysqli_fetch_array($res)) {
							echo("<option value='".$row['acnumber']."'>".$row['acnumber']."</option>");
						}	
					}
                  	  	if($Level=='HOD') {
                  	  		$db2 = mysqli_connect("localhost", "root", "", "universityforms");
                  	  		$res2 = mysqli_query($db2, "SELECT DISTINCT acnumber FROM forms WHERE hodstatus='Pending'");
                  	  		while($row = mysqli_fetch_array($res2)) {
                  	  			echo("<option value='".$row['acnumber']."'>".$row['acnumber']."</option>");
                  	  		}
                  	  	}
					?>					
				</select>
				<input type="submit" name="student" value="View Submitted Forms" />
			</form>
		</div>
			<div class="tableviewforms" align="center">
				<table>
					<?php
					$con = mysqli_connect("localhost","root","");
					$db=mysqli_select_db($con,'universityforms');
					if (isset($_POST['student'])) {
                  	 $stnumber = $_POST['studentlist'];
                  	 echo "<tr><th>Name</th><th>Academic Number</th><th>Specialization</th><th>Type</th><th>Advisor Status</th><th>HOD Status</th><th>Details</th><th>Print</th></tr>";
                  	 if($Level=='Advisor') {
                  	 	$query ="SELECT id,name,acnumber,specialization,phnumber,subject,description,type,adstatus,hodstatus FROM forms WHERE acnumber=$stnumber && adstatus='Pending'";
                  	 }
                  	 if($Level=='HOD') {
                  	 	$query ="SELECT id,name,acnumber,specialization,phnumber,subject,description,type,adstatus,hodstatus FROM forms WHERE acnumber=$stnumber && hodstatus='Pending'";
                  	 }
                  	 $sql = mysqli_query($con,$query);
                  	  while ($row= mysqli_fetch_array($sql)) {
                  	  	echo "<tr><td>".$row['name']."</td><td>".$row['acnumber']."</td><td>".$row['specialization']."</td><td>".$row["type"]."</td><td>".$row["adstatus"]."</td><td>".$row["hodstatus"]."</td>";
                  	  	echo'<td><a href="#" id='.$row["id"].' id2='.$Level.' class=view_details>View Details</a></td>';
                  	  	echo'<td><a href="../print.php?id='.$row["id"].'">Preview</a></td></tr>';
                  	  	
                  	  }
                  	}
                  	?>
                  </table>
              </div>
          </body>
          </html>