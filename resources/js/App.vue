<template>
    <div class="app">
        <component :is="this.$route.meta.layouts || 'div'">
            <router-view></router-view>
        </component>
    </div>
</template>
 
<script>
export default {
    
}
</script>