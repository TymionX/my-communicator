<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name"><br>
        <input type="password" name="password">
        <input type="submit" value="zarejestruj sie" name="submit">
    </form>
    <?php
    include("logic/register_logic.php");
    ?>
</body>
</html>