import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flyonui/dist/js/*.js" //For FlyonUI JS
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
                sans: ['Josefin Sans', 'sans-serif'],
                heading: ['Alike', 'sans-serif'],
            },
        },
    },

    plugins: [
        forms,
        require("flyonui"),
        require("flyonui/plugin") //For FlyonUI JS
    ],
};
