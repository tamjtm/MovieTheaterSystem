<?php
	$conn = new mysqli("127.0.0.1", "root", "", "theater");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " .
		mysqli_connect_error();
	}
	$sql = "UPDATE Theater SET movieID = '".$_GET['movieID']."' WHERE theaterID = '" . $_GET['theaterID'] . "'";
	mysqli_query($conn,$sql);
	mysqli_close($conn);
?>