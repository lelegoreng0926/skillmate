import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                display: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#E8F7ED', 100: '#D5F2DF', 200: '#B0E8C3', 300: '#7DDD9D',
                    400: '#4FD174', 500: '#2FCB63', 600: '#27B457', 700: '#1E9147',
                    800: '#167238', 900: '#10592C', DEFAULT: '#2FCB63',
                },
                surface: '#F8F4EC',
                muted: {
                    DEFAULT: '#6F6A63',
                    foreground: '#9D968C',
                },
                success: {
                    DEFAULT: '#16A34A',
                    light: '#DCFCE7',
                },
                warning: {
                    DEFAULT: '#F59E0B',
                    light: '#FEF3C7',
                },
                danger: {
                    DEFAULT: '#DC2626',
                    light: '#FEE2E2',
                },
                info: {
                    DEFAULT: '#0EA5E9',
                    light: '#E0F2FE',
                },
            },
            boxShadow: {
                soft: '0 10px 30px rgb(0 0 0 / 0.05)',
                card: '0 18px 38px rgb(0 0 0 / 0.08)',
            },
            maxWidth: {
                content: '75rem',
            },
        },
    },

    plugins: [forms],
};
