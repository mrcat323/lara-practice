import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from './components/Main.vue'
import Navbar from './components/Navbar.vue'
import Info from './components/Info.vue'
import Blog from './components/Blog.vue'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: [
    {path: '/', name: 'home', component: Main},
    {path: '/info', name: 'info', component: Info},
    {path: '/blog', name: 'blog', component: Blog}
  ]
});

export default router
