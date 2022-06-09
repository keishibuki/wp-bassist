const fs = require("fs");

const themeJson = fs.readFileSync("./theme.json");
const theme = JSON.parse(themeJson);

const colors = theme.settings.color.palette.reduce((acc, item) => {
  const [color, number] = item.slug.split("-");
  if (undefined !== number) {
    if (!acc[color]) {
      acc[color] = {};
    }
    acc[color][number] = item.color;
  } else {
    acc[color] = item.color;
  }

  return acc;
}, {});

module.exports = {
  content: ["./**/*.php"],
  theme: {
    extend: {
      colors,
      aspectRatio: {
        "4/3": "4 / 3",
        "3/2": "3 / 2",
      },
    },
  },
  plugins: [require("@tailwindcss/line-clamp")],
};
