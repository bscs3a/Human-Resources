/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/**/**/*.{html,js,php}"],
  safelist: [
    'bg-wave',
    'bg-request-money',
    'bg-profit',
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Montserrat', 'sans-serif'],
        'russo': ['Russo One'],
      },
      colors: {
        'sidebar': '#262261', // Sidebar color
        // 'primary': '#FFA500', // Primary color
      },

      backgroundImage: {
        'wave': "url('../public/finance/img/wave.png')",
        'request-money': "url('../public/finance/img/RequestMoney.png')",
        'profit': "url('../public/finance/img/Profit.png')",
        'radial-gradient': 'radial-gradient(circle, var(--tw-gradient-stops))',
      },
      backgroundImage: theme => ({
        'radial-gradient': 'radial-gradient(50% 50% at 50% 50%, #FFEB95 0%, #FECE01 100%)',
      })
    },
  },
  plugins: [
    function({ addUtilities }) {
      const newUtilities = {
        '.hide-scrollbar': {
          'scrollbar-width': 'none', /* Firefox */
          '-ms-overflow-style': 'none', /* Internet Explorer 10+ */
        },
        '.hide-scrollbar::-webkit-scrollbar': {
          display: 'none', /* Safari and Chrome */
        },
      }
      addUtilities(newUtilities)
    }
  ],
}