<?php
require_once("../includy/connect_to_database.php");
session_start();

$id = $_SESSION["id"];
$sql = "SELECT u.name, u.id FROM users u JOIN rozmowa r ON u.id = r.id_rozmowca1 OR u.id = r.id_rozmowca2 WHERE (r.id_rozmowca1 = ".$id." OR r.id_rozmowca2 = ".$id.") AND u.id !=".$id.";";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<button type='button' class='user-button' value='" . $row['id'] . "' style='display: block; width: 100%; margin: 5px 0; background-color: #ff5722; color: white; border: none; padding: 10px; cursor: pointer;'>" . $row['name'] . "</button>";
    }
} else {
    echo "Brak użytkowników do wyświetlenia.";
}
$conn->close();
?>