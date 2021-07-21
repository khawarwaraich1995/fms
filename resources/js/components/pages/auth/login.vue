<template>
  <div>
    <div id="pjax-container">
      <div class="main-content mt-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <div class="login-card">
                <div class="login-header">
                  <h5>Login your account</h5>
                </div>
                <div class="login-body">
                  <div class="social-login">
                    <h6>Login with social account</h6>
                    <div class="social-links">
                      <a
                        class="facebook"
                        href=""
                        ><i class="fab fa-facebook"></i> Facebook</a
                      >
                      <a
                        class="google"
                        href=""
                        ><i class="fab fa-google"></i> Google</a
                      >
                    </div>
                  </div>
                    <vs-alert color="danger" v-show="error">
                      <template #title>
                        Oops!
                        {{errMsj}}
                      </template>
                    </vs-alert>
                  <div class="login-form">
                    <form
                      @submit.prevent="login"
                      class="basicform"
                    >
                      <div class="form-group">
                        <label>Email</label>
                        <input
                          type="email"
                          name="email"
                          v-model="email"
                          class="form-control"
                        />
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input
                          type="password"
                          class="form-control"
                          name="password"
                          v-model="password"
                          required
                          autocomplete="current-password"
                        />
                      </div>
                      <div class="remember-section d-flex">
                        <div class="remember">
                          <div class="custom-control custom-checkbox">
                            <input
                              type="checkbox"
                              class="custom-control-input area"
                              id="remember"
                              v-model="remember"
                              name="remember"
                            />
                            <label class="custom-control-label" for="remember"
                              >Remember Me</label
                            >
                          </div>
                        </div>
                        <div class="forgotten">
                          <a href="">Forgot password?</a>
                        </div>
                      </div>
                      <div class="login-button">
                        <vs-button ref="button" type="submit" class="basicbtn">
                          Login Now
                        </vs-button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data () {
    return {
      email: '',
      password: '',
      remember: '',
      error: false,
      errMsj: ''
    }
  },

  methods: {
    login () {
      this.$store
        .dispatch('login', {
          email: this.email,
          password: this.password
        })
        .then((response) => {
          if(response.status == true)
          {
            this.$router.push('/')
          }else{
            let messageErr = response.message;
            this.error = true;
            this.errMsj = messageErr;
          }
          
        })
        .catch(err => {
          console.log(err)
          
        })
    }
  }
}
</script>