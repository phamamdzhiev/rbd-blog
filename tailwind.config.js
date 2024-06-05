/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js"
    ],
    theme: {
        container: {
            center: true,
            padding: '1rem',
            screens: {
                xl: "1280px",
            },
        },
  },
  plugins: [],
}
