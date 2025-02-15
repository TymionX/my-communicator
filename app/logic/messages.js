$(document).ready(function(e) {
    
    /**
     * this fragment of code is responsible for sendind messages using messahes_send.php
     */
    $('#messageForm').on('submit', function(e) {
        e.preventDefault();
        var message = $('#messageInput').val(); // get value of message
    
        if (message.trim() !== '') {
            $.ajax({
                url: '../app/logic/messages_send.php',
                method: 'POST',
                data: { message: htmlspecialchars(message) }, 
                success: function(response) {
                    console.log('Serwer odpowiedział:', response);
                    load_messages_new()
                },
                error: function(xhr, status, error) {
                    console.error('Błąd:', error);
                }
            });
        } else {
            console.log('message cannot be empty');
        }
    });
    /**
     * this fragment of code is responsible for loading messages after choosing chat usign load_messages() function and checking if new messages were sended every second using load_messages_new() function. 
     */
    $('#userButtons').on('click', function(e) {
        setTimeout(() => {
            e.preventDefault();
            load_messages();
            setInterval(load_messages_new, 1000);
        }, 500)
    });
    
    

 /** 
     * Function for securing from XSS attack.
    */ 
    function htmlspecialchars(string) {
        return string
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }
    /**
     * function for loading and showing previously sended messages. It's using messages_show.php to take those messages from database and then show them using append() function.
     */
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
    /**
     * this function is very similar to load_messages() one but it's function is different. It's used for loa
     */
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
