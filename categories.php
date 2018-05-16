<?php 
include('includes/header.php');
if (loggedin()){
?>

 	<?php
		$result = mysqli_query($con,"SELECT * FROM Categories ORDER BY CategoryName");
		echo "<div id='roomsTableHolder'>";
		echo "<table id='roomsTable'>";

		$i=0;
		while($row = mysqli_fetch_array($result)) {
			if ($i%5 == 0) echo "<tr>";
			echo "<td><a href=itemscat.php?ID=" . $row['ID'] . ">";
			if ((!empty($row['CategoryImage'])) && (file_exists("images/categories/".$row['CategoryImage']))) // Checking if photo exists
				echo "<img src='images/categories/".$row['CategoryImage']."' alt='Category Details' class='tableImages' /><p class='tableLabel'>" . $row['CategoryName'] . "</p></a></td>"; //If photo exists, display it
			else 
				echo "<img src='images/categories/default.png' alt='Category Details' class='tableImages' /><p class='tableLabel'>" . $row['CategoryName'] . "</p></a></td>"; //If not display default coming soon image
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