<?php include('includes/headerEdit.php'); ?>
<?php
	if(isset($_GET['ID'])){
		if(!is_numeric($_GET['ID'])){ // Checking data it is a number or not
			echo "Data Error"; 
		exit; }
		else
			$_SESSION['ItemID']=$_GET['ID']; // Collecting data from query string
	}
?>
<?php
	$ID = $_SESSION['ItemID'];	
	//$result = mysqli_query($con,"SELECT * FROM Items WHERE Items.ID=" . $ID);
	$result = mysqli_query($con,"SELECT * FROM Categories JOIN Items ON Categories.ID=Items.Category JOIN Rooms ON Items.Room=Rooms.ID WHERE Items.ID=" . $ID);
	$roomresult = mysqli_query($con,"SELECT * FROM Rooms ORDER BY RoomName");
	$categoryresult = mysqli_query($con,"SELECT * FROM Categories ORDER BY CategoryName");
	$row = mysqli_fetch_array($result);	

	echo '<form action="iteminfoeditform.php" method="post" enctype="multipart/form-data">';
	echo '<div id="left">';
	echo '<button type="submit" style="float:right" id="savebutton">SAVE</button>';
	echo '<a href="iteminfo.php"><button type="button" id="cancelbutton">CANCEL</button></a>';
	echo "<h2>Item: " . $row['ItemName'] . " (". $row['RoomName'] . ")</h2>";

		echo "<p>Item Name: ";
		echo '<input type="text" name="itemNameField" value="' . $row['ItemName'] . '"/></p>';

		echo "<p>Brand: ";
		echo '<input type="text" name="brandField" value="' . $row['Brand'] . '"/></p>';

		echo "<p>Serial Number: ";
		echo '<input type="text" name="serialNumberField" value="' . $row['SerialNumber'] . '"/></p>';

		echo "<p>Model Number: ";
		echo '<input type="text" name="modelNumberField" value="' . $row['ModelNumber'] . '"/></p>';

		echo "<p>Cost: $";
		echo '<input type="text" name="costField" value="' . $row['Cost'] . '"/></p>';

		echo "<p>Date Purchased: ";
		echo '<input type="text" name="datePurchasedField" value="' . $row['DatePurchased'] . '"/></p>';

		echo "<p>Purchased From; ";
		echo '<input type="text" name="purchasedFromField" value="' . $row['PurchasedFrom'] . '"/></p>';

		echo "<p>Category: ";
		echo "<select name=categoryField value=''>"; //list box
		while($whilerow = mysqli_fetch_array($categoryresult)) {
			if ($row['Category']	 == $whilerow['ID']) {
				echo '<option selected="selected" value=' . $whilerow["ID"] . '>' . $whilerow["CategoryName"] . '</option>'; 
			} else {
				echo '<option value=' . $whilerow["ID"] . '>' . $whilerow["CategoryName"] . '</option>'; 
			}
		}
		echo "</select></p>"; // close list box

		echo "<p>Room: ";
		echo "<select name=roomField value=''>"; //list box
		while($whilerow = mysqli_fetch_array($roomresult)) {
			if ($row['Room']	 == $whilerow['ID']) {
				echo '<option selected="selected" value=' . $whilerow["ID"] . '>' . $whilerow["RoomName"] . '</option>'; 
			} else {
				echo '<option value=' . $whilerow["ID"] . '>' . $whilerow["RoomName"] . '</option>'; 
			}
		}

		echo "</select></p></div>"; // close list box
		echo '<div id="itemimagediv">';
			//echo '<img src="images/items/' . $row["ImageName"] . '" id="iteminfoimage" /><br /><br /><br />';
			if ((!empty($row['ImageName'])) && (file_exists("images/items/".$row['ImageName']))) // Checking if photo exists
				echo "<img src='images/items/" . $row['ImageName'] . "' alt='Item Details' class='iteminfoimage' /><br /><br /><br />"; //If photo exists, display it
			else 
				echo "<img src='images/items/default.png' alt='Item Details' class='iteminfoimage' /><br /><br /><br />"; //If not display default coming soon image
			echo '<span class="tableLabel">Upload new image</span><br /><br />';
			echo '<input type="file" name="myFile" value=' . $row["ImageName"] . '>';
			echo '<input type="hidden" name="fileName" value=' . $row["ImageName"] . '>';
		echo '</div>';

	echo '</form>';

	mysqli_close($con);
?>