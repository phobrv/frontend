const mix = require("laravel-mix");
const path = require("path");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.sass(
        "packages/phont/frontend/resources/assets/frontend/css/main.scss",
        "public/css/"
    )
    // .sourceMaps(true, "source-map")
    .options({
        processCssUrls: false,
    });

mix.combine(
    [
        "packages/phont/frontend/resources/assets/frontend/js/jquery-3.6.0.min.js",
        "packages/phont/frontend/resources/assets/frontend/js/lazysizes.min.js",
        "packages/phont/frontend/resources/assets/bootstrap5/js/bootstrap.bundle.min.js",
        "packages/phont/frontend/resources/assets/frontend/js/jquery.barrating.min.js",
        "packages/phont/frontend/resources/assets/frontend/js/smooth-scroll.polyfills.min.js",
        "packages/phont/frontend/resources/assets/magnific/jquery.magnific-popup.js",
        "packages/phont/frontend/resources/assets/swiper/swiper-bundle.min.js",
        "packages/phont/frontend/resources/assets/frontend/js/wow.min.js",
        "packages/phont/frontend/resources/assets/frontend/js/frontend.js",
    ],
    "public/js/frontend.js"
).options({
    processCssUrls: false,
});

mix.styles([
    'public/vendor/phobrv/adminlte3/plugins/fontawesome-free/css/all.css',
    'public/vendor/phobrv/css/admin_cus.css',
    'public/vendor/phobrv/adminlte3/css/adminlte.css',
    'public/vendor/phobrv/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
    'public/vendor/phobrv/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
    'public/vendor/phobrv/adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
    'public/vendor/phobrv/adminlte3/plugins/select2/css/select2.min.css',
    'public/vendor/phobrv/adminlte3/plugins/select2/css/select2.min.css',
], 'public/css/admin.css').options({
    processCssUrls: false,
}).version();