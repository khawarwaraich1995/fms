@extends('layouts.app', ['title' => __('Categories')])

@section('content')
@include('users.partials.header', [
'title' => __('Create Categories'),
'class' => 'col-lg-12',
])
<?php

if (isset($categories_data->id) && $categories_data->id != 0) {
  $submit_url = route('admin:categories.update', [$categories_data->id ?? '']);
} else {
  $submit_url = route('admin:categories.add');
}
?>
<div class="container-fluid mt--7">
  <form id="category-form" method="post" action="{{$submit_url}}" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-xl-8 col-md-8 col-sm-8">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <h3 class="col-12 mb-0">{{ __('Category Form') }}</h3>
            </div>
          </div>
          <div class="card-body">
            <fieldset>
              <h6 class="heading-small text-muted mb-4">Category Information</h6>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Category Name</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$categories_data->cat_name ?? ''}}" id="cat_name" name="cat_name">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Rank</label>
                    <select class="form-control form-control-alternative required" name="rank">
                      @if(isset($rank) && !empty($rank))
                      @foreach($rank as $key => $value)
                      <option value="{{$value}}" <?php if (isset($categories_data->rank) && $categories_data->rank == $value) {
                                                    echo "selected";
                                                  } ?>>{{$value}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <label class="form-control-label" for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control form-control-alternative" id="exampleFormControlTextarea1" rows="5" name="cat_desc">{{$categories_data->cat_desc ?? ''}}</textarea>
                  </div>
                </div>
              </div>
              @php
              if(isset($categories_data) && $categories_data->discount_status == 1)
              {
              $checked = 'checked';
              }else{
              $checked = '';
              }
              @endphp
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input discount_status" name="discount_status" id="discount_status" <?php echo $checked; ?>>
                      <label class="custom-control-label" for="discount_status">Enable Category Discount</label>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            <fieldset id="discount-section" style="display: none;">
              <hr>
              <h6 class="heading-small text-muted mb-4">Category Discount</h6>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Discount Name</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$categories_data->discount_name ?? ''}}" id="discount_name" name="discount_name">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="exampleFormControlTextarea1">Discount amount</label>
                    <input class="form-control form-control-alternative" type="number" value="{{$categories_data->discount_amount ?? ''}}" id="discount_amount" name="discount_amount">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Discount Type</label>
                    <select class="form-control form-control-alternative required" name="discount_type">
                      <option value="percent" <?php if (isset($categories_data) && $categories_data->discount_type == "percent") {
                                                echo "selected";
                                              } ?>> Percentage (%)</option>
                      <option value="amount" <?php if (isset($categories_data) && $categories_data->discount_type == "amount") {
                                                echo "selected";
                                              } ?>> Exact Amount</option>
                    </select>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-md-4 col-sm-4">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <h3 class="col-12 mb-0">{{ __('Category Image') }}</h3>
            </div>
          </div>
          <div class="card-body">
            <fieldset>
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                  <div class="form-group text-center">
                    <label class="form-control-label" for="input-name">Image</label>
                    @php
                    if(isset($categories_data) && !empty($categories_data->image) && File::exists(public_path(ORIGNAL_IMAGE_PATH_CATEGORIES.$categories_data->image)))
                    {
                    $path = BASE_URL.ORIGNAL_IMAGE_PATH_CATEGORIES.$categories_data->image;
                    }else
                    {
                    $path = NO_IMAGE;
                    }
                    @endphp
                    <div style="display: flex;justify-content: center;">
                      <input type="file" name="image" class="dropify" data-default-file="{{$path}}" />
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <button class="btn btn-icon btn-primary" type="submit" id="save">
          <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
          <span class="btn-inner--text">Save</span>
        </button>
      </div>

    </div>
  </form>
  @include('layouts.footers.auth')
</div>

<script>
  $(document).ready(function() {
    $("#save").on('click', function() {
      $("#category-form").validate({
        rules: {
          cat_name: {
            required: true,
          },
        }
      });
    });
    $("#discount_status").on('change', function() {
      if ($(this).prop("checked") == true) {
        $('#discount-section').css('display', 'block');
      } else if ($(this).prop("checked") == false) {
        $('#discount-section').css('display', 'none');
      }
    });

    var discount = $("#discount_status").is(':checked');
    if (discount == true) {
      $('#discount-section').css('display', 'block');
    } else if (discount == false) {
      $('#discount-section').css('display', 'none');
    }
  });
</script>
@endsection