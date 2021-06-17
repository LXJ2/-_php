console.log(666);
module.exports = {
  devServer: {
    proxy: "http://www.srms.cn"
  },
  configureWebpack: {
    externals: {
      echarts: 'echarts',
    },
  }
}