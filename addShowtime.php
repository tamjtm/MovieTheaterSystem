<?php
		$con = mysqli_connect("localhost","root","","theater");
		
		if(mysqli_connect_errno()){
		echo "Failed to connect to MySQL:" . mysqli_connect_error();
		}
		
		$theaterID = mysqli_real_escape_string($con, $_GET['theaterID']);
		$theaterType = mysqli_real_escape_string($con, $_GET['theaterType']);
		$movieID = mysqli_real_escape_string($con, $_GET['movieID']);
		$date = mysqli_real_escape_string($con, $_GET['date']);
		$idTime = mysqli_real_escape_string($con, $_GET['time']);
		$soundtrack = mysqli_real_escape_string($con, $_GET['soundtrack']);
		$subtitle = mysqli_real_escape_string($con, $_GET['subtitle']);
		$showtimeID = '$theaterID$idTime$date[3]$date[5]$date[6]$date[8]$date[9]';
		
		if($idTime == 1)
		{
			$time = '10:00';
		}
		else if($idTime == 2)
		{
			$time = '12:30';
		}
		else if($idTime == 3)
		{
			$time = '15:00';
		}
		else if($idTime == 4)
		{
			$time = '17:30';
		}
		else if($idTime == 5)
		{
			$time = '20:00';
		}
		
		$sql = "INSERT INTO Showtime (showtimeID, movieID, soundtrack, subtitle, theaterID, date, time, seatRemaining)
			VALUES ('$theaterID$idTime$date[3]$date[5]$date[6]$date[8]$date[9]', '$movieID', '$soundtrack', '$subtitle', '$theaterID', '$date', '$time', 84)";		
		mysqli_query($con, $sql);
		
		// <<<< SEAT GENERATOR >>>>
			for($i='A'; $i<='G'; $i++)
				for($j='01'; $j<='12'; $j++)
				{
					$seat = $i . sprintf("%02d", $j);
										
					if($theaterType == '3D'){
						if($i >= 'A' && $i <= 'E') $price = '3dReg';
						else $price = '3dVIP';
					}
					else if($theaterType == '4DX'){
						if($i >= 'A' && $i <= 'E') $price = '4dxReg';
						else $price = '4dxVIP';
					}
					else if($theaterType == 'Digital'){
						if($i >= 'A' && $i <= 'E') $price = 'DigiReg';
						else $price = 'DigiVIP';
					}
										
					if(!mysqli_query($con, "INSERT INTO sseat (seatNo, theaterID, priceID, time, showtimeID) VALUES ('$seat', '$theaterID', '$price', '$time', '$theaterID$idTime$date[3]$date[5]$date[6]$date[8]$date[9]')")) die('Error: ' . mysqli_error($con));
				}
		
		mysqli_close($con);
		
?>
<script>
	goBack();
	
	function goBack(){
		var url = location.protocol + '//' + location.host+"/editTheater.php?theaterID=<?php echo $_GET['theaterID']; ?>";
		location.href = url;
	}
</script>