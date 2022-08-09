<template>
    <div class="app">
        <component :is="layout">
            <router-view></router-view>
        </component>
    </div>
</template>
 
<script>
import AppLayoutDefault from './layouts/Default.vue'
export default {
    name: "AppLayout",
    data: () => ({
        layout: AppLayoutDefault
    }),
    watch: {
        $route: {
        immediate: true,
        async handler(route) {
            try {
                const component = await import(`@/layouts/${route.meta.layout}.vue`)
                this.layout = component?.default || AppLayoutDefault
            } catch (e) {
                this.layout = AppLayoutDefault
            }
        }
        }
    }
}
</script>