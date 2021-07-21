<template>
  <header id="header">
    <div class="header-area">
      <topbar>{{user}}</topbar>
      <div class="header-top-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
            <language-dropdown></language-dropdown>
            </div>
            <div class="col-lg-6">
             <auth-menu v-if="isLogged"></auth-menu>
             <guest-menu v-if="!isLogged"></guest-menu>
            </div>
          </div>
        </div>
      </div>
      <div class="header-main-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <div class="header-logo">
                <logo></logo>
              </div>
            </div>
            <div class="col-lg-9">
              <div class="header-main-right-area">
                <a href="#" id="toggle-sidebar-left"
                  ><div class="shopping-cart f-right">
                    <span class="ti-shopping-cart mr-15"></span>
                    <div class="count_load"></div></div
                ></a>

                <div class="main-menu f-right">
                  <div class="mobile-menu">
                    <a
                      class="toggle f-right hc-nav-trigger hc-nav-1"
                      href="#"
                      role="button"
                      aria-controls="hc-nav-1"
                      ><i class="ti-menu"></i
                    ></a>
                  </div>
                  <nav id="main-nav" class="hc-nav-original hc-nav-1">
                    <ul>
                      <menu-items></menu-items>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <cart></cart>
  </header>
</template>
  <script>
  import { mapGetters } from 'vuex'
export default {
  data() {
    return {
      active: "home",
      user: localStorage.getItem('user')
    };
  },
  computed: {
    ...mapGetters([
      'isLogged'
    ])
  },
  methods: {
    toggleActive(event) {
      var id = event.target.id;
      this.active = id;
    },
  },
};
</script>

