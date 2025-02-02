<?php

/**
 * this file is responsible for loading new messages sended after all older messages are loaded. This is used in messages.js in load_messages_new() function 
 */
session_start();
require_once("../includes/connect_to_database.php");


$id = $_SESSION['id'];
$number = $_SESSION["number"];

$sql = "SELECT count(*) FROM messages,chats,users WHERE sender_id=users.id and messages.chat_id=chats.id and (chat_participant1_id=".$id." or chat_participant2_id =".$id.") ORDER BY date DESC";
$numbers = $conn->query($sql);
$result = $numbers->fetch_row();
$number_now = $result[0];

if($number_now>$number){
    $number = $number_now;
    $_SESSION["number"] = $number;
    $sql = "SELECT * FROM messages,chats,users WHERE sender_id=users.id and messages.chat_id=chats.id and (chat_participant1_id=".$id." or chat_participant2_id =".$id.") ORDER BY date DESC LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($_SESSION["chat_participant1_id"]==$row["sender_id"] or $_SESSION["chat_participant2_id"]==$row["sender_id"]){ 
                echo "<p><strong>".$row['name']."</strong>: ".$row["message_content"]." <sub>".$row["date"]."</sub></p>";
            }
            else{
                echo "new message in the other chat!";
            }
        }
    }
} 
?>