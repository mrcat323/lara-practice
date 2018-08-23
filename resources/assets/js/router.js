import Vue from 'vue'
import VueRouter from 'vue-router'
import Main from './components/Main.vue'
import Navbar from './components/Navbar.vue'
import Info from './components/Info.vue'
import Blog from './components/Blog.vue'
import Post from './components/Post.vue'
import PostEdit from './components/PostEdit.vue'
import PostCreate from './components/PostCreate.vue'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: [
    {path: '/', name: 'home', component: Main},
    {path: '/info', name: 'info', component: Info},
    {path: '/blog', name: 'blog', component: Blog},
    {path: '/post/view/:id', name: 'post', component: Post},
    {path: '/post/edit/:id', name: 'post-edit', component: PostEdit},
    {path: '/post/create', name:'post-create', component: PostCreate}
  ]
});

export default router
