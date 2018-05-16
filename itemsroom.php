<?php 
include('includes/header.php');
if (loggedin()){
?>

<?php
	if(isset($_GET['ID'])){
		if(!is_numeric($_GET['ID'])){ // Checking data it is a number or not
			echo "Data Error"; 
		exit; }
		else
			$_SESSION['RoomID']=$_GET['ID']; // Collecting data from query string
	}
?>

 	<?php
		$result = mysqli_query($con,"SELECT * FROM Rooms JOIN Items ON Items.Room=Rooms.ID WHERE Items.Room=" . $_SESSION['RoomID'] . " ORDER BY ItemName");
		$roomresult = mysqli_query($con,"SELECT * FROM Rooms WHERE Rooms.ID=" . $_SESSION['RoomID']);
 		//$result = mysqli_query($con,"SELECT * FROM Items JOIN Rooms ON Items.Room=Rooms.ID LEFT OUTER JOIN Windows ON Rooms.ID=Windows.Room WHERE Items.Room=" . $_SESSION['RoomID'] . " ORDER BY ItemName");
 		//$windows = mysqli_query($con,"SELECT * FROM Windows WHERE Windows.Room=" . $_SESSION['RoomID']);
		echo "<div id='roomsTableHolder'>";
		echo "<table id='roomsTable'>";

		$roomrow = mysqli_fetch_array($roomresult);
		echo "<h2>" . $roomrow['RoomName'] . "</h2>";
		echo "<hr />";
		echo "<div id='roomInfoLeft'>";
			echo "<button type='button' style='float:right' id='editbutton' onclick='editRoomItemsPage()'>Edit</button>";
			echo "<p><span class='tableLabel'>Room Dimensions: </span>" . $roomrow['RoomDimensions'] . "</p>";
			echo "<p><span class='tableLabel'>Room Square Footage: </span>" . $roomrow['RoomSquareFoot'] . "</p><hr />";
			echo "<p><span class='tableLabel'>Paint Info: </span>" . $roomrow['PaintInfo'] . "</p>";
			//Convert date from yyyy/dd/mm to mm/dd/yyyy
			$newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$2-$3-$1",$roomrow['PaintDate']);
			echo "<p><span class='tableLabel'>Paint Date: </span>" . $newDate . "</p>";

			echo "<p><span class='tableLabel'>PaintPurchaseLocation: </span>" . $roomrow['PaintPurchaseLocation'] . "</p><hr />";
			echo "<p><span class='tableLabel'>CarpetInfo: </span>" . $roomrow['CarpetInfo'] . "</p>";
			echo "<p><span class='tableLabel'>CarpetDate: </span>" . $roomrow['CarpetDate'] . "</p>";
			echo "<p><span class='tableLabel'>CarpetPurchaseLocation: </span>" . $roomrow['CarpetPurchaseLocation'] . "</p>";
		echo "</div>";//close roomInfoLeft div

		echo "<div id='roomInfoRight'>";
		echo "<button type='button' style='float:right' id='editbutton' onclick='editWindowRoomsItems()'>Edit</button>";
		echo "<button type='button' style='float:right' id='editbutton' onclick='AddWindowRoomItems()'>Add Window</button>";
			echo "<p><span class='tableLabel'>Windows: </span>(Work in progress)</p>";
			//while($winrow = mysqli_fetch_array($windows)) {
			//	echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;" . $row['WindowName'] . " - " . $row['WindowDimensions'] . "</p>";
			//}
		echo "</div><br />";//close roomInfoRight div
		echo "<hr style='clear:both' />";
		
		$i=0;
		while($row = mysqli_fetch_array($result)) {
			if ($i%5 == 0) echo "<tr>";
			echo "<td><a href=iteminfo.php?ID=" . $row['ID'] . ">";
			if ((!empty($row['ImageName'])) && (file_exists("images/items/".$row['ImageName']))) // Checking if photo exists
				echo "<img src='images/items/". $row['ImageName'] . "' alt='Item Details' class='tableImages' /><p class='tableLabel'>" . $row['ItemName'] . "</p></a></td>"; //If photo exists, display it
			else 
				echo "<img src='images/items/default.png' alt='Item Details' class='tableImages' /><p class='tableLabel'>" . $row['ItemName'] . "</p></a></td>"; //If not display default coming soon image
			$i++;
			if ($i%5 == 0) echo "</tr>";
		}

		while($i%5 != 0) {
			echo "<td>  </td>";
			$i++;
			if ($i%5 == 0) echo "</tr>";
		}

		echo "</table><br /><br />";
		mysqli_close($con);
		echo "</div>"
	?>

<?php
	} else {
		echo "You're not logged in. Click <a href='login.php'>HERE</a> to log in";
	}
include('includes/footer.php'); 
?>