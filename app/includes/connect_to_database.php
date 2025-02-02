<?php
    /** 
      * this file is responsible for connecting to database. You should change data here to ensure its works with your database server. Using of XAMPP is recondement but any server which supports MariaDB or MySQL should work.

      *first 2 lines are to ensure all errors are displaing, I had to add it here for this file is included in almost every other file of this project, to avoid error code 500  
    */
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "test";
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>
