<?php
session_start();
require_once("../includy/connect_to_database.php");

if (isset($_POST["new_conv"])) {
    $new_conv = $conn->real_escape_string($_POST["new_conv"]);
    $userId = $_SESSION["id"];


    $sql = "SELECT id FROM users WHERE name='$new_conv' OR name='".$_SESSION["name"]."'";
    $result = $conn->query($sql);
    $ids = [];

    if ($result->num_rows == 2) {
        while ($row = $result->fetch_assoc()) {
            $ids[] = $row['id'];
        }
        $sql = "SELECT * FROM rozmowa WHERE (id_rozmowca1 = ".$ids[0]." AND id_rozmowca2 = ".$ids[1].") OR (id_rozmowca1 = ".$ids[1]." AND id_rozmowca2 = ".$ids[0].")";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO rozmowa (id_rozmowca1, id_rozmowca2) VALUES (".$ids[0].", ".$ids[1].")";
            if ($conn->query($sql) === TRUE) {
                echo "Nowa rozmowa została dodana.";
            } else {
                echo "Błąd: " . $conn->error;
            }
        } else {
            echo "Rozmowa już istnieje.";
        }
    } else {
        echo "Nie znaleziono użytkowników.";
    }
}
$conn->close();
?>