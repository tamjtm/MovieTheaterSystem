<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	
	$conn = new mysqli("127.0.0.1", "root", "", "Theater");
	mysqli_query($conn,"SET NAMES UTF8");
	
	$result = $conn->query("SELECT * FROM Theater WHERE theaterID = '" . $_GET['theaterID'] . "'");
	
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "[") {$outp .= ",";}
		$outp .= '{"branchName":"'  . $rs["BranchName"] . '",';
		$outp .= '"regSeat":'   . $rs["RegSeat"]        . ',';
		$outp .= '"vipSeat":'   . $rs["VipSeat"]        . ',';
		$outp .= '"theaterNo":"'   . $rs["TheaterNo"]        . '",';
		$outp .= '"theaterType":"'   . $rs["TheaterType"]        . '"}'; 
	}
	$outp .="]";
	
	$conn->close();
	
	echo($outp);
?>