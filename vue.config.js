        module.exports = {
  devServer: {
    proxy: "http://www.srms.cn:90"
  },
  configureWebpack: {
    externals: {
      echarts: 'echarts',
    },
  }
}