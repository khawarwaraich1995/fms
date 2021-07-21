<template>
  <div>
    <form action="" class="cartform">
      <div
        class="sidebar d-none"
        id="sidebar-left"
        data-simplersidebar="closed"
        style="
          position: fixed;
          top: 0px;
          bottom: 0px;
          width: 300px;
          z-index: 3000;
          right: -300px;
        "
      >
        <div class="sidebar-wrapper">
          <div class="main_cart_ok">
            <div class="delivery-main-content sidebar text-center">
              <h5 class="mt-20 mb-15">No Item in your Cart</h5>
              <p class="mb-15">
                You haven't added anything in your cart yet! Start adding the
                products you like.
              </p>
              <div class="cart-product-another-information">
                <div class="single-information d-flex">
                  <span>Subtotal</span>
                  <div class="main-amount">
                    <span>USD 0.00</span>
                  </div>
                </div>
                <div class="checkout-btn disabled">
                  <a href="#" class="disabled">Checkout</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>