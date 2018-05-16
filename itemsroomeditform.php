<?php include('includes/headerEdit.php'); ?>

<?php

	$RoomSession = $_SESSION['RoomID'];

	$sql = "UPDATE Rooms SET
		RoomDimensions = '$_POST[RoomDimensionsField]',
		RoomSquareFoot = '$_POST[RoomSquareFootField]',
		PaintInfo = '$_POST[PaintInfoField]',
		PaintDate = '$_POST[PaintDateField]',
		PaintPurchaseLocation = '$_POST[PaintPurchaseLocationField]',
		CarpetInfo = '$_POST[CarpetInfoField]',
		CarpetDate = '$_POST[CarpetDateField]',
		CarpetPurchaseLocation = '$_POST[CarpetPurchaseLocationField]'
		WHERE ID=" . $RoomSession;

		
echo "The ID is: _" . $RoomSession . "_<br />";
//echo "The file is: _" . $name . "_<br />";


//Test is update was successul
if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}


//Send user back to original page
echo '<script type="text/javascript">
location.replace("itemsroom.php?RoomID=' . $RoomSession . '");
</script>';
//echo "<a href='itemsroom.php'>DONE</a>";

 ?>