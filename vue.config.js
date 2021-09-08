module.exports = {
  configureWebpack: {
    resolve: {
      alias: {
        // 配置别名 内部已经有一个默认别名 '@': 'src'
        assets: '@/assets',
        common: '@/common',
        components: '@/components',
        network: '@/network',
        views: '@/views'
      }
    }
  },
  publicPath: '/'
}
