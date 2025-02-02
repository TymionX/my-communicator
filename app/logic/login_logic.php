<?php
/**
 * this file is responsible for login in users and saving user data needed in other parts of project in session
 */
if (isset($_POST["login"])) {
    require_once("../app/includes/connect_to_database.php");

    // Użyj funkcji mysqli_real_escape_string, aby zabezpieczyć dane przed SQL Injection
    $name = $conn->real_escape_string($_POST["name"]);
    $password = $conn->real_escape_string($_POST["password"]);

    $sql = "SELECT * FROM users WHERE name='$name' AND password='$password'";
    $result = $conn->query($sql);

    // Sprawdź, czy zapytanie się powiodło
    if ($result === false) {
        echo "Błąd zapytania: " . $conn->error;
        exit;
    }

    // Przechowujemy wyniki w tablicy
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["logged"] = true;
        $_SESSION["name"] = $name;
        $_SESSION["id"] = $row["id"];
        header("Location: index.php");
        exit;
    } else {
        echo "Error. Password or nickname incorrect";
    }
}
?>