<?php
/**
 * this function is responsible for loading messages after entering the chat. This is used in messages.js in load_messages() function.
 */
session_start();
require_once("../includes/connect_to_database.php");


$id = $_SESSION['id'];
$id2 = $_SESSION["selected_user"];
$chat_id = $_SESSION["chat_id"];
$sql = "SELECT count(*) FROM messages,chats,users WHERE sender_id=users.id and messages.chat_id=chats.id and (chat_participant1_id='$id' or chat_participant2_id ='$id') ORDER BY date ASC;";
$numbers = $conn->query($sql);
$result = $numbers->fetch_row();
$_SESSION["number"]= $result[0];

$sql = "SELECT * FROM messages,chats,users WHERE sender_id=users.id and messages.chat_id=chats.id and (chat_participant1_id='$id2' or chat_participant2_id ='$id2') ORDER BY date ASC;";
$result = $conn->query($sql);

$_SESSION["loaded"] = $result;


    if ($result->num_rows > 0) {
        // output date of each row
        while($row = $result->fetch_assoc()) { 
            if ($row["chat_id"] == $chat_id){
                echo "<p><strong>{$row['name']}</strong>: {$row['message_content']} <sub>{$row['date']}</sub></p>";
            }
    }
    //$_SESSION['id'] = null;
}
    else {
        echo "there's no messages yet";
    }
?>