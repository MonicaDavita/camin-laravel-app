// tailwind.config.js

const { fontFamily } = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: {
                "font-primary": ["Montserrat", ...fontFamily.sans],
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
