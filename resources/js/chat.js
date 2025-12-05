import './echo.js';

document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById('textarea');
    const chatArea = document.getElementById('chatArea');
    const sendBtn = document.getElementById('sendBtn');
    const sendMessage = document.getElementById('sentMessageForm');

    // --- Broadcast listener for other users ---
    window.Echo.private(`chat.${chatId}`)
        .listen('MessageSent', (event) => {
            // Don't re-add your own message
            if (event.user_id !== currentUserId) {
                receivedMessage(event.message, event.user_name);
            }
        });

    // --- Submit message ---
    sendMessage.addEventListener('submit', function (e) {
        e.preventDefault();

        const textMessage = textarea.value.trim();
        if (!textMessage) return;

        addUserMessage(textMessage); // show your message immediately

        const formData = new FormData(this);
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
            .then(r => r.json())
            .then(data => console.log('Success:', data))
            .catch(err => console.error(err));

        textarea.value = '';
    });

    // --- Click and Enter key ---
    sendBtn.addEventListener('click', () => sendMessage.requestSubmit());

    document.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage.requestSubmit();
        }
    });

    // --- Add your own message ---
    function addUserMessage(text) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('chat-container', 'chat-one'); // right side
        messageDiv.textContent = text;
        chatArea.appendChild(messageDiv);
        scrollToBottom();
    }

    window.Echo.private(`chat.${chatId}`)
        .listen('MessageSent', (e) => {
            createNewMessageTwo(e);
        });


    function createNewMessageTwo(event) {
        const chatArea = document.getElementById('chatArea');
        const messageBox = document.createElement('div');
        messageBox.classList.add('chat-container', 'chat-two'); // message from others
        messageBox.textContent = event.message;
        chatArea.appendChild(messageBox);
        chatArea.scrollTop = chatArea.scrollHeight;
    }



    // --- Auto scroll ---
    function scrollToBottom() {
        chatArea.scrollTop = chatArea.scrollHeight;
    }
});
