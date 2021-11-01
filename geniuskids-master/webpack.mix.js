const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts(['node_modules/flatpickr/dist/flatpickr.js', 'node_modules/flatpickr/dist/l10n/ar.js'], 'public/js/flatpickr.min.js')
    .scripts(['node_modules/alpinejs/dist/alpine-ie11.js'], 'public/js/alpine-ie11.js')
    .js('resources/js/app.js', 'public/js')
    .styles(['node_modules/flatpickr/dist/flatpickr.css'], 'public/css/flatpickr.min.css')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ],
    }).purgeCss({
    enabled: true,
    extensions: ['html', 'js', 'php']
}).browserSync('geniuskids.site');

if (mix.inProduction()) {
    mix.version();
}
