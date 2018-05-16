<?php
include('includes/headAdmin.php');
?>

<div id="maincontent">

<div id="form">
	<h1>Login</h1>
	<form action="loginform.php" method="post" enctype="multipart/form-data">
		<button type="submit" id="loginbutton">LOGIN</button>
		<p>Password</p>
		<input type="text" name="password" /></p>
	</form>
</div>

<?php include('includes/footer.php'); ?>