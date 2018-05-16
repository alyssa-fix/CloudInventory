<?php include ('includes/headerEdit.php'); ?>
<?php

echo "<h2>Add Room:</h2>";
echo "<form action='roomAddForm.php' method='post' enctype='multipart/form-data'>";
echo '<button type="submit" style="float:right" id="savebutton">Save</button>';
echo '<a href="settings.php"><button type="button" id="cancelbutton">Cancel</button></a><br /><br /><hr />';
echo "<p>Room Name: ";
echo "<input type='text' name='roomNameField' /></p>";

echo "<p>Room Image: ";
echo "<img src='images/rooms/default.png' alt='Room Details' class='editImage' /></p>"; 
echo '<p><span class="tableLabel">Upload image: </span>';
echo '<input type="file" name="myFile" value=' . $row["RoomImage"] . '></p>';
echo '<input type="hidden" name="fileName" value=' . $row["RoomImage"] . '>';
echo "</form>";

	mysqli_close($con);
?>