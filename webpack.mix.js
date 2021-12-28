const mix = require("laravel-mix");

mix
  .copyDirectory("resources/theme/css", "public/dist/css")
  .copyDirectory("resources/theme/js", "public/dist/js")
  .copyDirectory("resources/theme/plugins", "public/dist/js/plugins")
  .sass("resources/sass/custom.scss", "/dist/css")
  // .js("resources/js/vue2/vue2.js", "/dist/js")
  .js("resources/js/search/search-app.js", "/dist/js")
  .vue({ version: 2 })
  .version()
  .browserSync("http://apply2campus-v2.test/")
  .sourceMaps();
