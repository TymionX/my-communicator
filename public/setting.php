<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
    border-collapse: collapse;
    border: 1px solid black;
    padding: 5px;
}
    </style>    
</head>
<body>
    <?php
    session_start();
    require_once("../app/includes/connect_to_database.php");

    $sql = "SELECT * FROM users WHERE id={$_SESSION["id"]}";
    $result = $conn->query($sql);

    if ($result === false) {
        echo "Błąd zapytania: " . $conn->error;
        exit;
    }

    // Przechowujemy wyniki w tablicy
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<table>
        <tr>
          <th>Nick:</th>
          <th>Password</th>
          <th>profile-pic</th>
        </tr>
        <tr>
          <td>{$row['name']}</td>
          <td>***** T**** (;</td>
          <td><img src='img/{$row['profile_picture']}' alt='{$row['profile_picture']}' height='150'></td>
        </tr>
        <tr>
          <td><form action='' method='post'>
        <label for='nick'>nowy nick:</label>
        <input type='text' id='nick' name='nick' required>
        <input type='submit' value='submit'>
    </form></td>
          <td><form action='' method='post'>
        <label for='nick'>nowe hasło:</label>
        <input type='password' id='haslo' name='haslo' required>
        <input type='submit' value='submit'>
    </form></td>
        </tr>
      </table>";}
    ?>
    <a href="index.php">
            <button>powrót</button>
    </a>
    
</body>
</html>