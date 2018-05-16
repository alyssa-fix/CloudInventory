<?php include('includes/headerEdit.php'); ?>

<?php 
	define("UPLOAD_DIR", "/Users/yellowstone92394/Sites/InvKeeper/images/items/");

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
					$name = "default.png";
	    } else {
	    	echo "<p>An error occurred.</p>";
	        exit;
	    }

	}

	    // set proper permissions on the new file
	    chmod(UPLOAD_DIR . $name, 0644);

	$sql = "INSERT INTO Items (ItemName, Brand, SerialNumber, ModelNumber, Cost, DatePurchased, PurchasedFrom, Room, Category, ImageName) VALUES (
			'$_POST[itemNameField]', '$_POST[brandField]', '$_POST[serialNumberField]', '$_POST[modelNumberField]', '$_POST[costField]', '$_POST[datePurchasedField]', '$_POST[purchasedFromField]', '$_POST[roomField]', '$_POST[categoryField]', '$name'
		)";



//Test is update was successul
if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
    printf ("New Record has id %d.\n", mysqli_insert_id($con));
    $itemID = mysqli_insert_id($con);
    echo $itemID;
} else {
    echo "Error updating record: " . mysqli_error($con);
}



//Send user back to original page
echo '<script type="text/javascript">
location.replace("iteminfo.php?ID=' . $itemID . '");
</script>';
//echo "<a href='iteminfo.php?ID=" . $itemID . "'>DONE</a>";

 ?>