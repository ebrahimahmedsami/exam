<template>
    <div>
        <app-header></app-header>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
import AppHeader from "./layouts/header.vue";
import AppFooter from "./layouts/footer.vue";
    export default {
        components:{
          AppHeader,
            AppFooter
        }
    }
</script>
