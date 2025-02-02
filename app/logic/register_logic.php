<?php
if(isset($_POST["submit"])){
    require_once("../app/includes/connect_to_database.php");
    $sql = "SELECT * FROM users WHERE name='".$_POST["name"]."'";
    $result = $conn->query($sql);

    // Przechowujemy wyniki w tablicy
    $users = [];
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO users (name, password) VALUES ('".$_POST["name"]."', '".$_POST["password"]."')";
        $result = $conn->query($sql);
        if ($result) {
            echo "User was added succesfully";
        }
        else {
            echo "error, user was not added. Probably problem with database";
        }
    
        
    }
    else{
        echo "User with thss nickname already exist. Please use another nickname";
    }
    }
    ?>
