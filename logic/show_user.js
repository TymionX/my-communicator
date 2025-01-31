$(document).ready(function() {
    // Funkcja do ładowania użytkowników
    function loadUsers() {
        $.ajax({
            url: 'logic/load_users.php', // Plik PHP do ładowania użytkowników
            method: 'POST',
            success: function(data) {
                $('#userButtons').html(data);
            }
        });
    }

    // Ładowanie użytkowników przy starcie
    loadUsers();

    // Obsługa dodawania nowej rozmowy
    $('#newConvForm').on('submit', function(e) {
        e.preventDefault(); // Zatrzymaj domyślne działanie formularza
        $.ajax({
            url: 'logic/add_conversation.php', // Plik PHP do dodawania rozmowy
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
        $.post('logic/select_user.php', { user: userId }, function(data) {
            $('#zkim').html(data); // Wyświetl wybranego użytkownika
        });
    });
})