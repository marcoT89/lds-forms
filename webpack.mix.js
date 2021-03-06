const mix = require('laravel-mix');
const path = require('path');
require('laravel-mix-tailwind');

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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()
    .webpackConfig({
        resolve: {
            alias: {
                vue$: mix.inProduction() ? 'vue/dist/vue.min' : 'vue/dist/vue.js',
                styles: path.resolve(__dirname, 'resources/sass'),
                '@': path.resolve(__dirname, 'resources/js'),
                '~': path.resolve(__dirname, 'node_modules'),
            },
        },
        module: {
            rules: [
                {
                    test: /\.pug$/,
                    oneOf: [
                        {
                            resourceQuery: /^\?vue/,
                            use: ['pug-plain-loader'],
                        },
                        {
                            use: ['raw-loader', 'pug-plain-loader'],
                        },
                    ],
                },
            ],
        },
    })
    .tailwind();

if (mix.inProduction()) {
    mix.version();
}
