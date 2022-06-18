import './bootstrap';

import { createApp } from 'vue'
import HelloWorld from './admin/components/Welcome.vue';
import Home from './admin/pages/Home.vue';
import About from './admin/pages/About.vue';
import * as VueRouter from 'vue-router'

const app = createApp({});


const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
  ]

  
  const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory('/admin'),
    routes,
  })

app.component('hello-world', HelloWorld)
app.use(router)

app.mount('#app')