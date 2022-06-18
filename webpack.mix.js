const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
.js('resources/js/admin.js', 'public/js').vue()
    .postCss('resources/css/app.css', 'public/css', [
    ]) .postCss('resources/css/tailwind.css', 'public/css', [
        require("tailwindcss"),
    ]);
