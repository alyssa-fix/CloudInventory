<?php include ('includes/headerEdit.php'); ?>
<?php

echo "<h2>Add Category:</h2>";
echo "<form action='categoryAddForm.php' method='post' enctype='multipart/form-data'>";
echo '<button type="submit" style="float:right" id="savebutton">Save</button>';
echo '<a href="settings.php"><button type="button" id="cancelbutton">Cancel</button></a><br /><br /><hr />';
echo "<p>Category Name: ";
echo "<input type='text' name='categoryNameField' /></p>";

echo "<p>Category Image: ";
echo "<img src='images/categories/default.png' alt='Category Details' class='editImage' /></p>"; 
echo '<p><span class="tableLabel">Upload image: </span>';
echo '<input type="file" name="myFile" value=' . $row["CategoryImage"] . '></p>';
echo '<input type="hidden" name="fileName" value=' . $row["CategoryImage"] . '>';
echo "</form>";

	mysqli_close($con);
?>