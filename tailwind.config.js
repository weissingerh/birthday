module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        colors: {
            primary: "#17392B",
            secondary: "#839A6B",
            tertiary: "#BE7154",
            fourthy: "#CDCF9D",
            fifthy: "#E9D3BA",
            "gray-dark": "#273444",
            gray: "#8492a6",
            "gray-light": "#d3dce6",
            white: 'white',
            black: 'black'
        },
        fontFamily: {
            sans: ["Graphik", "sans-serif"],
            serif: ["Merriweather", "serif"],
        },
        extend: {
            spacing: {
                "8xl": "96rem",
                "9xl": "128rem",
            },
            borderRadius: {
                "4xl": "2rem",
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
