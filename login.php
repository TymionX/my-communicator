<?php
session_start(); // Rozpocznij sesję
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
    <div class="container">
        <h2>Logowanie</h2>
        <form action="" method="post" class="form">
            <div class="form-group">
                <label for="name">Nazwa użytkownika:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="password">Hasło:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" value="Zaloguj się" name="login" class="btn">
        </form>
        <?php
        // Wyświetl błąd, jeśli istnieje
        if (isset($_SESSION["error"])) {
            echo "<p style='color:red;'>" . $_SESSION["error"] . "</p>";
            unset($_SESSION["error"]); // Usuń błąd po wyświetleniu
        }
        include("logic/login_logic.php");
        ?>
    </div>
</body>
</html>