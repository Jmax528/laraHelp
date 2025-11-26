// app.js
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

// Initialize Laravel Echo for Reverb
window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
});

window.Echo.channel('chat')
    .listen('MessageSent', (e) => {
        createNewMessage(e);
    });

function createNewMessage(e) {
    console.log(e);
    const newElement = document.createElement('div');
    newElement.classList.add('chat-container', 'chat-two');
    newElement.innerHTML = `${e.message}`;
    document.getElementById('chatArea').appendChild(newElement);
}

