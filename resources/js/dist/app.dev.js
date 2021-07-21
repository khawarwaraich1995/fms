"use strict";

var _bootstrapVue = require("bootstrap-vue");

var _buefy = _interopRequireDefault(require("buefy"));

var _vuesax = _interopRequireDefault(require("vuesax"));

var _router = _interopRequireDefault(require("./router"));

require("./assets/app.css");

require("bootstrap/dist/css/bootstrap.css");

require("bootstrap-vue/dist/bootstrap-vue.css");

require("vuesax/dist/vuesax.css");

require("buefy/dist/buefy.css");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

window.Vue = require('vue')["default"];
Vue.use(_buefy["default"]);
Vue.use(_bootstrapVue.BootstrapVue);
Vue.use(_bootstrapVue.IconsPlugin);
Vue.use(_vuesax["default"], {
  colors: {
    primary: '#5b3cc4',
    success: 'rgb(23, 201, 100)',
    danger: 'rgb(242, 19, 93)',
    warning: 'rgb(255, 130, 0)',
    dark: 'rgb(36, 33, 69)'
  }
}); //Components Loading

Vue.component('app-layout', require('./components/app.vue')["default"]);
Vue.component('app-header', require('./components/layouts/header.vue')["default"]);
Vue.component('app-footer', require('./components/layouts/footer.vue')["default"]);
var app = new Vue({
  el: '#app',
  router: _router["default"]
});