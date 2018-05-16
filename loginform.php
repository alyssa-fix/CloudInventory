<?php include('includes/headerEdit.php'); ?>

<?php
	session_start();
	$_SESSION["password"] = md5($_POST[password]);
	echo "password is " . $_SESSION['password'] . "<br />";
	echo "fix - " . md5("richpatty") . "<br />";
	echo "hannah - " . md5("momanddad") . "<br /><hr /><br />";



echo '<script type="text/javascript">
location.replace("index.php");
</script>';
?>
