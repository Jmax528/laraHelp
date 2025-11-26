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

// Optional: test connection
// window.Echo.channel('test-channel')
//     .listen('TestEvent', (event) => {
//         console.log('Reverb TestEvent received:', event);
//     });


window.Echo.channel('chat')
    .listen('MessageSent', (e) => {
        console.log('Reverb MessageSent received:', e);
        createNewMessage(e);
    });

function createNewMessage(e) {
    console.log(e);
    const newElement = document.createElement('div');
    newElement.classList.add('w-full', 'mb-1');
    newElement.innerHTML = `
        <p class="text-amber-50 w-1/2 bg-gray-700 p-1.5 rounded">
            <br>
            ${e.message}
        </p>
    `;
    document.getElementById('chatArea').appendChild(newElement);
}

