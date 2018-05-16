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
	echo "<h1 id='deletewarning'>Are you sure you want to delete this item?</h1>";
	echo '<form action="iteminfodeleteform.php" method="post" enctype="multipart/form-data">';
	echo '<div id="buttons"><button type="submit" id="deletebuttonconfirm">CONFIRM</button>';
	echo '<a href="iteminfo.php"><button type="button" id="deletecancel">CANCEL</button></a><br /><br /></div><hr />';
	echo '<div id="left">';
		echo "<h2>Item: " . $row['ItemName'] . " (". $row['RoomName'] . ")</h2>";
		echo "<p>Item Name: <span class='info'>" . $row['ItemName'] . "</span></p>";
		echo "<p>Brand: <span class='info'>" . $row['Brand'] . "</span></p>";
		echo "<p>Serial Number: <span class='info'>" . $row['SerialNumber'] . "</span></p>";
		echo "<p>Model Number: <span class='info'>" . $row['ModelNumber'] . "</span></p>";
		echo "<p>Cost: <span class='info'>$" . $row['Cost'] . "</span></p>";
		//Convert date from yyyy/dd/mm to mm/dd/yyyy
		$newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$2-$3-$1",$row['DatePurchased']);
		echo "<p>Date Purchased: <span class='info'>" . $newDate . "</span></p>";
		echo "<p>Category: <span class='info'>" . $row['CategoryName'] . "</span></p>";
		echo "<p>Room: <span class='info'>" . $row['RoomName'] . "</span></p>";
	echo '</div>'; // Close left div
	echo '<div id="itemimagediv">'; //right div
	if ((!empty($row['ImageName'])) && (file_exists("images/items/".$row['ImageName']))) // Checking if photo exists
		echo "<img src='images/items/" . $row['ImageName'] . "' alt='Item Details' class='iteminfoimage' />"; //If photo exists, display it
	else 
		echo "<img src='images/items/default.png' alt='Item Details' class='iteminfoimage' />"; //If not display default coming soon image
	echo '</div>'; //close itemagediv (right) div
	echo '</form>';

	mysqli_close($con);
?>