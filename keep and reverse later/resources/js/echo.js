// app.js
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});


//check if there's a chatId, listen if a message is being sent
if (!window.chatId) {
    console.warn("ChatId not found, live messaging will not work.");
} else {
    window.Echo.private(`chat.${window.chatId}`)
        .listen('MessageSent', (e) => {
            createMessage(e);
        });

    if (Array.isArray(window.chatMessage)) {
        window.chatMessage.forEach(message => {
            createMessage({
                user_id: message.user_id, message: message.message,
            });
        });
    }
}


//delete placeholders if the chatArea and messageBox aren't empty
function createMessage(e) {
    const chatArea = document.getElementById('chatArea');
    const messageBox = document.createElement('div');

    const placeholder = document.getElementById('chatPlaceholder');
    if (placeholder) {
        placeholder.remove();
    }


    // Same class applied to both
    messageBox.classList.add('chat-container');

    const userId = parseInt(e.user_id);
    // Sender side = green bubble
    if (userId === currentUserId) {
        messageBox.classList.add('chat-one');
    } else {
        // Receiver side = orange bubble
        messageBox.classList.add('chat-two');
    }

    const userName = document.createElement('div');
    userName.classList.add('chat-name');
    messageBox.appendChild(userName);


    messageBox.textContent = e.message;
    chatArea.appendChild(messageBox);
    chatArea.scrollTop = chatArea.scrollHeight;

}
