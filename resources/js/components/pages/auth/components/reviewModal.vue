<template>
  <div>
    <div
      class="modal fade"
      id="send_review2146"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Send Review</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form
            action="https://food.amwork.xyz/author/review"
            method="POST"
          ></form>
          <input
            type="hidden"
            name="_token"
            value="WqNFw9Jub4uHRja86RPqpzsPZ5RBDQHBcrObRtuS"
          />
          <div class="modal-body">
            <div class="form-group">
              <label for="ratting" class="col-form-label"
                >Select Ratting:</label
              >
              <select id="ratting" class="form-control" name="ratting">
                <option value="5">5 Star</option>
                <option value="4">4 Star</option>
                <option value="3">3 Star</option>
                <option value="2">2 Star</option>
                <option value="1">1 Star</option>
              </select>
            </div>
            <input type="hidden" name="vendor_id" value="3" />
            <input type="hidden" name="order_id" value="2146" />
            <div class="form-group">
              <label for="review" class="col-form-label">Write Review:</label>
              <textarea
                class="form-control"
                id="review"
                name="review"
              ></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="submit" class="btn btn-primary">Send Review</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>