<?php
require_once "dbconnection.php"; // Ensures dbconnection.php is included

// Check if connection is established
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Airlines Code</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			font-family: Century Gothic;
		}
		ul {
			float: right;
			list-style-type: none;
			margin-top: 25px;
		}
		ul li {
			display: inline-block;
		}
		ul li a {
			text-decoration: none;
			color: #fff;
			padding: 5px 20px;
			border: 1px solid #fff;
			transition: 0.6s ease;
		}
		ul li a:hover {
			background-color: #fff;
			color: #000;
		}
		ul li.active a {
			background-color: #fff;
			color: #000;
		}
		.title {
			position: absolute;
			top: 15%;
			left: 40%;
		}
		.title h1 {
			color: #fff;
			font-size: 70px;
		}
		body {
			background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(Images/sunset.jpg);
			height: 100vh;
			background-size: cover;
			background-position: center;
		}
		table.a {
			position: absolute;
			top: 27%;
			left: 37%;
			border: 1px solid #fff;
			padding: 10px 30px;
			color: #fff;
			font-size: 25px;
		}
	</style>
</head>
<body>
	<div class="main">
		<ul>
			<li class="active"><a href="#">Airlines Code</a></li>
			<li><a href="admin_form.html">Add Flights</a></li>
			<li><a href="homepage.html">Home</a></li>
		</ul>
	</div>
	<div class="title">
		<h1>Airlines ID</h1>
	</div>
	<table class="a">
		<tr>
			<th>Airlines ID&emsp;</th>
			<th>Airlines Name&emsp;</th>
		</tr>
		<?php
			$query = mysqli_query($conn, "SELECT * FROM airline"); // Use $conn instead of $con
			if (!$query) {
				die("Query failed: " . mysqli_error($conn));
			}
			while ($rows = mysqli_fetch_assoc($query)) {
		?>
				<tr>
					<td><?php echo $rows['AIRLINE_ID']; ?></td>
					<td><?php echo $rows['AIRLINE_NAME']; ?></td>
				</tr>
		<?php	
			}
		?>
	</table>
</body>
</html>
