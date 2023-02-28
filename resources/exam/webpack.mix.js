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
mix
    .sass(
        "resources/frontend/css/main.scss",
        "public/css/"
    )
    //   .sourceMaps(true, "source-map")
    .options({
        processCssUrls: false,
    });

    // mix.combine(
    //     [
    //         "resources/frontend/js/jquery-3.6.0.min.js",
    //         "resources/frontend/responsively-lazy/responsivelyLazy.min.js",
    //         "resources/frontend/bootstrap5/js/bootstrap.bundle.min.js",
    //         "resources/frontend/js/jquery.barrating.min.js",
    //         "resources/frontend/js/smooth-scroll.polyfills.min.js",
    //         "resources/frontend/magnific/jquery.magnific-popup.js",
    //         "resources/frontend/swiper/swiper-bundle.min.js",
    //         "resources/frontend/js/wow.min.js",
    //         "resources/frontend/js/frontend.js",
    //     ],
    //     "public/js/frontend.js"
    // ).options({
    //     processCssUrls: false,
    // });

//Chỉ dùng trên bản local
// mix
//   .styles(
//     [
//       "packages/phobrv/brvcore/resources/assets/adminlte3/plugins/fontawesome-free/css/all.css",
//       "packages/phobrv/brvcore/resources/assets/css/admin_cus.css",
//       "packages/phobrv/brvcore/resources/assets/adminlte3/css/adminlte.css",
//       "packages/phobrv/brvcore/resources/assets/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css",
//       "packages/phobrv/brvcore/resources/assets/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css",
//       "packages/phobrv/brvcore/resources/assets/adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css",
//       "packages/phobrv/brvcore/resources/assets/adminlte3/plugins/select2/css/select2.min.css",
//       "packages/phobrv/brvcore/resources/assets/colorbox/colorbox.css",
//     ],
//     "public/css/admin.css"
//   )
//   .options({
//     processCssUrls: false,
//   })
//   .version();