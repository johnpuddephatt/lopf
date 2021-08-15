const mix = require('laravel-mix');
require('@tinypixelco/laravel-mix-wp-blocks'); //https://www.npmjs.com/package/@tinypixelco/laravel-mix-wp-blocks

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Sage application. By default, we are compiling the Sass file
 | for your application, as well as bundling up your JS files.
 |
 */

mix.setPublicPath('./public').browserSync('web.lopf.localhost');

mix
  .sass('resources/styles/app.scss', 'styles')
  .sass('resources/styles/editor.scss', 'styles')
  .options({
    processCssUrls: false,
    postCss: [require('tailwindcss')],
  });

mix
  .js('resources/scripts/app.js', 'scripts')
  .blocks('resources/scripts/editor.js', 'scripts')
  .vue()
  .extract();

mix
  .copyDirectory('resources/icons', 'public/icons')
  .copyDirectory('resources/images', 'public/images')
  .copyDirectory('resources/fonts', 'public/fonts');

mix.sourceMaps().version();
