/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: "#004080",
                secondary: "#1DCAF4",
                tertiary: "#FF6B00",
                quaternary: "#FFC000",
            },
            backgroundImage: {
                pattern: "url('../../public/img/bg-pattern.png')",
                "pattern-dark": "url('../../public/img/bg-pattern-dark.png')",
            },
            fontFamily: {
                poppins: ["Poppins", "sans-serif"],
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
