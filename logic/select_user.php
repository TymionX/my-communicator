<?php
session_start();
require_once("../includy/connect_to_database.php");

if (isset($_POST["user"])) {
    $id2 = $_POST["user"];
    $_SESSION["selected_user"] = $id2; // Przechowaj wybranego użytkownika w sesji

    $id = $_SESSION["id"];
    $sql = "SELECT users.name, rozmowa.id FROM rozmowa, users WHERE (rozmowa.id_rozmowca1 = users.id OR rozmowa.id_rozmowca2 = users.id) AND (id_rozmowca1 = ".$id." OR id_rozmowca2 = ".$id.") AND (id_rozmowca1 = ".$id2." OR id_rozmowca2 = ".$id2.") AND name != '".$_SESSION["name"]."';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["chat"] = $row['name'];
            $_SESSION["id_rozmowy"] = $row['id'];
            echo "Rozmowa z: " . $row['name']. " id rozmowy to: " . $row['id'];
            $_SESSION["id_rozmowy"] = $row["id"];
        }
    } else {
        echo "Brak wybranego użytkownika";
    }
}
$conn->close();
?>