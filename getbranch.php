<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	$conn = new mysqli("127.0.0.1", "root", "", "Theater");
	mysqli_query($conn,"SET NAMES UTF8");
	
	$result = $conn->query("SELECT * FROM (SELECT t.branchName AS branchName, theaterAmount, theaterID, theaterNo, theaterType, regSeat, vipSeat, movieID FROM Branch b, Theater t WHERE t.branchName = '" . $_GET['branchName']. "' AND b.branchName = t.branchName) tt LEFT JOIN Movie m ON tt.movieID = m.movieID ORDER BY theaterNo");
	
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "[") {$outp .= ",";}
		$outp .= '{"branchName":"'  . $rs["branchName"] . '",';
		$outp .= '"theaterAmount":"'   . $rs["theaterAmount"]  . '",';
		$outp .= '"theaterNo":"'   . $rs["theaterNo"]        . '",';
		$outp .= '"theaterType":"'   . $rs["theaterType"]        . '",';
		$outp .= '"regSeat":"'   . $rs["regSeat"]        . '",';
		$outp .= '"vipSeat":"'   . $rs["vipSeat"]        . '",';
		$outp .= '"theaterID":"'. $rs["theaterID"]     . '",'; 
		$outp .= '"movieName":"'   . $rs["MovieName"]        . '"}';
	}
	$outp .="]";
	
	$conn->close();
	
	echo($outp);
?>