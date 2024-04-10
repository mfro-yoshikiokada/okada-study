import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', // 外部からの接続を許可
        port: 5173,      // Dockerでマッピングしたポート
        strictPort: true, // 指定したポートを強制する
        hmr: {
            host: 'localhost', // HMR(Hot Module Replacement)のためのホスト設定
        },
    },
});
