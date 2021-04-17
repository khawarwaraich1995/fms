@extends('layouts.app', ['title' => __('Restaurant')])

@section('content')
@include('users.partials.header', [
'title' => __('Manage Restarant'),
'class' => 'col-lg-12',
])
<?php 

  if(isset($outlet_data->id) && $outlet_data->id != 0)
      {
        $submit_url = route('admin:outlet.update', [$outlet_data->id ?? '']);
      }
    ?>
<div class="container-fluid mt--7">
<form id="outlet_form" method="post" action="{{$submit_url}}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="view_type" value="owner_view">
  <div class="row">
    <div class="col-xl-8 col-md-8 col-sm-8">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="col-12 mb-0">{{ __('Outlet Form') }}</h3>
          </div>
        </div>
        <div class="card-body">
        @if($message = Session::get('success'))
              <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{$message}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                  </div>
              </div>
              @endif
            <fieldset>
              <h6 class="heading-small text-muted mb-4">Outlet Information</h6>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                  <label class="form-control-label"><span class="required-icon">* </span>Owner Name</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->owner_name ?? ''}}" id="owner_name" name="owner_name">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                  <label class="form-control-label"><span class="required-icon">* </span>Outlet Name</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->name ?? ''}}" id="name" name="name">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                  <label class="form-control-label"><span class="required-icon">* </span>Access URL</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->url ?? ''}}" id="url" name="url">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Email</label>
                    <input class="form-control form-control-alternative" type="email" value="{{$outlet_data->email ?? ''}}" id="email" name="email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                  <label class="form-control-label"><span class="required-icon">* </span>Phone</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->phone ?? ''}}" id="phone" name="phone">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Minimum Order</label>
                    <input class="form-control form-control-alternative" type="number" value="{{$outlet_data->minimum_order ?? '0'}}" id="minimum_order" name="minimum_order">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Address</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->address ?? ''}}" id="address" name="address">
                    <small class="text-muted"> <strong>&nbsp;Use address suggestion for accurate data</strong> </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Latitude</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->lat ?? ''}}" id="lat" name="lat" readonly>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Longitude</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->long ?? ''}}" id="long" name="long" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Country</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->country ?? ''}}" id="country" name="country">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>City</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->city ?? ''}}" id="city" name="city">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>State</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->state ?? ''}}" id="state" name="state">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Postal Code</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$outlet_data->post_code ?? ''}}" id="post_code" name="post_code">
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
            <h3 class="col-12 mb-0">{{ __('Logo & Images') }}</h3>
          </div>
        </div>
        <div class="card-body">
        <fieldset>
              <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                  <div class="form-group text-center">
                    <label class="form-control-label" for="input-name">Logo</label>
                    @php
                      if(isset($outlet_data) && !empty($outlet_data->outlet_logo) && File::exists(public_path(ORIGNAL_IMAGE_PATH_OUTLET.$outlet_data->outlet_logo)))
                      {
                        $path = BASE_URL.ORIGNAL_IMAGE_PATH_OUTLET.$outlet_data->outlet_logo;
                      }else
                      {
                        $path = NO_IMAGE;
                      }
                    @endphp
                    <div style="display: flex;justify-content: center;">
                      <input type="file" name="outlet_logo" class="dropify" data-default-file="{{$path}}"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row"> 
                <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group text-center">
                    <label class="form-control-label" for="input-name">Fav Icon</label>
                    @php
                      if(isset($outlet_data) && !empty($outlet_data->fav_icon) && File::exists(public_path(ORIGNAL_IMAGE_PATH_OUTLET.$outlet_data->fav_icon)))
                      {
                        $path = BASE_URL.ORIGNAL_IMAGE_PATH_OUTLET.$outlet_data->fav_icon;
                      }else
                      {
                        $path = NO_IMAGE;
                      }
                    @endphp
                    <div style="display: flex;justify-content: center;">
                      <input type="file" name="fav_icon" class="dropify" data-default-file="{{$path}}"/>
                    </div>
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                <div class="form-group text-center">
                    <label class="form-control-label" for="input-name">Admin Logo</label>
                    @php
                      if(isset($outlet_data) && !empty($outlet_data->admin_logo) && File::exists(public_path(ORIGNAL_IMAGE_PATH_OUTLET.$outlet_data->admin_logo)))
                      {
                        $path = BASE_URL.ORIGNAL_IMAGE_PATH_OUTLET.$outlet_data->admin_logo;
                      }else
                      {
                        $path = NO_IMAGE;
                      }
                    @endphp
                    <div style="display: flex;justify-content: center;">
                      <input type="file" name="admin_logo" class="dropify" data-default-file="{{$path}}"/>
                    </div>
                  </div>
                </div>
            </fieldset>
        </div>
        </div>               
    </div>
  </div>
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
      $("#outlet_form").validate({
        rules: {
          name: {
            required: true,
          },
          url: {
            required: true,
          },
          phone: {
            required: true,
          },
          address: {
            required: true,
          },
          country: {
            required: true,
          },
          city: {
            required: true,
          },
          state: {
            required: true,
          },
          company: {
            required: true,
          },
          lat: {
            required: true,
            number: "Enter numeric value"
          },
          long: {
            required: true,
            number: "Enter numeric value"
          },
          post_code: {
            required: true,
            number: "Enter valid postal code"
          },
          email: {
            required: true,
            email: true
          },
        }
      });
    });
  });
        //Get Auto address and its components
       var autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'));
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
               var place = autocomplete.getPlace();
               var latitude = place.geometry.location.lat();
               var longitude = place.geometry.location.lng();
               $('#lat').val(latitude)
               $('#long').val(longitude)
               var components = place.address_components;
               for (var i = 0, component; component = components[i]; i++) {
                    //Get Country of address
                     if (component.types[0] === 'country') {
                     var country = component['long_name'];
                     $('#country').val(country)
                     }
                    //Get City of address
                     if (component.types[0] == 'locality' && component.types[1] == 'political') {
                     var city = component['long_name'];
                     $('#city').val(city)
                     }

                    //Get state of address
                     if (component.types[0] == 'administrative_area_level_1' && component.types[1] == 'political') {
                        var state = component['long_name'];
                        $('#state').val(state)
                     }

                      //Get Postal Code of address
                      if (component.types[0] === 'postal_code') {
                        var postal_code = component['long_name'];
                        $('#post_code').val(postal_code) 
                      }
                  }
               });
</script>
@endsection