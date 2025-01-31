# my-communicator
this is veryyyyy early version

hey, this is my communicator, i didn't name it yet. I'm doing it as a school project, and hope you like it!
Password are not being hashed yet because if I forgot password for test users i have for testing purpues I can check it in database, in the final version I will add it.
Messages probably wont be encrypted for in structure this project has, admin hosting it would have access to keys and stuff anyway (but maybe there's way around it, i'm don't know much about it)
Frontend looks bad because I will make it look good when all planned features are added.
Planned features are:
Personalizeing user's profile
Sending files
deleting and editing sended messages
notifications 

Plausibe features are:
Personalizing chat's look
group's chats

<textarea>structure of project:
├───app (stuff that user shouldn't have access to)
│   ├───config (empty folder yet to be used)
│   ├───includes
│   │       connect_to_database.php (script which allow you to connect to database)
│   │
│   ├───logic
│   │       add_conversation.php (script for adding new chats with new users)
│   │       load_users.php (script which load your chats)
│   │       login_logic.php (script which allow you to login)
│   │       main_logic.php (script which allow y... wait, i just realized it's the propably same as add_conversation.php, will fix it later xD)
│   │       messages.js (js script which makes use of 3 scripts below)
│   │       messages_send.php (sending messages)
│   │       messages_show.php (showing messages)
│   │       messages_show_new.php (showing new messages dynamically) 
│   │       register_logic.php (script which allow you to register)
│   │       select_user.php (script for chosing which chat you are chatting on)
│   │       show_user.js (showing user after load_users.php loads them)
│   │
│   └───views
│           main_view.php (awful frontend)
│
└───public
    │   index.php (main_view.php and main_logic.php connected)
    │   login.php (login)
    │   register.php (register)
    │   setting.php (user setting, didn't finnished yet)
    │
    ├───css (just folder with css and html file to delete later)
    │      
    │
    └───img (folder which will be moved to /app later, there will be saved profile pictures of users)
    </textarea>

hopes you enjoy this project!
            
