import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/routes/routes.css',
                'resources/routes/route.js',
            ],
            refresh: true,
        }),
    ],
});
