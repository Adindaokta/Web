// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // INI ADALAH ENTRY POINT YANG BENAR UNTUK LARAVEL
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // HAPUS SEMUA: blok 'css' { postcss: { plugins: [...] } }
    // HAPUS SEMUA: blok 'server' { host: '0.0.0.0', ... }
});
