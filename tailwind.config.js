// const preset = require('./vendor/filament/filament/tailwind.config.preset')

module.exports = {
    content: [
      './src/**/*.php',
      './resources/views/**/*.blade.php',
      './resources/js/**/*.vue',
      './resources/css/**/*.css',
      './node_modules/flowbite/**/*.js'
      // Aggiungi altre posizioni se necessario
    ],
    theme: {
      extend: {
        // Configura il tuo tema personalizzato qui
      },
    },
    plugins: [
      require('@tailwindcss/forms'),
      require('@tailwindcss/typography'),
      require('flowbite/plugin')
      // Aggiungi altri plugin se necessario
    ],
  };
