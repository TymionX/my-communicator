<?php
session_start();
require_once("../includes/connect_to_database.php");

if (isset($_POST["user"])) {
    $id2 = $_POST["user"];
    $_SESSION["selected_user"] = $id2; // Przechowaj wybranego użytkownika w sesji

    $id = $_SESSION["id"];
    $sql = "SELECT users.name, chats.id, chats.chat_participant1_id, chats.chat_participant2_id 
    FROM chats, users 
    WHERE (chats.chat_participant1_id = users.id OR chats.chat_participant2_id = users.id) 
    AND (chat_participant1_id = $id OR chat_participant2_id = $id) 
    AND (chat_participant1_id = $id2 OR chat_participant2_id = $id2) 
    AND name != '{$_SESSION["name"]}';"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION["chat"] = $row['name'];
            $_SESSION["chat_id"] = $row['id'];
            echo "You're chatting with: " . $row['name']. " The chat id is: " . $row['id'];
            $_SESSION["chat_participant1_id"] = $row["chat_participant1_id"];
            $_SESSION["chat_participant2_id"] = $row["chat_participant2_id"];
        }
    } else {
        echo "Please choose chat";
    }
}
$conn->close();
?>