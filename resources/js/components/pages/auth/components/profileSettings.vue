<template>
  <div>
    <div class="settings-content-area">
      <h4>Settings</h4>
      <form action="" method="POST" id="user_settings_form">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label for="name">Name</label>
              <input
                type="text"
                class="form-control"
                name="name"
                placeholder="Full Name"
                :value="userDetails.name"
              />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input
                type="text"
                class="form-control"
                name="email"
                placeholder="Email"
                id="email"
                :value="userDetails.email"
              />
            </div>
          </div>
          <div class="col-lg-12">
            <h5>Password Change</h5>
          </div>
          <div class="col-lg-12">
            <div class="form-group">
              <label for="current_password">Current Password</label>
              <input
                type="password"
                class="form-control"
                placeholder="Current Password"
                name="current_password"
                id="current_password"
              />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="new_password">New Password</label>
              <input
                type="password"
                class="form-control"
                placeholder="New Password"
                name="password"
                id="new_password"
              />
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input
                type="password"
                class="form-control"
                placeholder="Confirm Password"
                name="password_confirmation"
                id="confirm_password"
              />
            </div>
          </div>
          <div class="col-lg-12">
            <div class="btn-submit f-right">
              <button type="submit">Update</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
 props: [
   'userDetails'
   ]
}
</script>