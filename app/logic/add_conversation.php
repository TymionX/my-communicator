<?php
/**
 * this file is responsible for adding new chats with other users after using "Nowa chats" functionality
 */
session_start();
require_once("../includes/connect_to_database.php");

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
        $sql = "SELECT * FROM chats WHERE (chat_participant1_id = ".$ids[0]." AND chat_participant2_id = ".$ids[1].") OR (chat_participant1_id = ".$ids[1]." AND chat_participant2_id = ".$ids[0].")";
        $result = $conn->query($sql);
        if ($result->num_rows == 0) {
            $sql = "INSERT INTO chats (chat_participant1_id, chat_participant2_id) VALUES (".$ids[0].", ".$ids[1].")";
            if ($conn->query($sql) === TRUE) {
                echo "New chat added succesfully";
            } else {
                echo "Błąd: " . $conn->error;
            }
        } else {
            echo "You already have chat with this user";
        }
    } else {
        echo "User was not found";
    }
}
$conn->close();
?> 