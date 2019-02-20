import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)



import  Login from '../components/Login/login'

const routes = [
    { path: '/login', component: Login }
    
  ]

  

  const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history'       // short for `routes: routes`
  })
   
  export default router