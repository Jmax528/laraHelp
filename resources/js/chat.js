import './echo.js';

document.addEventListener('DOMContentLoaded', () => {


    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');
    const textarea = document.getElementById('textarea');
    const usersArea = document.getElementById('usersArea');
    const chatArea = document.getElementById('chatArea');

    /* -----------------------------
       Render existing messages
    ------------------------------ */
    if (Array.isArray(window.chatMessage)) {
        window.chatMessage.forEach(message => {
            renderMessage({
                user_id: message.user_id,
                message: message.message
            });
        });
    }

    /* -----------------------------
       Render user sidebar (ADMIN)
    ------------------------------ */
    if (Array.isArray(window.users)) {
        window.users.forEach(user => {
            const profile = createProfile(user);
            if (profile) {
                usersArea.appendChild(profile);
            }
        });
    }

    /* -----------------------------
       Create user profile
    ------------------------------ */
    function createProfile(user) {
        // if no user return it as null instead of undifined
        if (!user.chat) return null;

        const userList = document.createElement('div');
        userList.className = 'user-list-items';
        userList.dataset.chatId = user.chat.id;

        const userInfo = document.createElement('div');
        userInfo.className = 'userInfo';

        const name = document.createElement('h5');
        name.className = 'user-name';
        name.textContent = user.name;

        const email = document.createElement('h6');
        email.className = 'email';
        email.textContent = user.email;

        userInfo.appendChild(name);
        userInfo.appendChild(email);
        userList.appendChild(userInfo);

        userList.addEventListener('click', () => {
            window.location.href = `/chat/${user.chat.id}`;
        });

        return userList;
    }

    /* -----------------------------
       Render a message bubble
    ------------------------------ */
    function renderMessage(e) {
        const bubble = document.createElement('div');
        bubble.classList.add('chat-container');

        if (parseInt(e.user_id) === window.currentUserId) {
            bubble.classList.add('chat-one');
        } else {
            bubble.classList.add('chat-two');
        }

        bubble.textContent = e.message;
        chatArea.appendChild(bubble);
        chatArea.scrollTop = chatArea.scrollHeight;
    }

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

});
