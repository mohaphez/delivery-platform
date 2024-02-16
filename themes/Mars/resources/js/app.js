/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import.meta.glob([
    '../assets/**',
]);

import "./bootstrap.js";
import { createApp } from "vue";

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
window.Swiper = Swiper;


// Vue components
const app = createApp({});
import Login from "../components/Login.vue";
import Csrf from "../components/Csrf.vue";

const files = import.meta.globEager('../components/*.vue');
for (const path in files) {
    const name = path.split('/').pop().split('.')[0].toLowerCase() + '-component';
    app.component(name, files[path].default);
}

app.mount("#app");