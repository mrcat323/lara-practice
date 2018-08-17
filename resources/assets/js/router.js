import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from './components/Main.vue'
import Info from './components/Info.vue'
Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: [
    {path: '/', component: Main},
    {path: '/info', component: Info}
  ]
});

export default router
