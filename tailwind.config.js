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
                sans: ['DM Sans', ...defaultTheme.fontFamily.sans],
                display: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#EEF5FF', 100: '#DCEAFF', 200: '#C3DCFF', 300: '#9AC5FF',
                    400: '#669FFF', 500: '#3978EF', 600: '#2765DF', 700: '#1F50BD',
                    800: '#193F96', 900: '#173676', DEFAULT: '#2765DF',
                },
                surface: '#FFFFFF',
                muted: {
                    DEFAULT: '#64748B',
                    foreground: '#94A3B8',
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
                soft: '0 1px 3px 0 rgb(15 23 42 / 0.06), 0 1px 2px -1px rgb(15 23 42 / 0.06)',
                card: '0 1px 3px 0 rgb(15 23 42 / 0.08), 0 4px 12px -2px rgb(15 23 42 / 0.06)',
            },
            maxWidth: {
                content: '75rem',
            },
        },
    },

    plugins: [forms],
};
