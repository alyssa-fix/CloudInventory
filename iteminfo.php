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
			$_SESSION['ItemID']=$_GET['ID']; // Collecting data from query string
	}
?>

<?php
	$ID = $_SESSION['ItemID'];	
	//$result = mysqli_query($con,"SELECT * FROM Items WHERE Items.ID=" . $ID);
	$result = mysqli_query($con,"SELECT * FROM Categories JOIN Items ON Categories.ID=Items.Category JOIN Rooms ON Items.Room=Rooms.ID WHERE Items.ID=" . $ID);
	$row = mysqli_fetch_array($result);	

	echo '<div id="iteminfo">';
	echo '<div id="left">';
	echo '<br /><button type="button" style="float:right" onclick="editItemInfo()" id="editbutton">EDIT</button>';
	echo '<button type="button" style="float:right" onclick="deleteItem()" id="deletebutton">DELETE</button>';
		echo "<h2>Item: " . $row['ItemName'] . " (". $row['RoomName'] . ")</h2>";
		echo "<p>Item Name: <span class='info'>" . $row['ItemName'] . "</span></p>";
		echo "<p>Brand: <span class='info'>" . $row['Brand'] . "</span></p>";
		echo "<p>Serial Number: <span class='info'>" . $row['SerialNumber'] . "</span></p>";
		echo "<p>Model Number: <span class='info'>" . $row['ModelNumber'] . "</span></p>";
		echo "<p>Cost: <span class='info'>$" . $row['Cost'] . "</span></p>";
		//Convert date from yyyy/dd/mm to mm/dd/yyyy
		$newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$2-$3-$1",$row['DatePurchased']);
		echo "<p>Date Purchased: <span class='info'>" . $newDate . "</span></p>";
		echo "<p>Purchased From: <span class='info'>" . $row['PurchasedFrom'] . "</span></p>";
		echo "<p>Category: <span class='info'>" . $row['CategoryName'] . "</span></p>";
		echo "<p>Room: <span class='info'>" . $row['RoomName'] . "</span></p>";
	echo '</div>'; // Close left div

	echo '<div id="itemimagediv">'; //right div
	if ((!empty($row['ImageName'])) && (file_exists("images/items/".$row['ImageName']))) // Checking if photo exists
		echo "<img src='images/items/" . $row['ImageName'] . "' alt='Item Details' class='iteminfoimage' />"; //If photo exists, display it
	else 
		echo "<img src='images/items/default.png' alt='Item Details' class='iteminfoimage' />"; //If not display default coming soon image
	echo '</div>'; //close itemagediv (right) div


	mysqli_close($con);
	echo "</div>"  //close iteminfo div?
?>

<?php
	} else {
		echo "You're not logged in. Click <a href='login.php'>HERE</a> to log in";
	}
include('includes/footer.php'); 
?>