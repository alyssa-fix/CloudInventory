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

<!--Navigation Bar Container -->
<br />
  <div id="navigationbar">
    <ul id="navul">
      <li <?php if($currentPageId == 4) {echo 'class="navactive"';} ?>><a href="additem.php">Add Item</a></li>
      <li <?php if($currentPageId == 1) {echo 'class="navactive"';} ?>><a href="index.php">Rooms</a></li>
    	<li <?php if($currentPageId == 2) {echo 'class="navactive"';} ?>><a href="categories.php">Categories</a></li>
      <li <?php if($currentPageId == 3) {echo 'class="navactive"';} ?>><a href="settings.php">Settings</a></li>

    </ul>
  </div>

