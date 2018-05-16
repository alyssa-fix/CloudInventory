<?php 
include('includes/header.php');
if (loggedin()){
?>

 	<?php
		echo "<div id='settingsDivLeft'>";
			echo "<div id='RoomsSettings'>";
				echo "<h3>Rooms: </h3><button type='button' id='editbutton' style='float:right' onclick='addRoom()'>Add Room</button>";
				echo "<table class='SettingsTable'>";				
				$result = mysqli_query($con,"SELECT * FROM Rooms ORDER BY RoomName");
				while($row = mysqli_fetch_array($result)) {
					echo "<tr class='SettingsRow" . $row['ID'] . "'><td class='settingslabel'>" . $row['RoomName'] . "</td>";
					if ((!empty($row['RoomImage'])) && (file_exists("images/rooms/".$row['RoomImage']))) // Checking if photo exists
						echo "<td><img src='images/rooms/".$row['RoomImage']."' alt='Room Details' class='settingsImage' /></td>"; //If photo exists, display it
					else 
						echo "<td><img src='images/rooms/default.png' alt='Room Details' class='settingsImage' /></td>"; //If not display default coming soon image
					echo "<td><button type='button' style='float:right' id='editbutton' onclick='editRoomInfo(\"$row[ID]\")'>Edit</button><br /><br />";
					echo "<button type='button' style='float:right' id='deletebutton' onclick='deleteRoomInfo(\"$row[ID]\")'>Delete</button></td></tr>";
				}
			echo "</table><br /><br /><br /></div>";
		echo "</div>"; //close left div

		echo "<div id='settingsDivRight'>";
			echo "<div id='CategoriesSettings'>";
				echo "<h3>Categories:</h3><button type='button' id='editbutton' style='float:right' onclick='addCategory()'>Add Category</button>";
				echo "<table class='SettingsTable'>";				
				$result = mysqli_query($con,"SELECT * FROM Categories ORDER BY CategoryName");
				while($row = mysqli_fetch_array($result)) {
					echo "<tr class='SettingsRow" . $row['ID'] . "'><td class='settingslabel'>" . $row['CategoryName'] . "</td>";
					if ((!empty($row['CategoryImage'])) && (file_exists("images/categories/".$row['CategoryImage']))) // Checking if photo exists
						echo "<td><img src='images/categories/".$row['CategoryImage']."' alt='Category Details' class='settingsImage' /></td>"; //If photo exists, display it
					else 
						echo "<td><img src='images/categories/default.png' alt='Category Details' class='settingsImage' /></td>"; //If not display default coming soon image
					echo "<td><button type='button' style='float:right' id='editbutton' onclick='editCategoryInfo(\"$row[ID]\")'>EDIT</button><br /><br />";
					echo "<button type='button' style='float:right' id='deletebutton' onclick='deleteCategoryInfo(\"$row[ID]\")'>DELETE</button></td></tr>";
				}
			echo "</table><br /><br /><br /></div>";
		echo "</div>"; // close right div

		mysqli_close($con);
		echo "</div></div>"
	?>

<?php
	} else {
		echo "You're not logged in. Click <a href='login.php'>HERE</a> to log in";
	}
include('includes/footer.php'); 
?>