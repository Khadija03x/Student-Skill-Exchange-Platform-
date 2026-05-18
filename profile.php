<?php

session_start();

include "db.php";

if(!isset($_SESSION['id']))
{
	header("location:login.php");
}

$id=$_SESSION['id'];

$sql="SELECT * FROM users WHERE id='$id'";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

	<title>Profile</title>

	<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">
	 <img class="logo" src="https://cdn-icons-png.flaticon.com/512/3135/3135755.png">
	<h2>My Profile</h2>

	<p><b>Name:</b>
	<?php echo $row['name']; ?>
	</p>

	<p><b>Email:</b>
	<?php echo $row['email']; ?>
	</p>

	<p><b>Department:</b>
	<?php echo $row['department']; ?>
	</p>

	<a href="dashboard.php">
		<button>Back</button>
	</a>

</div>

</body>

</html>