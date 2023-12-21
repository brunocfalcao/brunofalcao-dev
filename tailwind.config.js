const colors = require("tailwindcss/colors");
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./packages/eduka/course-mastering-nova/resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            // @course-mastering-nova
            'satoshi' : ['Satoshi-Regular'],
            'satoshi-medium' : ['Satoshi-Medium']
            // @end-course-mastering-nova
        },
        extend: {
            colors: {
                // @course-mastering-nova
                "primary-black": "#101010",
                "deep-soft-blue": "#272E44",
                // @end-course-mastering-nova
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
