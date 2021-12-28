const mix = require("laravel-mix");

mix
  .js("resources/js/vue2/vue2.js", "/dist/js")
  .vue({ version: 2 })
  .browserSync("http://apply2campus-v2.test/")
  .sourceMaps();
