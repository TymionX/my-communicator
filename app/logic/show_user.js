$(document).ready(function() {
    
    function loadUsers() {
        $.ajax({
            url: '../app/logic/load_users.php', 
            method: 'POST',
            success: function(data) {
                $('#userButtons').html(data);
            }
        });
    }
    loadUsers();

    // Obsługa dodawania nowej rozmowy
    $('#newConvForm').on('submit', function(e) {
        e.preventDefault(); // Zatrzymaj domyślne działanie formularza
        $.ajax({
            url: '../app/logic/add_conversation.php', // Plik PHP do dodawania rozmowy
            method: 'POST',
            data: $(this).serialize(),
            success: function() {
                loadUsers(); // Przeładuj użytkowników
            }
        });
    });

    // Obsługa wyboru użytkownika
    $(document).on('click', '.user-button', function(e) {
        e.preventDefault();
        const element = document.getElementById('messageForm');
        element.style.display = 'block';
        var userId = $(this).val();
        console.log(userId);
        $.post('../app/logic/select_user.php', { user: userId }, function(data) {
            $('#zkim').html(data); 
        });
    });
})