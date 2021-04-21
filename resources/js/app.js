
require('./bootstrap');
window.Vue = require('vue').default;
import Buefy from 'buefy';
import 'buefy/dist/buefy.css';
import Vuesax from 'vuesax';
import 'vuesax/dist/vuesax.css' ;
import routes from './router';
import './assets/app.css';

import 'material-icons/iconfont/material-icons.css';

Vue.use(Buefy)
Vue.use(Vuesax, {
    colors: {
        primary:'#5b3cc4',
        success:'rgb(23, 201, 100)',
        danger:'rgb(242, 19, 93)',
        warning:'rgb(255, 130, 0)',
        dark:'rgb(36, 33, 69)'
      }
  })

//Components Loading
Vue.component('app-layout', require('./components/app.vue').default);
Vue.component('app-header', require('./components/layouts/header.vue').default);
Vue.component('app-topBar', require('./components/layouts/topbar.vue').default);

const app = new Vue({
    el: '#app',
    router: routes
});
