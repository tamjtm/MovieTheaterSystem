<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_GET['theaterID']?></title>
</head>

<body>
	<?php 
		$con = mysqli_connect("localhost", "root", "", "theater");
		mysqli_query($con,"SET NAMES UTF8");
		//check connection
		if(mysqli_connect_errno()){
			echo "Failed to connect to mySQL: " . mysqli_connect_error();
		}
		
		$result = mysqli_query($con, "SELECT * FROM (SELECT * FROM Theater WHERE theaterID ='" . $_GET['theaterID'] . "') t LEFT JOIN Movie m ON t.movieID = m.movieID");
		$row = mysqli_fetch_array($result);
		
		$theaterType = $row['TheaterType'];
		$theaterID = $row['TheaterID'];
		$movieID = $row['MovieID'];
		
		mysqli_close($con);
	?>
	<center><h1><?php echo $_GET['theaterID']?></h1></center>
    
    
    
    <!-- ---------- THEATHER & SEAT ---------- -->
    <h2>Details</h2>
    <div id="theater"></div>
    
    
    
    <!-- ---------- MOVIE ---------- -->
    <h2>Now Showing</h2>
    <form action = "/editTheater.php" method = "get">
        <table style="width: 60%; margin-left: 20%;">
                <tr>
                    <td>Movie Name: <select name="movieID" onChange="editMovie(this)">
                        <option value="<?php echo $row['MovieID']; ?>" selected disabled hidden><?php
                            if($row['MovieID'] == NULL){
                                echo "...Choose a movie...";
                            }
                            else{
                                echo $row['MovieName'];
                            }?></option>
                        <?php 
                            $con = mysqli_connect("localhost", "root", "", "theater");	
							mysqli_query($con,"SET NAMES UTF8");
                            
                            //check connection
                            if(mysqli_connect_errno()){
                                echo "Failed to connect to mySQL: " . mysqli_connect_error();
                            }
                            
                            $result = mysqli_query($con, "SELECT * FROM Movie WHERE CURDATE() BETWEEN releaseDate AND endDate");
                
                            // fetch array
                            while($opt = mysqli_fetch_array($result)){
                                echo '<option value="' . $opt['MovieID'] . '">' . $opt['MovieName'] . '</option>';
                            }
                            mysqli_close($con);
                        ?>
                        </select>
                        </td>
                        </tr>
       		</table>
        </form>       
        <div id="movie"></div>
        
        <!-- ---------- SHOWTIME ---------- -->
    	<br><br><center><h2>Showtimes</h2></center>
        <div id="showtime"><center>...empty...</center><br>
        <center><input type="button" value="Back" onclick="goBack()"></center></div>
    
       
    
    
    
    
    <!-- ---------- JAVA SCRIPT ZONE ---------- -->
    <script>
	showTheater();	
	showMovie('<?php echo $row['MovieID']; ?>');
	showShowtime('[]');
	
	
	// ---------- CHANGE VIEW ----------
	function changeView(view){
		if(view.value == 'movie'){
			document.getElementById("showtime").innerHTML = 'Movie';
		}
		else if(view.value == 'date'){
			document.getElementById("showtime").innerHTML = 'Date';	
		}
		else if(view.value == 'none'){
			document.getElementById("showtime").innerHTML = 'None';	
		}
	}
	
	
	
	
	
	// ++++++++++ THEATER ++++++++++
	function showTheater(){
		var xmlhttp = new XMLHttpRequest();
		var url = location.protocol + '//' + location.host+"/getTheater.php?theaterID=<?php echo $_GET['theaterID'] ?>";
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				theaterResponse(xmlhttp.responseText);
			}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	
	function theaterResponse(response) {
		var arr = JSON.parse(response);
		var totalSeat = arr[0].vipSeat+arr[0].regSeat;
		var out = '<table style="width: 60%; margin-left: 20%;"><tr><td>Branch Name: '+ arr[0].branchName +'</td><td>Theater Number: '+ arr[0].theaterNo +'</td><td  colspan="2">Total Seat: '+ totalSeat +'</td></td></tr><tr><td td  colspan="2">Theater Type: '+ arr[0].theaterType +'</td><td>Regular Seat: '+ arr[0].regSeat +'</td><td>VIP Seat: '+ arr[0].vipSeat +'</td></tr></table>';
	
		document.getElementById("theater").innerHTML = out;
	}
	
	
	// ++++++++++ MOVIE ++++++++++
	function showMovie(movieID){
		var xmlhttp = new XMLHttpRequest();
		var url = location.protocol + '//' + location.host+"/getMovie.php?movieID="+movieID;
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				movieResponse(xmlhttp.responseText);
			}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	
	function movieResponse(response) {
		var arr = JSON.parse(response);
		var out = '<table style="width: 60%; margin-left: 20%;"><tr><td>Length: '+ arr[0].length +'</td><td>Rate: '+ arr[0].rate +'</td></tr><tr><td>Genre: '+ arr[0].genre +'</td><td>Language: '+ arr[0].language +'</td></tr><tr><td>Released Date: '+ arr[0].releaseDate +'</td><td>Expired Date: '+ arr[0].endDate +'</td></tr></table>';
	
		document.getElementById("movie").innerHTML = out;
		arr = JSON.stringify(arr);
		showShowtime(arr);
	}
	
	function editMovie(movieID){
		var xmlhttp = new XMLHttpRequest();
		var url = location.protocol + '//' + location.host+"/editMovie.php?theaterID="+'<?php echo $_GET['theaterID']?>'+"&movieID="+movieID.value;
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				showMovie(movieID.value);
			}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	
	
	// ++++++++++ SHOWTIME ++++++++++
	function showShowtime(arr){
		var xmlhttp = new XMLHttpRequest();
		var url = location.protocol + '//' + location.host+"/getShowtime.php?theaterID=<?php echo $_GET['theaterID'] ?>&view=none";
		var out = '';
		
		arr = JSON.parse(arr);
		arr2 = JSON.stringify(arr);
		xmlhttp.onreadystatechange=function() {

		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {				
    	    	if(xmlhttp.responseText == '[]'){
					out += '<center>...empty...</center><form action="/addShowtime.php" method="get"><table style="width: 60%; margin-left: 20%;"><tr><td><br><h4>Add Showtime:</h4></td><td><input name="movieID" value="'+ arr[0].movieID +'" readonly hidden><input name="theaterID" value="<?php echo $theaterID; ?>" readonly hidden><input name="theaterType" value="<?php echo $theaterType; ?>" readonly hidden></td></tr><tr><td>Movie<br><input value="'+ arr[0].movieName +'" disabled></td><td>Date <br><input type="date" name="date" min="<?php echo date("Y-m-d"); ?>" max="'+ arr[0].endDate +'" required></td><td>Time <br><select name="time" required><option value="" selected disabled hidden>hh:mm</option><option value="1">10:00</option><option value="2">12:30</option><option value="3">15:00</option><option value="4">17:30</option><option value="5">20:00</option></select></td>';
					if(arr[0].language != 'Thai'){
						out += '<td>Soundtrack<br><input type="radio" name="soundtrack" value="'+ arr[0].language +'" required> '+ arr[0].language +'<input type="radio" name="soundtrack" value="Thai"> Thai</td><td>Subtitle<br><input type="radio" name="subtitle" value="Thai" required> Thai  <input type="radio" name="subtitle" value="--" > None</td>';
					}
					else{
						out += '<td>Soundtrack<br><input type="radio" name="soundtrack" value="Thai" readonly checked> Thai</td><td>Subtitle<br><input type="radio" name="subtitle" value="English" required> English  <input type="radio" name="subtitle" value="--" > None</td>';
					}
					
					out += '</tr></table><br><center><input type="submit" value="Add Showtime"></form> <input type="button" value="Back" onclick="goBack()"></center>';
					
					document.getElementById("showtime").innerHTML = out;
				}
				else showtimeResponse(xmlhttp.responseText, arr2);	
	    	}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	
	function showtimeResponse(response, arr) {
		var brr = JSON.parse(response);
		var i;
		var out = '<table style="width: 60%; margin-left: 20%;"><tr><td><h3>Movie</h3></td><td><h3>Date</h3></td><td><h3>Time</h3></td><td><h3>Soundtrack</h3></td><td><h3>Subtitle</h3></td></tr>';
		arr = JSON.parse(arr);
	
	
		for(i = 0; i < brr.length; i++) {
			out += "<tr><td>" + 
			brr[i].movieName +
			"</td><td>" +
			brr[i].date +
			"</td><td>" +
			brr[i].time+
			"</td><td>" +
			brr[i].soundtrack +
			"</td><td>" +
			brr[i].subtitle +
			"</td><td>" +
			"<button onclick=\"deleteShowtime('"+brr[i].showtimeID+"')\">Delete</button>" +
			"</td></tr>";
		}
		out += '</table><form action="/addShowtime.php" method="get"><table style="width: 60%; margin-left: 20%;"><tr><td><br><h4>Add Showtime:</h4></td><td><input name="movieID" value="'+ arr[0].movieID +'" readonly hidden><input name="theaterID" value="<?php echo $theaterID; ?>" readonly hidden><input name="theaterType" value="<?php echo $theaterType; ?>" readonly hidden></td></tr><tr><td>Movie<br><input value="'+ arr[0].movieName +'" disabled></td><td>Date <br><input type="date" name="date" min="<?php echo date("Y-m-d"); ?>" max="'+ arr[0].endDate +'" required></td><td>Time <br><select name="time" required><option value="" selected disabled hidden>hh:mm</option><option value="1">10:00</option><option value="2">12:30</option><option value="3">15:00</option><option value="4">17:30</option><option value="5">20:00</option></select></td>';
					if(arr[0].language != 'Thai'){
						out += '<td>Soundtrack<br><input type="radio" name="soundtrack" value="'+ arr[0].language +'" required> '+ arr[0].language +'<input type="radio" name="soundtrack" value="Thai" > Thai</td><td>Subtitle<br><input type="radio" name="subtitle" value="Thai" required> Thai  <input type="radio" name="subtitle" value="--" > None</td>';
					}
					else{
						out += '<td>Soundtrack<br><input type="radio" name="soundtrack" value="Thai" readonly checked> Thai</td><td>Subtitle<br><input type="radio" name="subtitle" value="English" required> English  <input type="radio" name="subtitle" value="--" > None</td>';
					}
					
					out += '</tr></table><br><center><input type="submit" value="Add Showtime"></form> <input type="button" value="Back" onclick="goBack()"></center>';
		document.getElementById("showtime").innerHTML = out;
	}
	
	// ----- DELETE SHOWTIME -----
	function deleteShowtime(showtimeID){
		var xmlhttp = new XMLHttpRequest();
		var url = location.protocol + '//' + location.host+"/deleteShowtime.php?showtimeID="+showtimeID;
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {			
			showMovie('<?php echo $row['MovieID']; ?>');
			}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	
	// ---------- GO BACK ----------
	function goBack(){
		var url = location.protocol + '//' + location.host+"/ttbranch.php?branchName=<?php echo $row['BranchName']; ?>";
		location.href = url;
	}
    </script>
</body>
</html>