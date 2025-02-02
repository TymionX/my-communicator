<?php
/**
 * this is main logic of website, which don't allow you to enter communicator if you are not logged in
 */
session_start(); // Rozpocznij sesję
// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION["logged"]) OR $_SESSION["logged"] !== true) {
    $_SESSION["error"] = "You can't use this servise without loging in";
    header("Location: login.php"); // Przekierowanie do strony logowania
    exit; // Zatrzymaj dalsze wykonywanie skryptu
}



/**
 * and this is logout function
 */


if(isset($_POST["logout"])){
    session_destroy();
    header("Location: login.php");
    $conn->close();
}



?>