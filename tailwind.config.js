const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./packages/eduka/course-mastering-nova/resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "primary-black": "#101010",
                "deep-soft-blue": "#272E44",
                ...colors,
            },
        },
        backgroundPosition: {
            bottom: "bottom",
            "bottom-4": "center top -48rem",
            center: "center",
            left: "left",
            "left-bottom": "left bottom",
            "left-top": "left top",
            right: "right",
            "right-bottom": "right bottom",
            "right-top": "right top",
            top: "top",
            "top-4": "center top 1rem",
        },
    },
    plugins: [],
};
