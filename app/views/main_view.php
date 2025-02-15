<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Moja Strona</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../app/logic/show_user.js"></script>
    <script src="../app/logic/messages.js"></script>
</head>
<body>

<header>
    <h1>header</h1>
</header>

<aside>
    <h2>
        <?php
        echo "Hello ".$_SESSION["name"];
        ?>
    </h2>
    <form id="newConvForm">
        <label>New chat:</label>
        <input type="text" name="new_conv" placeholder="Username" required>
        <input type="submit" value="Add">
    </form>

    <form action="" id="userButtons">
    </form>
    <a href="setting.php">
            <button>account settings</button>
    </a>
   
    <form action="" method="post">
        <input type="submit" value="Logout" name="logout">
    </form>
</aside>

<main>
    <section id="zkim">
  
    </section>
    <section id="chat">
        
        <div id="messages">
            <!-- sended messages are shown here-->
        </div>
        <form id="messageForm">
            <input type="text" name="message" id="messageInput" required>
            <input type="submit" value="send" id="sendButton">
        </form>
    </section>
</main>



</body>
</html>