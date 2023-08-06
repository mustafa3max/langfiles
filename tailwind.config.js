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
        "primary-dark": "#202124",
        //
        // 30 %
        "secondary-light": "#FAFAFA",
        "secondary-dark": "#303134",
        //
        // 10 %
        // "accent": "#2563eb",
        "accent": "#2962FF",
        //
        'transparent': '#00000000',
        'code-1-light': '#064E3B',
        'code-1-dark': '#22C55E',
        'code-2-light': '#7C2D12',
        'code-2-dark': '#FACC15',
    },
    backgroundImage: {
        'index-header': "url('/public/assets/images/bg_index.webp')"
      },
    fontFamily: {
      'almarai': ['Almarai', 'sans-serif'],
    },
  },
}
