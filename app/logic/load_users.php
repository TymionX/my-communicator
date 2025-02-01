<?php
require_once("../includes/connect_to_database.php");
session_start();

$id = $_SESSION["id"];
$sql = "SELECT u.name, u.id, FROM users u JOIN rozmowa r ON u.id = r.id_rozmowca1 OR u.id = r.id_rozmowca2 WHERE (r.id_rozmowca1 = ".$id." OR r.id_rozmowca2 = ".$id.") AND u.id !=".$id.";";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<button value='{$row['id']}' class='user-button'>
        <img class='profile-pic' src='./img/default' height=50px alt='Profile Picture'>
        <div class='user-info'>
            <p class='user-name'>{$row['name']}</p>
            <p class='last-message'>dodaj tu potem to</p>
        </div>
    </button>";
    }
} else {
    echo "Brak użytkowników do wyświetlenia.";
}
$conn->close();
?>