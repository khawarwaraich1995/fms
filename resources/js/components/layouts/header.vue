<template>
  <!-- <b-navbar>
    <template #brand>
      <b-navbar-item tag="router-link" :to="{ path: '/' }">
        <img
          src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png" class="logo"
        />
      </b-navbar-item>
    </template>
    <template #start>
      <router-link to="/" class="navbar-item" active-link="active">
        <b-navbar-item > Home </b-navbar-item>
      </router-link>
       <router-link to="/menu" class="navbar-item">
        <b-navbar-item > Menu </b-navbar-item>
      </router-link>
    </template>

    <template #end>
      <b-navbar-item tag="div">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light"> Log in </a>
        </div>
      </b-navbar-item>
    </template>
  </b-navbar> -->

    <div class="center examplex navbar">
      <vs-navbar shadow fixed center-collapsed>
        <template #left>
          <img src="https://raw.githubusercontent.com/buefy/buefy/dev/static/img/buefy-logo.png" class="logo">
        </template>
        <router-link to="/" class="navbar-item" active-link="active">
        <vs-navbar-item id="guide">
          Home
        </vs-navbar-item>
        </router-link>
        <router-link to="/menu" class="navbar-item">
        <vs-navbar-item id="docs">
          Menu
        </vs-navbar-item>
        </router-link>
        <vs-navbar-item id="components">
          Offers
        </vs-navbar-item>
        <vs-navbar-item id="license">
          Contact Us
        </vs-navbar-item>
        <template #right>
          <vs-button flat >Login</vs-button>
          <vs-button>Get Started</vs-button>
        </template>
      </vs-navbar>
    </div>

</template>