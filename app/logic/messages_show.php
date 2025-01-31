<?php
session_start();
require_once("../includes/connect_to_database.php");


$id = $_SESSION['id'];
$id2 = $_SESSION["selected_user"];
$id_rozmowy = $_SESSION["id_rozmowy"];
$sql = "SELECT count(*) FROM messages,rozmowa,users WHERE id_nadawcy=users.id and messages.id_rozmowy=rozmowa.id and (id_rozmowca1='$id' or id_rozmowca2 ='$id') ORDER BY data ASC;";
$numbers = $conn->query($sql);
$result = $numbers->fetch_row();
$_SESSION["number"]= $result[0];

$sql = "SELECT * FROM messages,rozmowa,users WHERE id_nadawcy=users.id and messages.id_rozmowy=rozmowa.id and (id_rozmowca1='$id2' or id_rozmowca2 ='$id2') ORDER BY data ASC;";
$result = $conn->query($sql);

$_SESSION["loaded"] = $result;


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) { 
            if ($row["id_rozmowy"] == $id_rozmowy){
                echo "{$id} {$id2}<p><strong>{$row['name']}</strong>: {$row['tresc']} <sub>{$row['data']}</sub></p>";
            }
    }
    //$_SESSION['id'] = null;
}
    else {
        echo "brak wiadomosci";
    }
?>