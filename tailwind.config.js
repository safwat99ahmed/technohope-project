module.exports = {
    content: [
        "./index.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
        colors: {
            myGray: "#212227",
            blue: "#01A89E",
        },
    },
    plugins: [require("flowbite/plugin")],
};
