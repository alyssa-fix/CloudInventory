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
			$_SESSION['CategoryID']=$_GET['ID']; // Collecting data from query string
	}
?>

 	<?php
		$result = mysqli_query($con,"SELECT * FROM Categories JOIN Items ON Items.Category=Categories.ID WHERE Items.Category=" . $_SESSION['CategoryID'] . " ORDER BY Items.ItemName");
		echo "<div id='roomsTableHolder'>";
		echo "<table id='roomsTable'>";

		$i=0;
		while($row = mysqli_fetch_array($result)) {
			if ($i == 0 ) { 
				echo "<h2>" . $row['CategoryName'] . "</h2>";
				//echo '<button type="button" style="float:right" onclick="editItemInfo()">EDIT</button>';
			}
			if ($i%5 == 0) echo "<tr>";
			echo "<td><a href=iteminfo.php?ID=" . $row['ID'] . ">";
			if ((!empty($row['ImageName'])) && (file_exists("images/items/".$row['ImageName']))) // Checking if photo exists
				echo "<img src='images/items/" . $row['ImageName'] . "' alt='Item Details' class='tableImages' /><p class='tableLabel'>" . $row['ItemName'] . "</p></a></td>"; //If photo exists, display it
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