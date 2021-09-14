module.exports = {
  transpileDependencies: ["vuetify"],

  devServer: {
    overlay: false,
    proxy: {
      "/api": {
        target: "http://localhost:8000",
        changeOrigin: true,
        pathRewrite: {
          "^/api": "",
        },
      },
    },
    disableHostCheck: true,
    // port: 8000,
    // public: "0.0.0.0:8000",
  },
};
