/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens: {
    'ss': '320px',
    'sm': '640px',
    'md': '768px',
    'lg': '1024px',
    'xl': '1280px',
  },
    colors: {
        // 60 %
        "primary-light": "#E0E0E0",
        "primary-dark": "#282828",
        //
        // 30 %
        "secondary-light": "#F0F0F0",
        "secondary-dark": "#404040",
        //
        // 10 %
        "accent": "#2563eb",
        //
        'transparent': '#00000000'
    },
    backgroundImage: {
        // 'index-header': "url('/public/assets/images/bg.png')"
        'index-header': "url('/public/assets/images/bg_index.webp')"
      },
    fontFamily: {
      'almarai': ['Almarai'],
    },
  },
}
