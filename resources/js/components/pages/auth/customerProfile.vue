<template>
  <div>
    <div id="pjax-container">
      <div class="alert-message-area">
        <div class="alert-content">
          <h4 class="ale">Your Settings Successfully Updated</h4>
        </div>
      </div>

      <div class="error-message-area">
        <div class="error-content">
          <h4 class="error-msg"></h4>
        </div>
      </div>

      <section>
        <div class="main-area pt-50">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="settings-sidebar-card">
                  <div class="profile-show-area text-center">
                    <div class="profile-img">
                      <img
                        :src="userImg"
                      />
                    </div>
                    <div class="profile-content">
                      <h5>{{user.user.name}}</h5>
                      <span>{{user.user.email}}</span>
                    </div>
                  </div>
                  <div class="settings-main-menu">
                    <nav>
                      <ul class="nav nav-tabs">
                        <li>
                          <a href="#dashbaord" data-toggle="tab" class="active">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                          </a>
                        </li>
                        <li>
                          <a href="#orders" data-toggle="tab">
                            <i class="fas fa-clone"></i> Orders
                          </a>
                        </li>
                        <li>
                          <a href="#settings" data-toggle="tab">
                            <i class="fas fa-cog"></i> Settings
                          </a>
                        </li>
                        <li>
                          <a href="#ratting_menu" data-toggle="tab">
                            <i class="fas fa-star"></i> Rattings &amp; Reviews
                          </a>
                        </li>
                        <li>
                          <a
                            href="javascript:void(0)" @click="logout()"
                          >
                            <i class="fas fa-sign-out-alt"></i> Logout
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="tab-content">
                  <div
                    class="setting-main-area tab-pane fade in active show"
                    id="dashbaord"
                  >
                    <div class="settings-content-area">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="single-dashboard-widget d-flex">
                            <div class="left-icon">
                              <i class="fas fa-clone"></i>
                            </div>
                            <customer-total-orders></customer-total-orders>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="single-dashboard-widget d-flex">
                            <div class="left-icon">
                              <i class="fab fa-first-order-alt"></i>
                            </div>
                            <customer-pending-orders></customer-pending-orders>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-30">
                        <div class="col-lg-12">
                          <div class="table-responsive">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Order Id</th>
                                  <th scope="col">Payment Method</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Amount</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <h4>No Orders!!!!</h4>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="setting-main-area verification_area tab-pane fade"
                    id="orders"
                  >
                    <div class="settings-content-area">
                      <h4>Orders</h4>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="table-responsive">
                            <review-modal></review-modal>
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Order Id</th>
                                  <th scope="col">Payment Method</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Amount</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th>2133</th>
                                  <td>stripe</td>
                                  <td>
                                    <div class="badge badge-info">complete</div>
                                  </td>
                                  <td>USD42</td>
                                  <td>
                                    <div class="order-btn d-flex">
                                      <a
                                        class="view_btn mr-2 btn-send"
                                        href="#"
                                        data-toggle="modal"
                                        data-target="#send_review2133"
                                        ><i class="fas fa-paper-plane"></i
                                      ></a>
                                      <a
                                        class="view_btn"
                                        href="https://food.amwork.xyz/author/order/eyJpdiI6Ik1yMWMvTXYwMVdEM29WL3JmS0NZaHc9PSIsInZhbHVlIjoiMFVkajN1bjN2ZGVhNVhkU21YeDd1dz09IiwibWFjIjoiM2ZmYWU3Y2M5MWU5NmI1ZWU0ZDlhZWZlNDFlN2VmODE4YTg5MzhmNjJiMmRkOWM3ODcwMjFjNjI5ZjVmN2UxMCJ9"
                                        ><i class="fas fa-eye"></i
                                      ></a>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div
                    class="setting-main-area verification_area tab-pane fade"
                    id="settings"
                  >
                    <profile-settings :userDetails="user.user"></profile-settings>
                  </div>
                  <div
                    class="setting-main-area verification_area tab-pane fade"
                    id="ratting_menu"
                  >
                    <rating-reviews-list></rating-reviews-list>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>
<script>
import { mapGetters } from 'vuex'
export default {
  data() {
    return{
      user: this.$store.state.user,
      userImg: this.$store.state.user.image || 'https://lh3.googleusercontent.com/proxy/nFeNKaCVOLv22jKghYOllJN62HUnpOgoKoTcIkxhPZTQ8D6ybktJcEhfi3AJ6bR4I3vrbHKnI3hZUtQPbH9gg33Y3z-T1pJdvuDllOuo2FM62wWH2v51RZeHFo95EijC7L-rIE0FBnSg0w'
    }
  },
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