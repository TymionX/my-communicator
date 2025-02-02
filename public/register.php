<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<div class="container">
    <form action="" method="post" class="form">
            <div class="form-group">
                <label for="name">Nickname:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
        <input type="submit" value="Log in" name="submit">
    </form>

        <a href="login.php">
            <button>If you have account already, please log in!</button>
        </a>
   
    <?php
    include("../app/logic/register_logic.php");
    ?>
    </div>s

</body>
</html>
<?php
session_start(); 
?>

