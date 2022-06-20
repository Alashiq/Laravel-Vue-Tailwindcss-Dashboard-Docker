import './bootstrap';
import { createApp } from 'vue'
import { createPinia } from 'pinia'
import HelloWorld from './admin/components/Welcome.vue';
import Home from './admin/pages/Home.vue';
import About from './admin/pages/About.vue';
import * as VueRouter from 'vue-router'

const app = createApp({});
const pinia = createPinia()

const routes = [
    { path: '/admin', component: Home },
    { path: '/admin/about', component: About },
  ]
  const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
  })

// app.component('hello-world', HelloWorld)
app.use(pinia)

app.use(router)


app.mount('#app')