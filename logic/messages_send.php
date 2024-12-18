<?php
session_start();
require_once('../includy/connect_to_database.php');

$id_rozmowy = $_SESSION['id_rozmowy'];
$id = $_SESSION['id'];

if (isset($_POST['message']) && !empty(trim($_POST['message']))) {
    $tresc = htmlspecialchars($_POST['message']); // Bezpieczne przetwarzanie danych
    $sql = "INSERT INTO messages (id_rozmowy, data, tresc, id_nadawcy) 
            VALUES ($id_rozmowy, NOW(), '$tresc', $id)";
    if ($conn->query($sql)) {
        echo 'Wiadomość została wysłana!';
    } else {
        echo 'Błąd zapisu: ' . $conn->error;
    }
} else {
    echo 'Wiadomość jest pusta!';
}
?>
