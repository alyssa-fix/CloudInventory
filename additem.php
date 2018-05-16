<?php 
include('includes/header.php');
if (loggedin()){
?>

 	<?php
		$result = mysqli_query($con,"SELECT * FROM Items");
		$roomresult = mysqli_query($con,"SELECT * FROM Rooms ORDER BY RoomName");
		$categoryresult = mysqli_query($con,"SELECT * FROM Categories ORDER BY CategoryName");
		echo '<div id="iteminfo">';

		echo '<form action="additemform.php" method="post" enctype="multipart/form-data">';
		echo '<input type="submit" style="float:right" value="save" />';
		echo "<h2>Add Item</h2>";

		echo "<p>Item Name: ";
		echo '<input type="text" name="itemNameField" /></p>';

		echo "<p>Brand: ";
		echo '<input type="text" name="brandField"/></p>';

		echo "<p>Serial Number: ";
		echo '<input type="text" name="serialNumberField"/></p>';

		echo "<p>Model Number: ";
		echo '<input type="text" name="modelNumberField"/></p>';

		echo "<p>Cost: $";
		echo '<input type="text" name="costField"></p>';

		echo "<p>Date Purchased: ";
		echo '<input type="date" name="datePurchasedField"/></p>';

		echo "<p>Purchased From: ";
		echo '<input type="text" name="purchasedFromField"/></p>';

		echo "<p>Category: ";
		echo "<select name=categoryField value=''>"; //list box
		while($row = mysqli_fetch_array($categoryresult)) {
			echo "<option value=$row[ID]>$row[CategoryName]</option>"; 
		}
		echo "</select></p>"; // close list box

		echo "<p>Room: ";
		echo "<select name=roomField value=''>"; //list box
		while($row = mysqli_fetch_array($roomresult)) {
			echo "<option value=$row[ID]>$row[RoomName]</option>"; 
		}
		echo "</select></p>"; // close list box

		echo "<p>Image: ";
		echo '<input type="file" name="myFile"></p>';


		mysqli_close($con);
		echo "</div>"
	?>

<?php
	} else {
		echo "You're not logged in. Click <a href='login.php'>HERE</a> to log in";
	}
include('includes/footer.php'); 
?>