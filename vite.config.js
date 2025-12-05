import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
console.log("app.js loaded");



export default defineConfig({
    // server: {
    //     host: 'localhost',
    //     port: 8000,
    //
    // },
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
