module.exports = {
  mode: 'jit',
  purge: {
    content: [
      './resources/**/*.antlers.html',
      './resources/**/*.blade.php',
      './content/**/*.md',
      './src/**/*.html',
     './src/**/*.js'
    ]
  },
  important: true,
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [],
}
