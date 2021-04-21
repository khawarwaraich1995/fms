import Vue from 'vue';
import VueRouter from 'vue-router';
//Import Pages

import Home from './components/pages/homepage';
import Menu from './components/pages/menu';

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Home
    },
    {
        path: "/menu",
        component: Menu
    }
]

export default new VueRouter({
    mode: 'history',
    routes
});