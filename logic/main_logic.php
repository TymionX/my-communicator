<?php
session_start(); // Rozpocznij sesję
$is_chat_on = false; // Dodaj tę linię na początku pliku
// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION["logged"]) OR $_SESSION["logged"] !== true) {
    $_SESSION["error"] = "byłem tu";
    header("Location: login.php"); // Przekierowanie do strony logowania
    exit; // Zatrzymaj dalsze wykonywanie skryptu
}

require_once("includy/connect_to_database.php");

$name = $_SESSION["name"];
$id = $_SESSION["id"];
$sql = "SELECT u.name,u.id FROM users u JOIN rozmowa r ON u.id = r.id_rozmowca1 OR u.id = r.id_rozmowca2 WHERE (r.id_rozmowca1 = ".$id." OR r.id_rozmowca2 = ".$id.") AND u.id !=".$id.";";
$result = $conn->query($sql);

// Przechowujemy wyniki w tablicy
$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = ['name' => $row['name'], 'id' => $row['id']];
    }
}

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
if(isset($_POST["user"])){
    $id2 = $_POST["user"];
    $_SESSION["selected_user"] = $id2; // Przechowaj wybranego użytkownika w sesji
    $sql = "SELECT name FROM rozmowa,users WHERE (rozmowa.id_rozmowca1=users.id or rozmowa.id_rozmowca2=users.id) and (id_rozmowca1=".$id." or id_rozmowca2=".$id.") and (id_rozmowca1=".$id2." or id_rozmowca2=".$id2.") and name!='".$name."';";
    $result = $conn->query($sql);

    $info = "";
    $chat_user = "";
    $is_chat_on = false;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["chat"] = $row['name'];
            $is_chat_on = true;
            $chat_user = $row['name'];
        }
    } 
} else {
    $info = "Brak wybranego użytkownika";
}
if (isset($_POST["send"])) {
    if (isset($_SESSION["selected_user"]) && !empty($_POST["message"])) {
        $message = $_POST["message"];
        $chat_user_id = $_SESSION["selected_user"]; // ID wybranego użytkownika

        // Tutaj możesz dodać kod do zapisania wiadomości w bazie danych
        // Na przykład:
        // $sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (".$_SESSION["id"].", ".$chat_user_id.", '".$conn->real_escape_string($message)."')";
        // if ($conn->query($sql) === TRUE) {
        //     echo "Wiadomość została wysłana.";
        // } else {
        //     echo "Błąd: " . $conn->error;
        // }
    } else {
        echo "Brak wybranego użytkownika lub wiadomość jest pusta.";
    }
}

?>