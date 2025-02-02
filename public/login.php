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
        <h2>Please log in!</h2>
        <form action="" method="post" class="form">
            <div class="form-group">
                <label for="name">user nickname::</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="password">Passord::</label>
                <input type="password" name="password" id="password" required>
            </div>
            <input type="submit" value="Log in" name="login" class="btn">
        </form>
        <a href="register.php">
            <button>You don't have account yet? Please register!</button>
        </a>
        <?php
        // error showing
        if (isset($_SESSION["error"])) {
            echo "<p style='color:red;'>" . $_SESSION["error"] . "</p>";
            unset($_SESSION["error"]);
        }
        include("../app/logic/login_logic.php");
        ?>
    </div>
</body>
</html>