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

// -----------------------------
// Chat Listener
// -----------------------------
if (window.chatId) {
    window.Echo.private(`chat.${window.chatId}`)
        .listen('.message.sent', (e) => {
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

// -----------------------------
// Admin Notifications (Persistent Glow)
// -----------------------------
if (window.isAdmin) {
    window.Echo.private(`admin.notification`)
        .listen('.message.sent', (e) => {
            console.log("Admin notification received:", e);
            updateAdminCounter(e);
        });
}

// Apply persistent glow on page load
document.addEventListener('DOMContentLoaded', () => {
    const notifications = document.querySelectorAll('.user-list-item .notification-count');
    notifications.forEach(notif => {
        const userItem = notif.closest('.user-list-item');
        const count = parseInt(notif.dataset.unreadCount, 10) || 0;

        if (count > 0) {
            notif.classList.add('notif-glow');
            userItem.classList.add('notification');
        } else {
            notif.classList.remove('notif-glow');
            userItem.classList.remove('notification');
        }
    });
});

// -----------------------------
// Functions
// -----------------------------

// Render chat messages
function createMessage(e) {
    const chatArea = document.getElementById('chatArea');
    if (!chatArea) return;

    const messageBox = document.createElement('div');

    // Remove placeholder if exists
    const placeholder = document.getElementById('chatPlaceholder');
    if (placeholder) placeholder.remove();

    // Message bubble classes
    messageBox.classList.add('chat-container');
    const userId = parseInt(e.user_id);
    if (userId === currentUserId) {
        messageBox.classList.add('chat-one'); // sender
    } else {
        messageBox.classList.add('chat-two'); // receiver
    }

    // User name element (optional)
    const userName = document.createElement('div');
    userName.classList.add('chat-name');
    messageBox.appendChild(userName);

    // Message text
    messageBox.textContent = e.message;
    chatArea.appendChild(messageBox);

    // Scroll to bottom
    chatArea.scrollTop = chatArea.scrollHeight;
}

// Update admin notification counter and glow
function updateAdminCounter(e) {
    const userItem = document.querySelector(`.user-list-item[data-chat-id="${e.chat_id}"]`);
    if (!userItem) return;

    const notif = userItem.querySelector('.notification-count');
    if (!notif) return;

    const count = parseInt(e.unread_count, 10) || 0;

    // Update text
    notif.textContent = count > 99 ? '99+' : count.toString();

    // Update dataset for persistence
    notif.dataset.unreadCount = count;

    // Apply or remove glow
    if (count > 0) {
        notif.classList.add('notif-glow');
        userItem.classList.add('notification');
    } else {
        notif.classList.remove('notif-glow');
        userItem.classList.remove('notification');
    }
}

// Optional: show delete request in chat
function deleteRequest() {
    const deleteRequest = document.getElementById('deleteRequest');
    const deleteNotif = document.querySelectorAll('.user-list-item');
    const chatArea = document.getElementById('chatArea');
    if (!deleteRequest || !chatArea) return;

    const messageBox = document.createElement('div');

    deleteNotif.forEach(notif => {
        notif.classList.add('chat-delete', 'chat-two');
    });

    messageBox.classList.add('chat-delete');
    messageBox.textContent = 'De gebruiker zou graag de chat willen beeindigen';
    chatArea.appendChild(messageBox);

    console.log("deleteRequest displayed");
}
