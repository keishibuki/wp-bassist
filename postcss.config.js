module.exports = (ctx) => ({
  plugins: [
    require("postcss-import"),
    require("tailwindcss"),
    require("postcss-nested"),
  ],
});
