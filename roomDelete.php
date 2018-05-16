<?php include ('includes/headerEdit.php'); ?>
<?php

	if(isset($_GET['RoomIDAJAX'])){
		if(!is_numeric($_GET['RoomIDAJAX'])){ // Checking data it is a number or not
			echo "Data Error"; 
		exit; }
		else
			$_SESSION['RoomID']=$_GET['RoomIDAJAX']; // Collecting data from query string
	}
	$RoomSession = $_SESSION['RoomID'];

$result = mysqli_query($con,"SELECT * FROM Rooms WHERE ID=" . $RoomSession);
$row = mysqli_fetch_array($result);
echo "<h1 id='deletewarning'>Are you sure you want to delete this room?</h1>";
echo "<form action='roomDeleteForm.php' method='post' enctype='multipart/form-data'>";
echo '<button type="submit" style="float:right" id="deletebuttonconfirm">CONFIRM</button>';
echo '<a href="settings.php"><button type="button" id="deletecancel">CANCEL</button></a><br /><br /><hr />';
echo "<p>Room Name: " . $row['RoomName'] . "</p>";

echo "<p>Room Image: ";
if ((!empty($row['RoomImage'])) && (file_exists("images/rooms/".$row['RoomImage']))) // Checking if photo exists
		echo "<img src='images/rooms/".$row['RoomImage']."' alt='Room Details' class='editImage' />"; //If photo exists, display it
	else 
		echo "<img src='images/rooms/default.png' alt='Room Details' class='editImage' /></p>"; //If not display default coming soon image
//echo '<p><span class="tableLabel">Upload new image: </span>';
	//echo '<input type="file" name="myFile" value=' . $row["RoomImage"] . '></p>';
	echo '<input type="hidden" name="fileName" value=' . $row["RoomImage"] . '>';
echo "</form>";

	mysqli_close($con);
?>