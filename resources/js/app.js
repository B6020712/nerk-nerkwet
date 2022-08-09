import './bootstrap'
import { createApp } from 'vue'
import router from '@/router/router_index'
import store from '@/store/store_index'
// import { createApp } from 'vue/dist/vue.esm-bundler'
// import router from '@/router'
// import store from '@/store'
import '../sass/app.scss'

const app = createApp({})
app.use(router)
app.use(store)
app.mount('#app')