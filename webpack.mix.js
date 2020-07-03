const mix = require('laravel-mix');

mix.options({
  hmrOptions: {
    host: 'laravel-test.test',
    port: 8080
  }
});


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
