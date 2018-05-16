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

	$CategorySession = $_SESSION['CategoryID'];

	$sql = "DELETE FROM Categories WHERE ID=" . $CategorySession;
echo "The ID is: _" . $ID . "_<br />";
echo "The file is: _" . $name . "_<br />";
//Test update was successul
if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}
echo "<a href='settings.php'>DONE</a>";

//Send user back to original page
echo '<script type="text/javascript">
location.replace("settings.php");
</script>';


 ?>