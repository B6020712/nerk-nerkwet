import './bootstrap'
import { createApp, h } from 'vue'
import router from '@/router/router_index'
import store from '@/store/store_index'
import App from '@/App.vue'
import '../sass/app.scss'

const app = createApp({
    render() {
        return h(App)
    }
})
app.use(router)
app.use(store)
app.mount('#app')