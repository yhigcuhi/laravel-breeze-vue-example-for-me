/** import node */
import { resolve } from 'path'
/** import vite */
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import cssInjectedByJsPlugin from 'vite-plugin-css-injected-by-js' // js に cssを含めるために入れたやつ

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    // CSS into js
    cssInjectedByJsPlugin()
  ],
  // import @/の対応
  resolve: {
    alias: {
      '@': resolve(__dirname, 'src')
    }
  },
  // docker host用
  server: {
    host: true
  },
  // build
  build: {
    // CSS 含める
    cssCodeSplit: true,
    // library 化タスク
    lib: {
      // 複数のエントリーポイントのディクショナリや配列にもできます
      entry: resolve(__dirname, 'src/main.js'),
      name: 'ExampleVueLib',
      // 適切な拡張子が追加されます
      fileName: 'my-lib',
      // umd,
      formats: ['umd', 'esm', 'amd'],
    },
    // rollupOptions: {
    //   // ライブラリにバンドルされるべきではない依存関係を
    //   // 外部化するようにします
    //   external: ['vue'],
    //   output: {
    //     // 外部化された依存関係のために UMD のビルドで使用する
    //     // グローバル変数を提供します
    //     globals: {
    //       vue: 'Vue',
    //     },
    //   },
    // },
  },
  // prosess.env いないので代用
  define: {
    'process.env': {}
  }
})
