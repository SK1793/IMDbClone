import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import liveReload from 'vite-plugin-live-reload'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css','public/js/app.js','public/css/app.css', 'resources/js/app.js'],
            refresh: true,
        })
    ],
});



