<?php
session_start();
require_once('../includy/connect_to_database.php');


$id = $_SESSION['id'];
$number = $_SESSION["number"];

$sql = "SELECT count(*) FROM messages,rozmowa,users WHERE id_nadawcy=users.id and messages.id_rozmowy=rozmowa.id and (id_rozmowca1=".$id." or id_rozmowca2 =".$id.") ORDER BY data DESC";
$numbers = $conn->query($sql);
$result = $numbers->fetch_row();
$number_now = $result[0];

if($number_now>$number){
    $number = $number_now;
    $_SESSION["number"] = $number;
    $sql = "SELECT * FROM messages,rozmowa,users WHERE id_nadawcy=users.id and messages.id_rozmowy=rozmowa.id and (id_rozmowca1=".$id." or id_rozmowca2 =".$id.") ORDER BY data DESC LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($_SESSION["id_rozmowca1"]==$row["id_nadawcy"] or $_SESSION["id_rozmowca2"]==$row["id_nadawcy"]){ 
                echo $_SESSION["id_rozmowy"]." $id <p><strong>".$row['name']."</strong>: ".$row["tresc"]." <sub>".$row["data"]."</sub></p>";
            }
            else{
                echo "nowa wiadomość w innym chatcie";
            }
        }
    }
    else {
        echo "brak wiadomosci";
    }
} 
?>