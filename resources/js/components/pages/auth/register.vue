<template>
  <div>
    <div id="pjax-container">
      <div class="main-content mt-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <div class="login-card">
                <div class="login-header">
                  <h5>Don’t have an Account? Register now!</h5>
                </div>
                <div class="login-body">
                  <vs-alert color="success" v-show="success">
                    <template #title>
                      Success!
                      {{ successMsj }}
                    </template>
                  </vs-alert>
                  <div class="login-form">
                    <form @submit.prevent="register">
                      <div
                        class="form-group"
                        v-bind:class="{ 'has-error': has_error && errors.name }"
                      >
                        <label>Your Full Name</label>
                        <input
                          type="text"
                          v-model="form.name"
                          class="form-control"
                          required
                        />
                        <span
                          class="error-block"
                          v-if="has_error && errors.name"
                          >{{ errors.name[0] }}</span
                        >
                      </div>
                      <div
                        class="form-group"
                        v-bind:class="{
                          'has-error': has_error && errors.email,
                        }"
                      >
                        <label>Your Email</label>
                        <input
                          type="email"
                          v-model="form.email"
                          class="form-control"
                          required
                        />
                        <span
                          class="error-block"
                          v-if="has_error && errors.email"
                          >{{ errors.email[0] }}</span
                        >
                      </div>
                      <div
                        class="form-group"
                        v-bind:class="{
                          'has-error': has_error && errors.password,
                        }"
                      >
                        <label>Password</label>
                        <input
                          type="password"
                          class="form-control"
                          v-model="form.password"
                          required
                        />
                        <span
                          class="error-block"
                          v-if="has_error && errors.password"
                          >{{ errors.password[0] }}</span
                        >
                      </div>
                      <div
                        class="form-group"
                        v-bind:class="{
                          'has-error': has_error && errors.confirmPassword,
                        }"
                      >
                        <label>Confirm Password</label>
                        <input
                          type="password"
                          class="form-control"
                          v-model="form.confirmPassword"
                          required
                        />
                        <span
                          class="error-block"
                          v-if="has_error && errors.confirmPassword"
                          >{{ errors.confirmPassword[0] }}</span
                        >
                      </div>
                      <div class="remember-section">
                        <div class="remember">
                          <div class="custom-control custom-checkbox">
                            <input
                              type="checkbox"
                              class="custom-control-input"
                              id="agree"
                              v-model="form.agree"
                              required
                            />
                            <label class="custom-control-label" for="agree"
                              >I agree to
                              <a href="../page/terms-and-conditions.html"
                                >Terms &amp; Conditions</a
                              ></label
                            >
                          </div>
                        </div>
                      </div>
                      <div class="login-button">
                        <button type="submit">Register Now</button>
                        <div class="already-account">
                          <router-link to="/login"><a href=""> Already have account?</a></router-link>
                        </div>
                        
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
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        confirmPassword: "",
        agree: "",
      },
      has_error: false,
      error: "",
      errors: {},
      success: false,
      successMsj: "",
    };
  },
  methods: {
    register() {
      this.$store
        .dispatch("register", {
          name: this.form.name,
          email: this.form.email,
          password: this.form.password,
          confirmPassword: this.form.confirmPassword,
        })
        .then((resp) => {
          if (resp.status == true) {
            this.resetForm();
            this.has_error = false;
            this.errors = {};
            this.success = true;
            this.successMsj = resp.message;
          }
        })
        .catch((err) => {
          if (err.response.data) {
            this.has_error = true;
            this.errors = err.response.data.errors || {};
          } else {
            console.log(err);
          }
        });
    },
    resetForm() {
      var self = this;
      Object.keys(this.form).forEach(function (key, index) {
        self.form[key] = "";
      });
    },
  },
};
</script>