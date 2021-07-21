<template>
  <div>
    <div class="header-top-right-section f-right">
      <router-link to="/profile">
        <a href=""><span class="ti-user"></span> My Profile</a>
      </router-link>
        <a href="javascript:void(0)" @click="logout()"><span class="ti-lock"></span> Logout</a>
    </div>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters([
      'isLogged'
    ])
  },

  methods: {
    logout () {
      this.$store.dispatch('logout')
    }
  }
}
</script>