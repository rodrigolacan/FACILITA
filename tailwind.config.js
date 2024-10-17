/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'fugaz': ['"Fugaz One"', 'cursive'], // Adiciona a fonte Fugaz One
        'roboto': ['Roboto', 'sans-serif'],  // Adiciona a fonte Roboto
      },
      colors: {
        primary: '#005EB8', // Adiciona uma cor primária se precisar reutilizar
        secondary: '#000000', // Adiciona a cor preta como secundária
      },
    },
  },
  plugins: [],
}
