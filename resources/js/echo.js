// // app.js
// import Echo from 'laravel-echo';
//
// // Initialize Laravel Echo for Reverb
// window.Echo = new Echo({
//     broadcaster: 'reverb',
//     key: import.meta.env.VITE_REVERB_APP_KEY,
//     host: import.meta.env.VITE_REVERB_HOST,
//     port: import.meta.env.VITE_REVERB_PORT,
//     scheme: import.meta.env.VITE_REVERB_SCHEME,
//     forceTLS: false,
//     encrypted: false,
//     disableStats: true,
// });
//
// // Optional: test connection
// window.Echo.channel('test-channel')
//     .listen('TestEvent', (event) => {
//         console.log('Reverb TestEvent received:', event);
//     });
