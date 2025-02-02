<?php
/**
 * this file is responsible for sending messages to other users. It work by adding them to database. chat_id is id of particular convertation message belongs to, data is time when messages was sended, message_content is what is in the message and sender_id is id of user who sended the message.
 * this is used in messages.js
 */
session_start();
require_once("../includes/connect_to_database.php");

$chat_id = $_SESSION['chat_id'];
$id = $_SESSION['id'];

if (isset($_POST['message']) && !empty(trim($_POST['message']))) {
    $message_content = htmlspecialchars($_POST['message']); 
    $sql = "INSERT INTO messages (chat_id, date, message_content, sender_id) 
            VALUES ($chat_id, NOW(), '$message_content', $id)";
    if ($conn->query($sql)) {
        echo 'Message sended succesfully';
    } else {
        echo 'Write error ' . $conn->error;
    }
} else {
    echo 'Messages cannot be empty';
}
?>
