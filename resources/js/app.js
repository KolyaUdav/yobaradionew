import('./bootstrap');

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import example from './components/example.vue';

const app = createApp({
    components: {
        example,
    }
});

app.mount('#app');
