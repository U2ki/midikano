module.exports = {
  devServer: {
    disableHostCheck: true,
  },
  transpileDependencies: ['vuetify'],

  // for Laravel
  outputDir: '../public/app',
  publicPath: '/app',
  pages: {
    app: {
      entry: 'src/main.js',
      template: 'templates/base.html',
      filename: '../../resources/views/vue/app.blade.php',
    },
  }

