"use strict";

var _buefy = _interopRequireDefault(require("buefy"));

require("buefy/dist/buefy.css");

var _vuesax = _interopRequireDefault(require("vuesax"));

require("vuesax/dist/vuesax.css");

var _router = _interopRequireDefault(require("./router"));

require("./assets/app.css");

require("material-icons/iconfont/material-icons.css");

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

require('./bootstrap');

window.Vue = require('vue')["default"];
Vue.use(_buefy["default"]);
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
Vue.component('app-topBar', require('./components/layouts/topbar.vue')["default"]);
var app = new Vue({
  el: '#app',
  router: _router["default"]
});