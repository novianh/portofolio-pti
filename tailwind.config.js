/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        themeVariants: ['dark'],
        extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ],
};
