import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import path from 'path'
export default defineConfig({
    plugins: [
        vue(),
        laravel([
            //'resources/scss/app.scss',
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
    ]//, server: { host: '0.0.0.0', port: 5173, hmr: { host: '127.0.0.1', }, } 
    ,
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '@': '/resources/js',
        }
    },
});