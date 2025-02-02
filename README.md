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

newest updates:
- everything transtaled into english 


structure of project:
<pre><span style="background-color:#FFFFFF"><font color="#2B2B2B">                                                                                                                                                                                                         </font></span>
project
├── app
│   ├── config (didn&apos;t used yet)
│   ├── includes
│   │   └── connect_to_database.php
│   ├── logic
│   │   ├── add_conversation.php (adding new chats)
│   │   ├── load_users.php (loading chats)
│   │   ├── login_logic.php (loging)
│   │   ├── main_logic.php (logout and checking if user is logged in)
│   │   ├── messages.js (handlig of sending and reciving messages) 
│   │   ├── messages_send.php (sending messages)
│   │   ├── messages_show_new.php (loading new resived messages)
│   │   ├── messages_show.php (loading older messages)
│   │   ├── register_logic.php (registering)
│   │   ├── select_user.php (selecting chat you want to chat in)
│   │   └── show_user.js (showing your chats)
│   └── views
│       └── main_view.php (awful fronend, will be better in future)
└── public
    ├── css (css styles)
    │   ├── style2.css
    │   ├── style.css
    │   └── test_usun_potem.html (file for testing purpuse, can be deleted)
    ├── img (images which are now used for testing)
    │   ├── 1ea6ce814fa8e3e8754ecf67e19fce33.jpg
    │   ├── 6e19c0876087c28535019531542d6c16.jpg
    │   ├── default_pfp.jpg
    │   └── hachi.jpg
    ├── index.php
    ├── login.php
    ├── register.php
    └── setting.php (there will be user settings, it&apos;s not implemented yet)
</pre>

hopes you enjoy this project!
            
