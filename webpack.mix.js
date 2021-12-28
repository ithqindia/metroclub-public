const mix = require("laravel-mix");

mix
  .copyDirectory("resources/theme/css", "public/dist/css")
  .copyDirectory("resources/theme/js", "public/dist/js")
  .copyDirectory("resources/theme/plugins", "public/dist/js/plugins")
  .sass("resources/src/sass/custom.scss", "/dist/css")
  .js("resources/js/vue2/vue2.js", "/dist/js")
  .vue({ version: 2 })
  .browserSync("http://apply2campus-v2.test/")
  .sourceMaps();
