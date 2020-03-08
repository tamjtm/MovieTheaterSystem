<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	$conn = new mysqli("127.0.0.1", "root", "", "Theater");
	mysqli_query($conn,"SET NAMES UTF8");
	
	
	if($_GET['view'] == 'movie'){
			$result = $conn->query("SELECT * FROM showtime s, movie m WHERE s.theaterID = '" . $_GET['theaterID'] . "' AND s.movieID = m.movieID AND s.movieID = (SELECT MovieID FROM theater WHERE TheaterID = '" . $_GET['theaterID'] . "') ORDER BY s.date, s.time");
		}
		else if($_GET['view'] == 'none'){
			$result = $conn->query("SELECT * FROM showtime s, movie m WHERE s.theaterID = '" . $_GET['theaterID'] . "' AND s.movieID = m.movieID ORDER BY s.date , s.time");
		}
		else if($_GET['view'] == 'date'){
			$result = $conn->query("SELECT * FROM showtime s, movie m WHERE s.theaterID = '" . $_GET['theaterID'] . "' AND s.MovieID = m.MovieID  AND s.date = CURDATE() ORDER BY m.releaseDate DESC");
		}

	
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "[") {$outp .= ",";}
		$outp .= '{"showtimeID":"'  . $rs["ShowTimeID"] . '",';
		$outp .= '"movieID":"'  . $rs["MovieID"] . '",';
		$outp .= '"movieName":"'  . $rs["MovieName"] . '",';
		$outp .= '"length":"'  . $rs["Length"] . '",';
		$outp .= '"language":"'  . $rs["Language"] . '",';
		$outp .= '"releaseDate":"'  . $rs["ReleaseDate"] . '",';
		$outp .= '"endDate":"'  . $rs["endDate"] . '",';
		$outp .= '"soundtrack":"'   . $rs["Soundtrack"]  . '",';
		$outp .= '"subtitle":"'   . $rs["Subtitle"]        . '",';
		$outp .= '"theaterID":"'   . $rs["TheaterID"]        . '",';
		$outp .= '"date":"'   . $rs["Date"]        . '",';
		$outp .= '"time":"'   . $rs["Time"]        . '",';
		$outp .= '"seatRemaining":"'. $rs["SeatRemaining"]     . '"}';
	}
	$outp .="]";
	
	$conn->close();
	
	echo($outp);
?>