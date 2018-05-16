<?php 
session_start(); 
function loggedin(){
    //if ($SESSION["password"] = md5("richpatty") || md5("momanddad")) {
    //    return true;
    //}
    if ($_SESSION["password"] == md5("richpatty")) {
        $_SESSION["user"] = "fix";
        return true;
    } else if ($_SESSION["password"] == md5("momanddad")) {
        $_SESSION["user"] = "hannah";
        return true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InvKeeper</title>
    
    <!--My Styles-->
    <link href="css/style.css" rel="stylesheet" />

    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/csspopup.js"></script>

    <script type="text/javascript">
        //datepicker function
         $(function() { $( "#datepicker" ).datepicker();})(); 
    </script>

</head> 
<body>
    <?php
    $p = $_SERVER['REQUEST_URI'];
    $currentPageId = 0;

      switch($p)
      {
        case "/Sites/InvKeeper/index.php":
            $p = "/Sites/InvKeeper/index.php";
            $currentPageId = 1;    
        break;

        case "/Sites/InvKeeper/categories.php":
            $p = "/Sites/InvKeeper/categories.php";
            $currentPageId = 2;    
        break;

        case "/Sites/InvKeeper/settings.php":
            $p = "/Sites/InvKeeper/settings.php";
            $currentPageId = 3;    
        break;

        case "/Sites/InvKeeper/additem.php":
            $p = "/Sites/InvKeeper/additem.php";
            $currentPageId = 4;    
        break;
      }
?>
    <div id="container"><!--Container for entire site-->
    <div id="header"><!--header div-->
        <div id="logo">
            <a href="index.php">
                <h1>Cloud Inventory</h1>
            </a>
        </div><!--close logo-->
        <!--Navigation Bar Container -->
          <div id="navigationbar">
            <ul id="navul">
              <li <?php if($currentPageId == 4) {echo 'class="navactive"';} ?>><a href="additem.php">Add Item</a></li>
              <li <?php if($currentPageId == 1) {echo 'class="navactive"';} ?>><a href="index.php">Rooms</a></li>
                <li <?php if($currentPageId == 2) {echo 'class="navactive"';} ?>><a href="categories.php">Categories</a></li>
              <li <?php if($currentPageId == 3) {echo 'class="navactive"';} ?>><a href="settings.php">Settings</a></li>

            </ul>
          </div><!--close nav bar-->
    </div><!--End header div-->
    <div id="mainContent"><!--container for main body area-->

    <?php
    //Open connection to database

    //local connection
    if ($_SESSION["user"] == "fix") {
        $con=mysqli_connect("localhost", "root", "root", "invkeeper");
    } else if ($_SESSION["user"] == "hannah") {
        $con=mysqli_connect("localhost", "root", "root", "Hannah");
    }

    //server database login: 
    /*
        if ($_SESSION["user"] = "fix") {
            $hostname = "InvKeeper.db.5567516.hostedresource.com";
            $username = "InvKeeper";
            $dbname = "InvKeeper";
            $password = "InventoryKeeper1!";
        } else if ($_SESSION["user"] = "hannah") {
            $hostname = "HannahInventory.db.5567516.hostedresource.com";
            $username = "HannahInventory";
            $dbname = "HannahInventory";
            $password = "HannahInv1!";
        }
    $con=mysqli_connect($hostname, $username, $password, $dbname);
    */

    //check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    ?>
    
