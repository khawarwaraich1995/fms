@extends('layouts.app', ['title' => __('Company')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Create Company'),
        'class' => 'col-lg-12',
    ])
    <?php 
      if(isset($company_data->id) && $company_data->id != 0)
      {
        $submit_url = route('admin:company.update', [$company_data->id ?? '']);
      }
      else
      {
        $submit_url = route('admin:company.add');
      }
    ?>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Company Form') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('admin:company') }}" class="btn btn-sm btn-primary">Back to list</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <form id="company_form" method="post" action="{{$submit_url}}">
                        @csrf
                        <fieldset>
                          <h6 class="heading-small text-muted mb-4">Company Information</h6>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label"><span class="required-icon">* </span> Name</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->name ?? ''}}" id="name" name="name">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label"><span class="required-icon">* </span>Email</label>
                                  <input class="form-control form-control-alternative" type="email" value="{{$company_data->email ?? ''}}" id="email" name="email">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label"><span class="required-icon">* </span>Phone</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->phone ?? ''}}" id="phone" name="phone">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label"><span class="required-icon">* </span>Address</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->address ?? ''}}" id="address" name="address">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">Postal Code</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->post_code ?? ''}}" id="post_code" name="post_code">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">Country</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->country ?? ''}}" id="country" name="country">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">City</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->city ?? ''}}" id="city" name="city">
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <!-- <fieldset>
                        <hr>
                          <h6 class="heading-small text-muted mb-2">Email Server Details (SMTP Settings)</h6>
                          <br>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">SMTP Username</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->smtp_username ?? ''}}" id="smtp_username" name="smtp_username">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">SMTP Password</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->smtp_password ?? ''}}" id="smtp_password" name="smtp_password">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">SMTP Host</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->smtp_host ?? ''}}" id="smtp_host" name="smtp_host">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">SMTP Port</label>
                                  <input class="form-control form-control-alternative" type="text" value="{{$company_data->smtp_port ?? ''}}" id="smtp_port" name="smtp_port">
                              </div>
                            </div>
                          </div>
                        </fieldset> -->
                          <!-- <fieldset>
                            <h6 class="heading-small text-muted mb-4">PayPal Payment API Details</h6>
                            <hr>
                            <div class="row">
                              <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Account Email</label>
                                    <input class="form-control form-control-alternative" type="email" value="{{$company_data->paypal_email ?? ''}}" id="paypal_email" name="paypal_email">
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Currency</label>
                                    <input class="form-control form-control-alternative" type="text" value="{{$company_data->paypal_currency ?? ''}}" id="paypal_currency" name="paypal_currency">
                                </div>
                              </div>
                            </div>
                          </fieldset> -->

                            <!-- <fieldset>
                            <hr>
                              <h6 class="heading-small text-muted mb-4">Stripe Payment API Details</h6>
                              <br>
                              <div class="row">
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label">Publish Key</label>
                                      <input class="form-control form-control-alternative" type="text" value="{{$company_data->stripe_publish_key ?? ''}}" id="stripe_publish_key" name="stripe_publish_key">
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label">Secret Key</label>
                                      <input class="form-control form-control-alternative" type="text" value="{{$company_data->stripe_secret_key ?? ''}}" id="stripe_secret_key" name="stripe_secret_key">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label">Country</label>
                                      <input class="form-control form-control-alternative" type="text" value="{{$company_data->stripe_country ?? ''}}" id="stripe_country" name="stripe_country">
                                  </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label">Currency</label>
                                      <input class="form-control form-control-alternative" type="text" value="{{$company_data->stripe_currency ?? ''}}" id="stripe_currency" name="stripe_currency">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-md-6">
                                  <div class="form-group">
                                      <label class="form-control-label">Account Email</label>
                                      <input class="form-control form-control-alternative" type="email" value="{{$company_data->stripe_email ?? ''}}" id="stripe_email" name="stripe_email">
                                  </div>
                                </div>
                              </div>
                            </fieldset> -->
                        <fieldset>
                        <hr>
                          <h6 class="heading-small text-muted mb-4">Social Information</h6>
                          <br>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">Facebook Link</label>
                                  <input class="form-control form-control-alternative" type="url" value="{{$company_data->facebook_link ?? ''}}" id="facebook_link" name="facebook_link">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">Twitter Link</label>
                                  <input class="form-control form-control-alternative" type="url" value="{{$company_data->twitter_link ?? ''}}" id="twitter_link" name="twitter_link">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label for="example-text-input" class="form-control-label">Instagram Link</label>
                                  <input class="form-control form-control-alternative" type="url" value="{{$company_data->insta_link ?? ''}}" id="insta_link" name="insta_link">
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="form-group">
                                  <label class="form-control-label">Google Link</label>
                                  <input class="form-control form-control-alternative" type="url" value="{{$company_data->google_link ?? ''}}" id="google_link" name="google_link">
                              </div>
                            </div>
                          </div>
                        </fieldset>
                        <div class="row">
                          <div class="col-lg-2 col-md-2 offset-lg-10">
                            <button class="btn btn-icon btn-primary" type="submit" id="save">
                                <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                                <span class="btn-inner--text">Save</span>
                              </button>
                          </div>

                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    <script>
    $(document).ready(function(){
      $("#save").on('click', function() {
        $("#company_form").validate({
          rules: {
            name : {
              required: true,
            },
            email: {
              required: true,
              email: true
            },
            phone : {
              required: true,
            },
            address : {
              required: true,
            },
            post_code : {
              required: false,
            },
            country: {
              required: true,
            },
            city: {
              required: true,
            }
          }
        });
      });
    });
    </script>
@endsection
