<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	$conn = mysqli_connect("127.0.0.1", "root", "", "Theater");
	mysqli_query($conn,"SET NAMES UTF8");
	
	$result = mysqli_query($conn,"SELECT * FROM Movie WHERE movieID = '" . $_GET['movieID'] . "'");
	
	$outp = "[";
	while($rs = mysqli_fetch_array($result)) {
		if ($outp != "[") {$outp .= ",";}
		$outp .= '{"movieID":"'  . $rs["MovieID"] . '",';
		$outp .= '"movieName":"'   . $rs["MovieName"]        . '",';
		$outp .= '"length":"'   . $rs["Length"]        . '",';
		$outp .= '"genre":"'   . $rs["Genre"]        . '",';
		$outp .= '"language":"'   . $rs["Language"]        . '",';
		$outp .= '"releaseDate":"'   . $rs["ReleaseDate"]        . '",';
		$outp .= '"endDate":"'   . $rs["endDate"]        . '",';
		$outp .= '"rate":"'. $rs["Rate"]     . '"}'; 
	}
	$outp .="]";
	
	mysqli_close($conn);
	
	echo $outp;
?>