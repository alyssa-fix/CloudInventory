<?php include('includes/headerEdit.php'); ?>

<?php
	    define("UPLOAD_DIR", "/Users/yellowstone92394/Sites/InvKeeper/images/items/");

			if (!empty($_FILES["myFile"])) {
		    	$myFile = $_FILES["myFile"];
 
	    		if ($myFile["error"] == UPLOAD_ERR_OK) {
		        	// ensure a safe filename
				    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
				    echo "The file is: _" . $name . "_<br />";

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

	$ID = $_SESSION['ItemID'];

	$sql = "UPDATE Items SET
		ItemName = '$_POST[itemNameField]',
		Brand = '$_POST[brandField]',
		SerialNumber = '$_POST[serialNumberField]',
		ModelNumber = '$_POST[modelNumberField]',
		Cost = '$_POST[costField]',
		DatePurchased = '$_POST[datePurchasedField]',
		PurchasedFrom =  '$_POST[purchasedFromField]',
		Category = '$_POST[categoryField]',
		Room = '$_POST[roomField]',
		ImageName = '$name'
		WHERE ID=" . $ID;
	
echo "The ID is: _" . $ID . "_<br />";
//echo "The file is: _" . $name . "_<br />";

//Test is update was successul
if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
    echo $ID;
} else {
    echo "Error updating record: " . mysqli_error($con);
}

//Send user back to original page
echo '<script type="text/javascript">
location.replace("iteminfo.php?ID=' . $ID . '");
</script>';
//echo "<a href='iteminfo.php'>DONE</a>";

 ?>