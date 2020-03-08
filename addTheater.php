<?php
		$con = mysqli_connect("localhost","root","","theater");
		
		if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL:" . mysqli_connect_error();
		}
		
		$branchName = mysqli_real_escape_string($con, $_GET['branchName']);
		$theaterNo = mysqli_real_escape_string($con, $_GET['theaterNo']);
		$theaterType = mysqli_real_escape_string($con, $_GET['theaterType']);
		
		$sql = "INSERT INTO Theater (theaterID, branchName, theaterNo, theaterType, movieID, regSeat, vipSeat) VALUES ('$branchName[0]$branchName[1]$theaterNo', '$branchName', '$theaterNo', '$theaterType', NULL, 60, 24)";
			
		//mysqli_query($con, $sql)
		if(!mysqli_query($con, $sql)) die('Error: ' . mysqli_error($con));
		
		;
		// <<<< UPDATE TheaterAmount >>>>
		mysqli_query($con,"UPDATE Branch SET theaterAmount = (SELECT COUNT(*) FROM theater WHERE branchName = '$branchName' GROUP BY branchName) WHERE branchName = '$branchName'");
		
				
		mysqli_close($con);
		//echo 'ok! >>> ' . $count;
?>
<script>
	goBack();
	function goBack(){
		var url = location.protocol + '//' + location.host+"/ttbranch.php?branchName=<?php echo $_GET['branchName']; ?>";
		location.href = url;
	}
</script>