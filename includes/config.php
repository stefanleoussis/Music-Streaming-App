<?php
    ob_start(); // turns on output buffering. Look up for more information

    $timezone = date_default_timezone_set("Europe/Berlin");

    $con = mysqli_connect("localhost", "root", "", "slotify"); // (Server Name, Username, Password, Database Name)

    if(mysqli_connect_errno()) { // Connects to our mySql database
        echo "Failed to connect: " . mysqli_connect_errno(); 
    }

?>