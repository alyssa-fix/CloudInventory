<?php session_start(); ?>
    <?php
    //Open connection to database
    if ($_SESSION["user"] == "fix") {
        $con=mysqli_connect("localhost", "root", "root", "invkeeper");
    } else if ($_SESSION["user"] == "hannah") {
        $con=mysqli_connect("localhost", "root", "root", "Hannah");
    }

    //server database login: 
    /*
        if ($_SESSION["user"] = ="fix") {
            $hostname = "InvKeeper.db.5567516.hostedresource.com";
            $username = "InvKeeper";
            $dbname = "InvKeeper";
            $password = "InventoryKeeper1!";
        } else if ($_SESSION["user"] == "hannah") {
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
    };
    ?>