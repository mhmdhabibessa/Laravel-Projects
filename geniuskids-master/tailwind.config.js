module.exports = {
  purge: [],
  theme: {
      fontFamily: {
        'sans': ['Tajawal']
      },
      container: {
          center: true,
          padding: {
              default: '1.5rem',
              md: '2rem'
          }
      },
    extend: {
        colors: {
            'primary': '#075FA8',
            'secondary': '#8CC63F'
        },
        rotate: {
            '-6': '-6deg',
            '-12': '-12deg',
            '-16': '-16deg',
            '-24': '-24deg',
            '-30': '-30deg',
            '6': '6deg',
            '12': '12deg',
            '16': '16deg',
            '24': '24deg',
            '30': '30deg',
        }
    },
  },
  variants: {},
    plugins: [
        require('@tailwindcss/custom-forms')
    ],
}
