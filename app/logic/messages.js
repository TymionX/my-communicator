$(document).ready(function(e) {
    

    //load_messages()
    //setInterval(load_messages_new, 1000);
    $('#messageForm').on('submit', function(e) {
        e.preventDefault();
        var message = $('#messageInput').val(); // Pobiera wartość wiadomości
    
        if (message.trim() !== '') {
            $.ajax({
                url: '../app/logic/messages_send.php',
                method: 'POST',
                data: { message: htmlspecialchars(message) }, // Klucz 'message' odpowiada nazwie w PHP
                success: function(response) {
                    console.log('Serwer odpowiedział:', response);
                    load_messages_new()
                },
                error: function(xhr, status, error) {
                    console.error('Błąd:', error);
                }
            });
        } else {
            console.log('Wiadomość jest pusta!');
        }
    });
    $('#userButtons').on('click', function(e) {
        setTimeout(() => {
            e.preventDefault();
            load_messages();
            setInterval(load_messages_new, 1000);
        }, 500)
    });
    
    


    // Funkcja do zabezpieczenia przed XSS
    function htmlspecialchars(string) {
        return string
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }
    function load_messages(){
        $.ajax({
            url: '../app/logic/messages_show.php', // Plik PHP do ładowania użytkowników
            method: 'POST',
            success: function(data) {
                console.log(data);
                let div = document.getElementById("messages"); // Zmień na właściwy ID
                div.innerHTML = ""; 
                $('#messages').append(data);
            }});
    }
    function load_messages_new(){
        $.ajax({
            url: '../app/logic/messages_show_new.php', // Plik PHP do ładowania użytkowników
            method: 'POST',
            success: function(data) {
                if(data!==''){
                    console.log(data);
                    $('#messages').append(data);
                
                    const container = document.getElementById("messages");
                    container.scrollTop = container.scrollHeight; // Przewija na dół kontenera
                }
            }});
    }
});
