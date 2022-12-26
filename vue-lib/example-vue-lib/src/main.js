/** import vue */
import { createApp } from 'vue'
/* import 外部スタイルシート */
import 'bootstrap/dist/css/bootstrap.min.css';
import '@vuepic/vue-datepicker/dist/main.css'
/** import スタイルシート */
import './style.css' // ライブラリ独自
/** import 部品 */
import App from './App.vue'

// create vue
createApp(App).mount('#app')
