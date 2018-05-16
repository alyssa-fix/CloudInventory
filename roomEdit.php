<?php include ('includes/headerEdit.php'); ?>
<?php

//$EditRoomID = $_GET['RoomIDAJAX']; I don't think I need this 

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
echo "<h2>Edit Room: " . $row['RoomName'] . "</h2>";
echo "<form action='roomEditForm.php' method='post' enctype='multipart/form-data'>";
echo '<button type="submit" style="float:right" id="savebutton">Save</button>';
echo '<a href="settings.php"><button type="button" id="cancelbutton">Cancel</button></a><br /><br /><hr />';

echo "<p><span class='tableLabel'>Room Name: </span>";
echo "<input type='text' name='roomNameField' value='" . $row['RoomName'] . "'/></p>";

echo "<p><span class='tableLabel'>Room Dimensions: </span>";
echo "<input type='text' name='RoomDimensionsField' value='" . $row['RoomDimensions'] . "'/></p>";

echo "<p><span class='tableLabel'>Room Square Footage: </span>";
echo "<input type='text' name='RoomSquareFootField' value='" . $row['RoomSquareFoot'] . "'/></p><hr />";

echo "<p><span class='tableLabel'>Paint Info: </span>";
echo "<input type='text' name='PaintInfoField' value='" . $row['PaintInfo'] . "'/></p>";

echo "<p><span class='tableLabel'>Paint Date: </span>";
echo "<input type='text' name='PaintDateField' value='" . $row['PaintDate'] . "'/></p>";

echo "<p><span class='tableLabel'>PaintPurchaseLocation: </span>";
echo "<input type='text' name='PaintPurchaseLocationField' value='" . $row['PaintPurchaseLocation'] . "'/></p><hr />";

echo "<p><span class='tableLabel'>CarpetInfo: </span>";
echo "<input type='text' name='CarpetInfoField' value='" . $row['CarpetInfo'] . "'/></p>";

echo "<p><span class='tableLabel'>CarpetDate: </span>";
echo "<input type='text' name='CarpetDateField' value='" . $row['CarpetDate'] . "'/></p>";

echo "<p><span class='tableLabel'>CarpetPurchaseLocation: </span>";
echo "<input type='text' name='CarpetPurchaseLocationField' value='" . $row['CarpetPurchaseLocation'] . "'/></p>";

echo "<p style='min-height:120px;line-height:120px;'>Room Image: ";
if ((!empty($row['RoomImage'])) && (file_exists("images/rooms/".$row['RoomImage']))) // Checking if photo exists
		echo "<img src='images/rooms/".$row['RoomImage']."' alt='Room Details' class='editImage' />"; //If photo exists, display it
	else 
		echo "<img src='images/rooms/default.png' alt='Room Details' class='editImage' /></p>"; //If not display default coming soon image
echo '<p><span class="tableLabel">Upload new image: </span>';
	echo '<input type="file" name="myFile" value=' . $row["RoomImage"] . '></p>';
	echo '<input type="hidden" name="fileName" value=' . $row["RoomImage"] . '>';
echo "</form>";

	mysqli_close($con);
?>