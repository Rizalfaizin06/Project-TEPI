/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "#013d7c", // Your custom blue color
                secondary: "#b0c3d6", // Your custom yellow color
                // ... other colors
            },
        },
        fontFamily: {
            poppins: ["Poppins"],
        },
    },
    plugins: [require("flowbite/plugin")],
};
