import Vue from 'vue';
import VueRouter from 'vue-router';
//Import Pages

import Home from './components/pages/homepage';
import Menu from './components/pages/menu';
import Login from './components/pages/auth/login';
import Register from './components/pages/auth/register';
import Profile from './components/pages/auth/customerProfile';

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Home
    },
    {
        path: "/menu",
        component: Menu
    },
    {
        path: "/register",
        component: Register
    },
    {
        path: "/login",
        component: Login
    },
    {
        path: "/profile",
        component: Profile,
        meta: {
            auth: true,
        },
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
  })

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user')
  
    if (to.matched.some(record => record.meta.auth) && !loggedIn) {
      next('/login')
      return
    }
    next()
  })

  export default router