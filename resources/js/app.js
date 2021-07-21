window.Vue = require('vue').default;
import routes from './router';
import store from './store/index';
import Vuesax from 'vuesax';

import 'vuesax/dist/vuesax.css' //Vuesax styles
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
Vue.component('guest-menu', require('./components/layouts/partials/GuestMenu.vue').default);
Vue.component('auth-menu', require('./components/layouts/partials/AuthMenu.vue').default);
Vue.component('menu-items', require('./components/layouts/partials/menu-items.vue').default);
Vue.component('cart', require('./components/component/cart.vue').default);
Vue.component('homepage-slider', require('./components/component/homepage-slider.vue').default);
Vue.component('multi-restaurant-search', require('./components/component/multi-restaurant-search.vue').default);
Vue.component('restaurant-cards', require('./components/component/restaurant-cards.vue').default);
Vue.component('language-dropdown', require('./components/layouts/partials/language-dropdown.vue').default);
Vue.component('topbar', require('./components/layouts/partials/topbar.vue').default);
Vue.component('logo', require('./components/layouts/partials/logo.vue').default);
Vue.component('app-footer', require('./components/layouts/footer.vue').default);
Vue.component('footer-menu', require('./components/layouts/partials/footer-menu.vue').default);
Vue.component('footer-social-links', require('./components/layouts/partials/footer-social-links.vue').default);
Vue.component('copyright-section', require('./components/layouts/partials/copyright-section.vue').default);
Vue.component('customer-total-orders', require('./components/pages/auth/components/customerTotalOrders.vue').default);
Vue.component('customer-pending-orders', require('./components/pages/auth/components/customerPendingOrders.vue').default);
Vue.component('review-modal', require('./components/pages/auth/components/reviewModal.vue').default);
Vue.component('rating-reviews-list', require('./components/pages/auth/components/ratingReviewsList.vue').default);
Vue.component('profile-settings', require('./components/pages/auth/components/profileSettings.vue').default);
const app = new Vue({
    el: '#app',
    store: store,
    router: routes,
});
