require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import router from './router'

import BooksIndex from './components/books/BooksIndex.vue';

createApp({
    components: {
        BooksIndex
    }
}).use(router).mount('#app')