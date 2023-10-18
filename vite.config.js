import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/converts/convert.js',
            	'resources/js/user/add_texts.js',
            	'resources/js/tools/langtool.js',
            ],
            refresh: true,
        }),
    ],
});
