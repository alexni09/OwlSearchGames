const defaultTheme = require('tailwindcss/defaultTheme');
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {
            rotate: {
                '135': '135deg',
            },
            screens: {
                'xs': '475px',
                ...defaultTheme.screens,
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                luckiestguy: ['Luckiest Guy']
            },
        },
    },
    plugins: [require('@tailwindcss/forms')],
};
