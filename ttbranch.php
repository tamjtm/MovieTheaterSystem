<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Theater Management</title>
</head>

<body>
<h1>Theater Management</h1>
<form action="/ttbranch.php" method="get">
Branch Name: <select name="branchName">
<option selected disabled hidden></option>
    	<?php 
			$con = mysqli_connect("localhost", "root", "", "theater");
			//check connection
			if(mysqli_connect_errno()){
				echo "Failed to connect to mySQL: " . mysqli_connect_error();
			}
			
			$result = mysqli_query($con, "SELECT * FROM Branch");

			// fetch array
			while($row = mysqli_fetch_array($result)){
				echo '<option value="' . $row['BranchName'] . '">' . $row['BranchName'] . '</option>';
			}
			
			mysqli_close($con);	
		?>
    </select>
<button onclick="loadBranch()">Enter</button><br>
</form>
<div id="tb_branch">[...Please choose a branch...]</div>
    
    
    
    
    <!-- ========== SCRIPT ZONE ========== -->
    <script>
	loadBranch();
	
	// ---------- LOAD BRANCH ----------
	function loadBranch(){
		var xmlhttp = new XMLHttpRequest();
		var url = location.protocol + '//' + location.host+"/getbranch.php?branchName=<?php echo $_GET['branchName']; ?>";
				
		xmlhttp.onreadystatechange=function() {
		    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    	    	if(xmlhttp.responseText == '[]'){
					out = '<br><h2>Branch Name: <?php echo $_GET['branchName']; ?> / Theater Amount: 0</h2><br><center>...No Theater...</center><br><form action="addTheater.php"><input type="text" name="branchName" value="<?php echo $_GET['branchName']; ?>" readonly hidden><center>Theater No. <input type="number" name="theaterNo" min="1" max="9" value="<?php echo $row['TheaterAmount']+1; ?>">	Theater Type <select name="theaterType" required><option value="" selected disabled hidden>...Choose...</option>	<option value="Digital">Digital</option><option value="3D">3D</option><option value="4DX">4DX</option></select> <button>Add Theater</button></center></form>';
					document.getElementById("tb_branch").innerHTML = out;
				}
				displayResponse(xmlhttp.responseText);				
	    	}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
	
	// ---------- DISPLAY ----------
	function displayResponse(response) {
	   	var arr = JSON.parse(response);
  		var i;
   		var out = "";
	
		out+= "<br><h2>Branch Name: "+arr[0].branchName+" / Theater Amount: "+arr[0].theaterAmount+"</h2><br><table style=\"width: 70%; margin-left: 15%;\"><tr><td><h3>Theater Number</h3></td><td><h3>Theater Type</h3></td><td><h3>Now Showing</h3></td></tr>";

  		for(i = 0; i < arr.length; i++) {
        	out += "<tr><td>" +
        	arr[i].theaterNo +
        	"</td><td>" +
	        arr[i].theaterType +
			"</td><td>";
			
			if(arr[i].movieName == '')
				out += '< empty >';
			else 
				out += arr[i].movieName;
			      	
			out += "</td><td>" +
			"<button onclick=\"editTheater('"+arr[i].theaterID+"')\">View</button> " +
	        "<button onclick=\"deleteTheater('"+arr[i].theaterID+"')\">Delete</button>" +
	        "</td></tr>";
	    }
		
    	out += '</table><br><?php 
		$con = mysqli_connect("localhost", "root", "", "theater");
		//check connection
		if(mysqli_connect_errno()){
			echo "Failed to connect to mySQL: " . mysqli_connect_error();
		}			
		$result = mysqli_query($con, "SELECT * FROM Branch WHERE BranchName = '" . $_GET['branchName'] . "'");
		$row = mysqli_fetch_array($result);			
		mysqli_close($con);	
	?><form action="addTheater.php"><input type="text" name="branchName" value="<?php echo $_GET['branchName']; ?>" readonly hidden><center>Theater No. <input type="number" name="theaterNo" min="1" max="9" value="<?php echo $row['TheaterAmount']+1; ?>">	Theater Type <select name="theaterType" required><option value="" selected disabled hidden>...Choose...</option>	<option value="Digital">Digital</option><option value="3D">3D</option><option value="4DX">4DX</option></select> <button>Add Theater</button></center></form>';
	    document.getElementById("tb_branch").innerHTML = out;
	}
	
	// ---------- EDIT THEATER ----------
	function editTheater(theaterID){
		var url = location.protocol + '//' + location.host + "/editTheater.php?theaterID="+theaterID;
		location.href = url;
	}
	
	// ---------- DELETE THEATER ----------
	function deleteTheater(thearterID){
		var xmlhttp = new XMLHttpRequest();
		var url = location.protocol + '//' + location.host+"/deleteTheater.php?theaterID="+thearterID;
		
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				loadBranch();
			}
		}
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
	}
    </script>
</body>
</html>