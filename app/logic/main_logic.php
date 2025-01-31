<?php
session_start(); // Rozpocznij sesję
// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION["logged"]) OR $_SESSION["logged"] !== true) {
    $_SESSION["error"] = "byłem tu";
    header("Location: login.php"); // Przekierowanie do strony logowania
    exit; // Zatrzymaj dalsze wykonywanie skryptu
}

require_once("../app/includes/connect_to_database.php");



if(isset($_POST["add"])){
    $sql = "SELECT id FROM users WHERE name='".$_POST["new_conv"]."' OR name='".$_SESSION["name"]."'";
    $result = $conn->query($sql);
    $ids= [];
    if ($result->num_rows == 2) {
        while ($row = $result->fetch_assoc()) {
            $ids[] = $row['id'];
        }
        $sql = "SELECT * FROM rozmowa WHERE (id_rozmowca1 = ".$ids[0]." AND id_rozmowca2 = ".$ids[1].") OR (id_rozmowca1 = ".$ids[1]." AND id_rozmowca2 = ".$ids[0].")";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO rozmowa (id_rozmowca1, id_rozmowca2) VALUES (".$ids[0].", ".$ids[1].")";
            if ($conn->query($sql) === TRUE) {
                $message = "Nowa rozmowa została dodana.";
            } else {
                $message = "Błąd: " . $conn->error;
            }
        } else {
            $message = "Rozmowa już istnieje.";
        }
    } else {
        $message = "Nie znaleziono użytkowników.";
    }
}
if(isset($_POST["logout"])){
    session_destroy();
    header("Location: login.php");
    $conn->close();
}



?>