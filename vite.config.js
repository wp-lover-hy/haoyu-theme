import { defineConfig } from 'vite'
import { resolve } from 'path'
import { fileURLToPath, URL } from 'node:url'

export default defineConfig({
  // 开发服务器配置
  server: {
    port: 3000,
    host: true,
    cors: true,
    // 监听文件变化并自动刷新
    watch: {
      usePolling: true,
      interval: 1000
    },
    // 代理到你的WordPress本地开发环境
    proxy: {
      '/wp-content': {
        target: 'http://localhost:10004', // 你的Local by Flywheel端口
        changeOrigin: true,
        secure: false
      },
      '/wp-admin': {
        target: 'http://localhost:10004',
        changeOrigin: true,
        secure: false
      },
      '/wp-json': {
        target: 'http://localhost:10004',
        changeOrigin: true,
        secure: false
      }
    }
  },

  // 构建配置
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'src/main.js')
      },
      output: {
        entryFileNames: '[name].js',
        chunkFileNames: '[name].js',
        assetFileNames: (assetInfo) => {
          if (assetInfo.name.endsWith('.css')) {
            return '[name].css'
          }
          return '[name].[ext]'
        }
      }
    },
    // 生产环境优化
    minify: 'terser',
    terserOptions: {
      compress: {
        drop_console: true,
        drop_debugger: true
      }
    },
    // 生成source map用于调试
    sourcemap: true
  },

  // CSS配置
  css: {
    preprocessorOptions: {
      scss: {
        // 全局SCSS变量和混入 - 暂时为空，保持GP主题原有样式
        additionalData: ``,
        // 抑制Sass弃用警告
        silenceDeprecations: ['legacy-js-api']
      }
    }
  },

  // 插件配置
  plugins: [
    // 自定义插件：WordPress主题开发优化
    {
      name: 'wordpress-theme',
      generateBundle(options, bundle) {
        // 确保输出文件符合WordPress主题规范
        Object.keys(bundle).forEach(fileName => {
          if (fileName.endsWith('.css')) {
            bundle[fileName].fileName = 'main.css'
          }
          if (fileName.endsWith('.js')) {
            bundle[fileName].fileName = 'main.js'
          }
        })
      }
    }
  ],

  // 路径别名
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  },

  // 优化配置
  optimizeDeps: {
    include: [
      'lodash-es',
      'axios',
      'gsap'
    ]
  },

  // 环境变量
  define: {
    __DEV__: JSON.stringify(process.env.NODE_ENV === 'development'),
    __VERSION__: JSON.stringify(process.env.npm_package_version)
  }
})
