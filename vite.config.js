import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    // server: {
    //     hmr: {
    //         host: 'localhost',
    //         protocol: "wss",
    //         port: "8000",
    //     },
    // },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/scss/main.scss',
                'resources/scss/student/student-profile.scss',
                'resources/scss/student/student.scss',
                'resources/scss/defenceReports.scss',
                'resources/js/app.js',
                'resources/js/discipline.js',
                'resources/js/defenceReport.js',
            ],
            refresh: true,
        }),
    ],
});


