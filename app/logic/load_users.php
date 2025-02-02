<?php
/**
 * this file is responsible for loading list of chats user added or is added to by other users. 
 */
require_once("../includes/connect_to_database.php");
session_start();

$id = $_SESSION["id"];
$sql = "SELECT u.name, u.id FROM users u JOIN chats r ON u.id = r.chat_participant1_id OR u.id = r.chat_participant2_id WHERE (r.chat_participant1_id = ".$id." OR r.chat_participant2_id = ".$id.") AND u.id !=".$id.";";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<button value='{$row['id']}' class='user-button'>
        <img class='profile-pic' src='./img/default' height=50px alt='Profile Picture'>
        <div class='user-info'>
            <p class='user-name'>{$row['name']}</p>
            <p class='last-message'>to add later</p>
        </div>
    </button>";
    }
} else {
    echo "There is not chats to show. Please add this by providing nickname of user you want to chat with";
}
$conn->close();
?>