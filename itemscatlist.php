<?php include('includes/headerEdit.php'); ?>

<?php 
	if(isset($_GET['ID'])){ // Checking data is a number or not
		echo "Date Error";
		exit;
	} else {
		$_SESSION['CategoryID']=$_GET['ID']; // Collect data from query string
	}
	}
?>

<?php 
	$result = mysqli_query($con,"SELECT * FROM Categories JOIN Items ON Items.Category=Categories.ID WHERE Items.Category=" . $_SESSION['CategoryID'] . " ORDER BY Items.ItemName");
	echo "<table id='listtable'>";
	echo "<h2>" . $row['CategoryName'] . "</h2>";
	echo "<tr>
	<th>Item Name</th>
	<th>Brand</th>
	<th>Date Purchased</th>
	<th>Cost</th>";
	while($row = mysqli_fetch_array($result)) {
		echo "<tr><td><a href=iteminfo.php?ID=" . $row['ID'] . ">";
		echo "<td>" . $row['ItemName'] . "</td>";
		echo "<td>" . $row['Brand'] . "</td>";
		//Convert date from yyyy/dd/mm to mm/dd/yyyy
		$newDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$2-$3-$1",$row['DatePurchased']);
		echo "<td>" . $newDate . "</td>";
		echo "<td>" . $row['Cost'] . "</td></tr>";
	}
	echo "</table><br /><br />";
	mysqli_close($con);
?>


	
