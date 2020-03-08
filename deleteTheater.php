<?php	
	$conn = new mysqli("127.0.0.1", "root", "", "theater");
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " .
	mysqli_connect_error();
	}
	
		
	// <<<< GET BranchName >>>>
	$result = $conn->query("SELECT * FROM Theater WHERE theaterID = '" . $_GET['theaterID'] . "'");
	$rs = $result->fetch_array(MYSQLI_ASSOC);
	$branchName = $rs["BranchName"];
	
		// <<<< DELETE Seat >>>>
	if(!mysqli_query($conn,"DELETE FROM sseat WHERE theaterID = '" . $_GET['theaterID'] . "'")){
		die('Error: ' . mysqli_error($conn));
		}
	
	// <<<< DELETE Showtime >>>>
	if(!mysqli_query($conn,"DELETE FROM Showtime WHERE theaterID = '" . $_GET['theaterID'] . "'")){
		die('Error: ' . mysqli_error($conn));
		}
	
	// <<<< DELETE Theater >>>>
	if(!mysqli_query($conn,"DELETE FROM Theater WHERE theaterID = '" . $_GET['theaterID'] . "'")){
		die('Error: ' . mysqli_error($conn));
		}
	else echo $_GET['theaterID'] . ' is deleted!';
	
	// <<<< UPDATE TheaterAmount >>>>
	mysqli_query($conn,"UPDATE Branch SET theaterAmount = (SELECT COUNT(*) FROM theater WHERE branchName = '$branchName' GROUP BY branchName) WHERE branchName = '$branchName'");
	

	
		
	mysqli_close($conn);
?>