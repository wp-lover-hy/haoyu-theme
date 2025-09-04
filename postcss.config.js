export default {
  plugins: {
    // 自动添加浏览器前缀
    autoprefixer: {
      overrideBrowserslist: [
        'last 2 versions',
        '> 1%',
        'ie >= 11',
        'not dead'
      ]
    },
    
    // CSS压缩和优化
    cssnano: {
      preset: ['default', {
        discardComments: {
          removeAll: true
        },
        normalizeWhitespace: false,
        colormin: true,
        minifySelectors: true,
        mergeLonghand: true,
        mergeRules: true
      }]
    }
  }
}
