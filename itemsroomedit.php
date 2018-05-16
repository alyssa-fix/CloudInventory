<?php include('includes/headerEdit.php'); ?>

<?php
	if(isset($_GET['ID'])){
		if(!is_numeric($_GET['ID'])){ // Checking data it is a number or not
			echo "Data Error"; 
		exit; }
		else
			$_SESSION['RoomID']=$_GET['ID']; // Collecting data from query string
	}
?>

 	<?php
 		$result = mysqli_query($con,"SELECT * FROM Items JOIN Rooms ON Items.Room=Rooms.ID LEFT OUTER JOIN Windows ON Rooms.ID=Windows.Room WHERE Items.Room=" . $_SESSION['RoomID'] . " ORDER BY ItemName");
 		//$windows = mysqli_query($con,"SELECT * FROM Windows WHERE Windows.Room=" . $SESSION['RoomID']);
 		$windows = mysqli_query($con,"SELECT * FROM Windows WHERE Windows.Room=" . $_SESSION['RoomID']);
 		$row = mysqli_fetch_array($result);	

 		echo '<form action="itemsroomeditform.php" method="post" enctype="multipart/form-data">';
 		echo '<a href="itemsroom.php"><button type="button" id="cancelbutton">CANCEL</button></a>';
 		echo '<button type="submit" style="float:right" id="savebutton">SAVE</button>';

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

		echo '</form>';
				
		mysqli_close($con);
		echo "</div>"
	?>

    <?php include('includes/footer.php'); ?>