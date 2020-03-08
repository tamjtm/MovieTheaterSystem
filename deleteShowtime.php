<?php	
	$conn = new mysqli("127.0.0.1", "root", "", "theater");
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " .
	mysqli_connect_error();
	}
	
	// <<<< DELETE Showtime >>>>
	if(!mysqli_query($conn,"DELETE FROM Showtime WHERE showtimeID='".$_GET['showtimeID']."'")){
		die('Error: ' . mysqli_error($conn));
		}
	else echo $_GET['showtimeID'] . ' is deleted!';
	
	// <<<< DELETE Seat >>>>
	if(!mysqli_query($conn,"DELETE FROM sseat WHERE showtimeID='".$_GET['showtimeID']."'")){
		die('Error: ' . mysqli_error($conn));
		}
	
	mysqli_close($conn);
?>