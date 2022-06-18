import './bootstrap';

import { createApp } from 'vue'
import HelloWorld from './admin/components/Welcome.vue';

const app = createApp({});


app.component('hello-world', HelloWorld)

app.mount('#app')