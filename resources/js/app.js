//bootstrap
import './bootstrap';
import '../sass/app.scss'
import * as bootstrap from 'bootstrap'
import lodash from "lodash";
window._ = lodash
import * as Popper from '@popperjs/core'
window.Popper = Popper


//axios
import axios from 'axios'
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//store vuex
import store from './components/store/main.js'


//router
import routers from "./components/router.js";


//app setting
import Application from './components/app.vue';
import { createApp } from 'vue'
createApp(Application).use(routers).use(store).mount('#app')

