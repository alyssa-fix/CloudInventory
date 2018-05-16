<?php include('includes/headerEdit.php'); ?>

<?php
	    define("UPLOAD_DIR", "/Users/yellowstone92394/Sites/InvKeeper/images/rooms/");

			if (!empty($_FILES["myFile"])) {
		    	$myFile = $_FILES["myFile"];
 
	    		if ($myFile["error"] == UPLOAD_ERR_OK) {
		        	// ensure a safe filename
				    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

				    // preserve file from temporary directory
				    $success = move_uploaded_file($myFile["tmp_name"],
				        UPLOAD_DIR . $name);
				    if (!$success) { 
				        echo "<p>Unable to save file.</p>";
				        exit;
				    }
				} else if ($myFile["error"] == UPLOAD_ERR_NO_FILE) {
					$name = $_POST[fileName];
				} else {
					echo "<p>An error occurred.</p>";
		        	exit;
				}
		    }		

	    // set proper permissions on the new file
	    chmod(UPLOAD_DIR . $name, 0644);

	$RoomSession = $_SESSION['RoomID'];

	$sql = "UPDATE Rooms SET
		RoomName = '$_POST[roomNameField]',
		RoomDimensions = '$_POST[RoomDimensionsField]',
		RoomSquareFoot = '$_POST[RoomSquareFootField]',
		PaintInfo = '$_POST[PaintInfoField]',
		PaintDate = '$_POST[PaintDateField]',
		PaintPurchaseLocation = '$_POST[PaintPurchaseLocationField]',
		CarpetInfo = '$_POST[CarpetInfoField]',
		CarpetDate = '$_POST[CarpetDateField]',
		CarpetPurchaseLocation = '$_POST[CarpetPurchaseLocationField]',
		RoomImage = '$name'
		WHERE ID=" . $RoomSession;
//echo "The ID is: _" . $RoomSession . "_<br />";
//echo "The SessionID is: _" . $_SESSION['RoomID'] . "_<br />";
//echo "The file is: _" . $name . "_<br />";
//Test is update was successul
if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}


//Send user back to original page
echo '<script type="text/javascript">
location.replace("settings.php");
</script>';
echo "<a href='settings.php'>DONE</a>";

 ?>