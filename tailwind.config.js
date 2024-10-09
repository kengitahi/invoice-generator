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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#1a73e8',
                secondary: '#4285f4',
                accent: '#fbbc04',
                'text-primary': '#202124',
            },
            fontFamily: {
                sans: ['Open Sans', 'sans-serif'],
                heading: ['Roboto', 'sans-serif'],
            },
        },
    },

    plugins: [forms],
};
