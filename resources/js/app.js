import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';
import { createApp } from 'vue';

import App from './vue/app.vue'

createApp(App).mount("#app")

window.Alpine = Alpine;

Alpine.start();
