// app.js
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

// -----------------------------
// Initialize Echo (Reverb)
// -----------------------------
window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

// Chat Listener, it must be MessageSent, no .message.sent or live will stop working
if (window.chatId) {
    window.Echo.private(`chat.${window.chatId}`)
        .listen('MessageSent', (e) => {
            createMessage(e);
        });

    // Render existing messages if any
    if (Array.isArray(window.chatMessage)) {
        window.chatMessage.forEach(message => {
            createMessage({
                user_id: message.user_id,
                message: message.message,
            });
        });
    }
} else {
    console.warn("ChatId not found, live messaging will not work.");
}

// Render chat messages
export function createMessage(e) {
    const chatArea = document.getElementById('chatArea');
    if (!chatArea) return;

    const messageBox = document.createElement('div');

    // Remove placeholder if exists
    const placeholder = document.getElementById('chatPlaceholder');
    if (placeholder) placeholder.remove();

    // Message bubble classes
    messageBox.classList.add('chat-container');
    if (!e.user_id) {
        messageBox.classList.add('system-message'); // System message
    } else {
        const userId = parseInt(e.user_id);
        if (userId === currentUserId) {
            messageBox.classList.add('chat-one'); // sender
        } else {
            messageBox.classList.add('chat-two'); // receiver
        }
    }

    // Message text
    messageBox.textContent = e.message;
    chatArea.appendChild(messageBox);

    // Scroll to bottom
    chatArea.scrollTop = chatArea.scrollHeight;
}

