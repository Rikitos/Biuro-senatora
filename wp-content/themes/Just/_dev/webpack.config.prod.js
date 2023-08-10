const path = require("path"),
  settings = require("./settings");

module.exports = {
  mode: "production",
  entry: {
    App: settings.themeLocation + "_dev/src/js/app.js",
  },
  output: {
    path: path.resolve(__dirname, settings.themeLocation + "assets/js"),
    filename: "./app.js",
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
    ],
  },
};
