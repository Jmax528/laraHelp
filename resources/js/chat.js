import './echo.js';

document.addEventListener("DOMContentLoaded", () => {

    /* ----------------------------
       ELEMENTS
    ----------------------------- */
    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');
    const textarea = document.getElementById('textarea');
    const usersArea = document.getElementById('usersArea');

    textarea.value = '';

    /* ----------------------------
       SEND MESSAGE
    ----------------------------- */
    sendMessage.addEventListener('submit', function (e) {
        e.preventDefault();

        if (!textarea.value.trim()) return;

        fetch(this.action, {
            method: 'POST',
            body: new FormData(this),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        });

        textarea.value = '';
    });

    sendBtn.addEventListener('click', e => {
        e.preventDefault();
        sendMessage.requestSubmit();
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage.requestSubmit();
        }
    });

    /* ----------------------------
       RENDER USERS (ADMIN PANEL)
    ----------------------------- */
    if (window.users && usersArea) {
        window.users.forEach(user => {
            usersArea.appendChild(createProfile(user));
        });
    }

    function createProfile(user) {
        const userList = document.createElement('div');
        userList.className = 'user-list-items';
        userList.dataset.chatId = user.chat?.id ?? '';
        if (!user.chat) return;


        const userInfo = document.createElement('div');
        userInfo.className = 'userInfo';

        const onderwerp = document.createElement('h5');
        onderwerp.className = 'user-name';
        onderwerp.textContent = user.name;

        const userName = document.createElement('h6');
        userName.className = 'email';
        userName.textContent = user.email;

        userInfo.appendChild(onderwerp);
        userInfo.appendChild(userName);
        userList.appendChild(userInfo);

        userList.addEventListener('click', () => {
            if (!user.chat?.id) {
                alert('Geen chat gevonden bij deze gebruiker.');
                return;
            }
            window.location.href = `/chat/${user.chat.id}`;
        });


        return userList;
    }

});
