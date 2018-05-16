<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

 	<?php
		echo "<div id='settingsDiv'>";

			echo "<div id='RoomsSettings'>";
				echo "<h3>Rooms:</h3>";
				echo "<form action='addRoomForm.php' method='get'>";
				echo "<input type='submit' style='float:left' value='save' /><br /><br />";
				
				$result = mysqli_query($con,"SELECT * FROM Rooms ORDER BY RoomName");
				while($row = mysqli_fetch_array($result)) {
					echo "<input type='text' name='roomName' value='" . $row['RoomName'] . "'/>";
					echo " Image Selection Here</p>";
				}
				echo "Add Room Link?<br /><br /><br /></form></div>";

			echo "<div id='CategoriesSettings'>";
				echo "<h3>Categories:</h3>";
				echo "<form action='addRoomForm.php' method='get'>";
				echo "<input type='submit' style='float:left' value='save' /><br /><br />";
				
				$result = mysqli_query($con,"SELECT * FROM Categories ORDER BY CategoryName");
				while($row = mysqli_fetch_array($result)) {
					echo "<input type='text' name='categoryName' value='" . $row['CategoryName'] . "'/>";
					echo " Image Selection Here</p>";
				}
				echo "Add Room Link?<br /><br /></form></div>";

		mysqli_close($con);
		echo "</div></div>"
	?>

    <?php include('includes/footer.php'); ?>