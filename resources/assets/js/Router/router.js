import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)



import  Login from '../components/Login/login'
import  Signup from '../components/Login/signup'
import Forum from '../components/forum/Forum'
import  Logout from '../components/Login/logout'
import  Read from '../components/forum/Read'
import  Create from '../components/forum/Create'

const routes = [
    { path: '/login', component: Login },
    { path: '/signup', component: Signup },
    {path: '/forum', component: Forum , name: 'forum' },
    {path: '/logout', component: Logout},
    {path: '/ask', component: Create },
    {path: '/question/:slug', component: Read , name: 'read'},
    
  ]

  

  const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'       // short for `routes: routes`
  })
   
  export default router