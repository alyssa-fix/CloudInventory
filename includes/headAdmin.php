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
      
// ***** LOGIN INFORMATION REMOVED FOR SECURITY PURPOSES *****

    //server database login: 
    
// ***** LOGIN INFORMATION REMOVED FOR SECURITY PURPOSES *****
      
        }
    //$con=mysqli_connect($hostname, $username, $password, $dbname);

    //check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    ?>
    
