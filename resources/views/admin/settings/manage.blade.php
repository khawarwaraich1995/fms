@extends('layouts.app', ['title' => __('Settings')])

@section('content')
@include('users.partials.header', [
'title' => __('Admin Settings'),
'class' => 'col-lg-12',
])
<?php
if (isset($settings[0]['id']) && $settings[0]['id'] != 0) {
    $submit_url = route('admin:settings.update-uploads', [$settings[0]['id'] ?? '']);
} else {
    $submit_url = route('admin:settings.add-uploads');
}
?>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3 class="mb-0">Settings Management</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form id="settings" method="post" action="https://foodtiger.site/settings/1" autocomplete="off" enctype="multipart/form-data" abineguid="B59BCE13E9CC4107BFA07C716D61E779">
                        <input type="hidden" name="_token" value="1uJlJePF4FkJcylgbdgNVieqwJgM05GLWJayn77A"> <input type="hidden" name="_method" value="put">
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false"><i class="ni ni-bullet-list-67 mr-2"></i>Site Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-image mr-2"></i>Images</a>
                                </li>



                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#setup" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-settings"></i> Setup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#payments" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-money-coins"></i> Payments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#plugins" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-ui-04"></i> Plugins</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active show" id="tabs-icons-text-2-tab" data-toggle="tab" href="#smtp" role="tab" aria-controls="tabs-icons-text-2" aria-selected="true"><i class="ni ni-email-83"></i> SMTP</a>
                                </li>
                            </ul>
                        </div>
                        <br>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div id="form-group-site_name" class="form-group focused">
                                    <label class="form-control-label" for="site_name">Site Name</label>
                                    <input step=".01" type="text" name="site_name" id="site_name" class="form-control form-control   " placeholder="Site Name here ..." value="" required="" autofocus="">
                                </div>
                                <div id="form-group-site_description" class="form-group focused">
                                    <label class="form-control-label" for="site_description">Site Description</label>
                                    <input step=".01" type="text" name="site_description" id="site_description" class="form-control form-control   " placeholder="Site Description here ..." value="" required="" autofocus="">
                                </div>
                                <div id="form-group-header_title" class="form-group focused">
                                    <label class="form-control-label" for="header_title">Header Title</label>
                                    <input step=".01" type="text" name="header_title" id="header_title" class="form-control form-control   " placeholder="Header Title here ..." value="" required="" autofocus="">
                                </div>
                                <div id="form-group-header_subtitle" class="form-group focused">
                                    <label class="form-control-label" for="header_subtitle">Header Subtitle</label>
                                    <input step=".01" type="text" name="header_subtitle" id="header_subtitle" class="form-control form-control   " placeholder="Header Subtitle here ..." value="The meals you love, delivered with care" required="" autofocus="">
                                </div>
                                <br>
                                <div id="form-group-delivery" class="form-group focused">
                                    <label class="form-control-label" for="delivery">Delivery cost - fixed</label>
                                    <input step=".01" type="text" name="delivery" id="delivery" class="form-control form-control   " placeholder="Fixed delivery" value="0" autofocus="">
                                </div>



                                <h6 class="heading-small text-muted mb-4">Mobile App</h6>
                                <div id="form-group-mobile_info_title" class="form-group focused">
                                    <label class="form-control-label" for="mobile_info_title">Info Title</label>
                                    <input step=".01" type="text" name="mobile_info_title" id="mobile_info_title" class="form-control form-control   " placeholder="Info Title text here ..." value="" autofocus="">
                                </div>
                                <div id="form-group-mobile_info_subtitle" class="form-group focused">
                                    <label class="form-control-label" for="mobile_info_subtitle">Info Subtitle</label>
                                    <input step=".01" type="text" name="mobile_info_subtitle" id="mobile_info_subtitle" class="form-control form-control   " placeholder="Info Subtitle text here ..." value="" autofocus="">
                                </div>
                                <br>
                                <div id="form-group-playstore" class="form-group focused">
                                    <label class="form-control-label" for="playstore">Play Store</label>
                                    <input step=".01" type="text" name="playstore" id="playstore" class="form-control form-control   " placeholder="Play Store link here ..." value="" autofocus="">
                                </div>
                                <div id="form-group-appstore" class="form-group">
                                    <label class="form-control-label" for="appstore">App Store</label>
                                    <input step=".01" type="text" name="appstore" id="appstore" class="form-control form-control   " placeholder="App Store link here ..." value="" autofocus="">
                                </div>



                                <h6 class="heading-small text-muted mb-4">Social Links</h6>
                                <div id="form-group-facebook" class="form-group">
                                    <label class="form-control-label" for="facebook">Facebook</label>
                                    <input step=".01" type="text" name="facebook" id="facebook" class="form-control form-control   " placeholder="Facebook link here ..." value="" autofocus="">
                                </div>
                                <div id="form-group-instagram" class="form-group">
                                    <label class="form-control-label" for="instagram">Instagram</label>
                                    <input step=".01" type="text" name="instagram" id="instagram" class="form-control form-control   " placeholder="Instagram link here ..." value="" autofocus="">
                                </div>
                                <br>

                            </div>
                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group text-center">
                                            <label class="form-control-label" for="input-name">Site Logo</label>
                                            <div class="text-center">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput" style="width: 200px;">
                                                        <img src="/default/logo.png" alt="...">
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-outline-secondary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>


                                                            <input type="file" name="site_logo" accept="image/x-png,image/gif,image/jpeg">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="setup" role="tabpanel" aria-labelledby="setup">

                                <div class="">
                                    <br>
                                    <h4 class="display-4 mb-0">System</h4>
                                    <hr>
                                    <div id="form-group-env[APP_NAME]" class="form-group focused">
                                        <label class="form-control-label" for="env[APP_NAME]">Project name</label>
                                        <input step=".01" type="text" name="env[APP_NAME]" id="env[APP_NAME]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[APP_URL]" class="form-group focused">
                                        <label class="form-control-label" for="env[APP_URL]">Link to your site</label>
                                        <input step=".01" type="text" name="env[APP_URL]" id="env[APP_URL]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[APP_DEBUG]" id="env[APP_DEBUG]hid">
                                            <input value="true" type="checkbox" class="custom-control-input" name="env[APP_DEBUG]" id="env[APP_DEBUG]">
                                            <label class="custom-control-label" for="env[APP_DEBUG]">App
                                                debugging</label>
                                        </div>
                                        <small class="text-muted"><strong>Enable if you experince error
                                                500</strong></small>
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[APP_ORDER_APPROVE_DIRECTLY]" id="env[APP_ORDER_APPROVE_DIRECTLY]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[APP_ORDER_APPROVE_DIRECTLY]" id="env[APP_ORDER_APPROVE_DIRECTLY]">
                                            <label class="custom-control-label" for="env[APP_ORDER_APPROVE_DIRECTLY]">Directly approve order</label>
                                        </div>
                                        <small class="text-muted"><strong>When selected admin does not have to approve
                                                order</strong></small>
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ALLOW_AUTOMATED_ASSIGN_TO_DRIVER]" id="env[ALLOW_AUTOMATED_ASSIGN_TO_DRIVER]hid">
                                            <input value="true" type="checkbox" class="custom-control-input" name="env[ALLOW_AUTOMATED_ASSIGN_TO_DRIVER]" id="env[ALLOW_AUTOMATED_ASSIGN_TO_DRIVER]">
                                            <label class="custom-control-label" for="env[ALLOW_AUTOMATED_ASSIGN_TO_DRIVER]">Assign orders to drivers
                                                automatically</label>
                                        </div>
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[APP_ALLOW_SELF_DELIVER]" id="env[APP_ALLOW_SELF_DELIVER]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[APP_ALLOW_SELF_DELIVER]" id="env[APP_ALLOW_SELF_DELIVER]">
                                            <label class="custom-control-label" for="env[APP_ALLOW_SELF_DELIVER]">Allow
                                                restaurant to do their own delivery</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[TIME_TO_PREPARE_ORDER_IN_MINUTES]" class="form-group focused">
                                        <label class="form-control-label" for="env[TIME_TO_PREPARE_ORDER_IN_MINUTES]">Time for order to be
                                            prepared</label>
                                        <input step=".01" type="number" name="env[TIME_TO_PREPARE_ORDER_IN_MINUTES]" id="env[TIME_TO_PREPARE_ORDER_IN_MINUTES]" class="form-control form-control   " placeholder="" value="0" autofocus="">
                                        <small class="text-muted"><strong>Average time order is prepared, so users can
                                                not order before restaurant or shop is closing</strong></small>
                                    </div>
                                    <div id="form-group-env[LOCATION_SEARCH_RADIUS]" class="form-group focused">
                                        <label class="form-control-label" for="env[LOCATION_SEARCH_RADIUS]">Search
                                            radius for restaurants</label>
                                        <input step=".01" type="number" name="env[LOCATION_SEARCH_RADIUS]" id="env[LOCATION_SEARCH_RADIUS]" class="form-control form-control   " placeholder="" value="50" autofocus="">
                                        <small class="text-muted"><strong>Maximum distance that restaurants are shown to
                                                user</strong></small>
                                    </div>
                                    <div id="form-group-env[DRIVER_SEARCH_RADIUS]" class="form-group focused">
                                        <label class="form-control-label" for="env[DRIVER_SEARCH_RADIUS]">Search radius
                                            for drivers</label>
                                        <input step=".01" type="number" name="env[DRIVER_SEARCH_RADIUS]" id="env[DRIVER_SEARCH_RADIUS]" class="form-control form-control   " placeholder="" value="15" autofocus="">
                                        <small class="text-muted"><strong>When you have automatic assign to driver, this
                                                is a way to show the system for the maximum range to look for
                                                driver</strong></small>
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_PICKUP]" id="env[ENABLE_PICKUP]hid">
                                            <input value="true" type="checkbox" class="custom-control-input" name="env[ENABLE_PICKUP]" id="env[ENABLE_PICKUP]">
                                            <label class="custom-control-label" for="env[ENABLE_PICKUP]">Enable pickup ,
                                                system wide</label>
                                        </div>
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[HIDE_COD]" id="env[HIDE_COD]hid">
                                            <input value="true" type="checkbox" class="custom-control-input" name="env[HIDE_COD]" id="env[HIDE_COD]">
                                            <label class="custom-control-label" for="env[HIDE_COD]">Hide cash on
                                                delivery, system wide</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[DELIVERY_INTERVAL_IN_MINUTES]" class="form-group focused">
                                        <label class="form-control-label" for="env[DELIVERY_INTERVAL_IN_MINUTES]">Delivery / time intervals in
                                            minutes</label>
                                        <input step=".01" type="number" name="env[DELIVERY_INTERVAL_IN_MINUTES]" id="env[DELIVERY_INTERVAL_IN_MINUTES]" class="form-control form-control   " placeholder="" value="60" autofocus="">
                                        <small class="text-muted"><strong>Separate the time slots into N Minutes. ex
                                                09:00-09-15 , 09:15-09:30 - value is 15 </strong></small>
                                    </div>
                                    <div id="form-group-env[DEFAULT_PAYMENT]" class="form-group focused">

                                        <label class="form-control-label">Default payment type</label><br>

                                        <select class="form-control form-control-alternative select2init select2-hidden-accessible" name="env[DEFAULT_PAYMENT]" id="env[DEFAULT_PAYMENT]" data-select2-id="env[DEFAULT_PAYMENT]" tabindex="-1" aria-hidden="true">
                                            <option disabled="" selected="" value="" data-select2-id="26"> Select
                                                Default payment type </option>
                                            <option selected="" value="cod" data-select2-id="2">Cash on Deliver</option>
                                            <option value="stripe" data-select2-id="27">Stripe Card processing</option>
                                        </select><span class="select2 select2-container select2-container--default form-control select2-container--below" dir="ltr" data-select2-id="1" style="width: 300px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-envDEFAULT_PAYMENT-container" style="border: 0px;"><span class="select2-selection__rendered" id="select2-envDEFAULT_PAYMENT-container" role="textbox" aria-readonly="true" title="Cash on Deliver" style="color: rgb(136, 152, 170);">Cash on Deliver</span><span class="select2-selection__arrow" role="presentation" style="top: 10px;"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>


                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[MULTI_CITY]" id="env[MULTI_CITY]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[MULTI_CITY]" id="env[MULTI_CITY]">
                                            <label class="custom-control-label" for="env[MULTI_CITY]">Is your project
                                                multi city</label>
                                        </div>
                                        <small class="text-muted"><strong>When selected, the frontpage will display list
                                                of cities</strong></small>
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[SINGLE_MODE]" id="env[SINGLE_MODE]hid">
                                            <input value="true" type="checkbox" class="custom-control-input" name="env[SINGLE_MODE]" id="env[SINGLE_MODE]">
                                            <label class="custom-control-label" for="env[SINGLE_MODE]">Single mode - run
                                                this site for one restaurant only</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[SINGLE_MODE_ID]" class="form-group focused">
                                        <label class="form-control-label" for="env[SINGLE_MODE_ID]">The id of the
                                            restaurant for single mode</label>
                                        <input step=".01" type="number" name="env[SINGLE_MODE_ID]" id="env[SINGLE_MODE_ID]" class="form-control form-control   " placeholder="" value="1" autofocus="">
                                        <small class="text-muted"><strong>If you have single mode selected, than this
                                                restaurant id will be showm</strong></small>
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_IMPORT_CSV]" id="env[ENABLE_IMPORT_CSV]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[ENABLE_IMPORT_CSV]" id="env[ENABLE_IMPORT_CSV]">
                                            <label class="custom-control-label" for="env[ENABLE_IMPORT_CSV]">Enable
                                                import via CSV for restaurant items</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[DRIVER_PERCENT_FROM_DELIVERY_FEE]" class="form-group focused">
                                        <label class="form-control-label" for="env[DRIVER_PERCENT_FROM_DELIVERY_FEE]">Driver percentage from delivery
                                            fee</label>
                                        <input step=".01" type="number" name="env[DRIVER_PERCENT_FROM_DELIVERY_FEE]" id="env[DRIVER_PERCENT_FROM_DELIVERY_FEE]" class="form-control form-control   " placeholder="" value="100" autofocus="">
                                    </div>
                                    <br>
                                    <h4 class="display-4 mb-0">Delivery costs</h4>
                                    <hr>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_COST_PER_DISTANCE]" id="env[ENABLE_COST_PER_DISTANCE]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[ENABLE_COST_PER_DISTANCE]" id="env[ENABLE_COST_PER_DISTANCE]">
                                            <label class="custom-control-label" for="env[ENABLE_COST_PER_DISTANCE]">Enable cost per distance</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[COST_PER_KILOMETER]" class="form-group focused">
                                        <label class="form-control-label" for="env[COST_PER_KILOMETER]">Cost per
                                            kilometer</label>
                                        <input step=".01" type="text" name="env[COST_PER_KILOMETER]" id="env[COST_PER_KILOMETER]" class="form-control form-control   " placeholder="" value="10" autofocus="">
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_COST_IN_RANGE]" id="env[ENABLE_COST_IN_RANGE]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[ENABLE_COST_IN_RANGE]" id="env[ENABLE_COST_IN_RANGE]">
                                            <label class="custom-control-label" for="env[ENABLE_COST_IN_RANGE]">Enable
                                                cost based on range</label>
                                        </div>
                                        <small class="text-muted"><strong>If you have enable cost based on range, the
                                                delivery cost will be calucalted based on what range the distance for
                                                delivery is in</strong></small>
                                    </div>
                                    <div id="form-group-env[RANGE_ONE]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_ONE]">First range</label>
                                        <input step=".01" type="text" name="env[RANGE_ONE]" id="env[RANGE_ONE]" class="form-control form-control   " placeholder="" value="0-5" autofocus="">
                                        <small class="text-muted"><strong>Range in kilometers ex from 0km - 5km will be
                                                0-5</strong></small>
                                    </div>
                                    <div id="form-group-env[RANGE_TWO]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_TWO]">Second range</label>
                                        <input step=".01" type="text" name="env[RANGE_TWO]" id="env[RANGE_TWO]" class="form-control form-control   " placeholder="" value="5-7" autofocus="">
                                    </div>
                                    <div id="form-group-env[RANGE_THREE]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_THREE]">Third range</label>
                                        <input step=".01" type="text" name="env[RANGE_THREE]" id="env[RANGE_THREE]" class="form-control form-control   " placeholder="" value="7-10" autofocus="">
                                    </div>
                                    <div id="form-group-env[RANGE_FOUR]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_FOUR]">Fourth range</label>
                                        <input step=".01" type="text" name="env[RANGE_FOUR]" id="env[RANGE_FOUR]" class="form-control form-control   " placeholder="" value="10-15" autofocus="">
                                    </div>
                                    <div id="form-group-env[RANGE_FIVE]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_FIVE]">Fifth range</label>
                                        <input step=".01" type="text" name="env[RANGE_FIVE]" id="env[RANGE_FIVE]" class="form-control form-control   " placeholder="" value="15-20" autofocus="">
                                    </div>
                                    <div id="form-group-env[RANGE_ONE_PRICE]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_ONE_PRICE]">Price for first
                                            range</label>
                                        <input step=".01" type="text" name="env[RANGE_ONE_PRICE]" id="env[RANGE_ONE_PRICE]" class="form-control form-control   " placeholder="" value="5" autofocus="">
                                    </div>
                                    <div id="form-group-env[RANGE_TWO_PRICE]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_TWO_PRICE]">Price for second
                                            range</label>
                                        <input step=".01" type="text" name="env[RANGE_TWO_PRICE]" id="env[RANGE_TWO_PRICE]" class="form-control form-control   " placeholder="" value="6" autofocus="">
                                    </div>
                                    <div id="form-group-env[RANGE_THREE_PRICE]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_THREE_PRICE]">Price for third
                                            range</label>
                                        <input step=".01" type="text" name="env[RANGE_THREE_PRICE]" id="env[RANGE_THREE_PRICE]" class="form-control form-control   " placeholder="" value="8" autofocus="">
                                    </div>
                                    <div id="form-group-env[RANGE_FOUR_PRICE]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_FOUR_PRICE]">Price for fourth
                                            range</label>
                                        <input step=".01" type="text" name="env[RANGE_FOUR_PRICE]" id="env[RANGE_FOUR_PRICE]" class="form-control form-control   " placeholder="" value="10" autofocus="">
                                    </div>
                                    <div id="form-group-env[RANGE_FIVE_PRICE]" class="form-group focused">
                                        <label class="form-control-label" for="env[RANGE_FIVE_PRICE]">Price for fifth
                                            range</label>
                                        <input step=".01" type="text" name="env[RANGE_FIVE_PRICE]" id="env[RANGE_FIVE_PRICE]" class="form-control form-control   " placeholder="" value="15" autofocus="">
                                    </div>
                                    <div id="form-group-env[DRIVER_PERCENT_FROM_DELIVERY_FEE]" class="form-group focused">
                                        <label class="form-control-label" for="env[DRIVER_PERCENT_FROM_DELIVERY_FEE]">Driver percent from the
                                            order</label>
                                        <input step=".01" type="text" name="env[DRIVER_PERCENT_FROM_DELIVERY_FEE]" id="env[DRIVER_PERCENT_FROM_DELIVERY_FEE]" class="form-control form-control   " placeholder="" value="100" autofocus="">
                                        <small class="text-muted"><strong>From 0-100. Based on your business type, this
                                                value determines how much driver will make from the delivery
                                                fee</strong></small>
                                    </div>
                                    <br>
                                    <h4 class="display-4 mb-0">Other settings</h4>
                                    <hr>
                                    <div id="form-group-env[MIN_PHONE_NUMBER]" class="form-group focused">
                                        <label class="form-control-label" for="env[MIN_PHONE_NUMBER]">Minimum phone
                                            number length</label>
                                        <input step=".01" type="number" name="env[MIN_PHONE_NUMBER]" id="env[MIN_PHONE_NUMBER]" class="form-control form-control   " placeholder="" value="9" autofocus="">
                                    </div>
                                    <div id="form-group-env[URL_ROUTE]" class="form-group focused">
                                        <label class="form-control-label" for="env[URL_ROUTE]">Url route for
                                            restaurant</label>
                                        <input step=".01" type="text" name="env[URL_ROUTE]" id="env[URL_ROUTE]" class="form-control form-control   " placeholder="" value="restaurant" autofocus="">
                                        <small class="text-muted"><strong>If you want to change the link the restaurant
                                                is open in. ex yourdomain.com/shop/shopname. shop - should be the value
                                                here</strong></small>
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_MILTILANGUAGE_MENUS]" id="env[ENABLE_MILTILANGUAGE_MENUS]hid">
                                            <input value="true" type="checkbox" class="custom-control-input" name="env[ENABLE_MILTILANGUAGE_MENUS]" id="env[ENABLE_MILTILANGUAGE_MENUS]">
                                            <label class="custom-control-label" for="env[ENABLE_MILTILANGUAGE_MENUS]">Enable multi language
                                                menus</label>
                                        </div>
                                        <small class="text-muted"><strong>When enabled, restaurants can add language
                                                version to the menu</strong></small>
                                    </div>
                                    <div id="form-group-env[DRIVER_LINK_REGISTER_POSITION]" class="form-group focused">

                                        <label class="form-control-label">Position for the register driver
                                            link</label><br>

                                        <select class="form-control form-control-alternative select2init select2-hidden-accessible" name="env[DRIVER_LINK_REGISTER_POSITION]" id="env[DRIVER_LINK_REGISTER_POSITION]" data-select2-id="env[DRIVER_LINK_REGISTER_POSITION]" tabindex="-1" aria-hidden="true">
                                            <option disabled="" selected="" value="" data-select2-id="32"> Select
                                                Position for the register driver link </option>
                                            <option selected="" value="footer" data-select2-id="4">Footer</option>
                                            <option value="navbar" data-select2-id="33">Navigation bar</option>
                                            <option value="dontshow" data-select2-id="34">Hidden</option>
                                        </select><span class="select2 select2-container select2-container--default form-control select2-container--below" dir="ltr" data-select2-id="3" style="width: 300px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-envDRIVER_LINK_REGISTER_POSITION-container" style="border: 0px;"><span class="select2-selection__rendered" id="select2-envDRIVER_LINK_REGISTER_POSITION-container" role="textbox" aria-readonly="true" title="Footer" style="color: rgb(136, 152, 170);">Footer</span><span class="select2-selection__arrow" role="presentation" style="top: 10px;"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>


                                    </div>
                                    <div id="form-group-env[RESTAURANT_LINK_REGISTER_POSITION]" class="form-group focused">

                                        <label class="form-control-label">Position for the register restaurant
                                            link</label><br>

                                        <select class="form-control form-control-alternative select2init select2-hidden-accessible" name="env[RESTAURANT_LINK_REGISTER_POSITION]" id="env[RESTAURANT_LINK_REGISTER_POSITION]" data-select2-id="env[RESTAURANT_LINK_REGISTER_POSITION]" tabindex="-1" aria-hidden="true">
                                            <option disabled="" selected="" value=""> Select Position for the register
                                                restaurant link </option>
                                            <option selected="" value="footer" data-select2-id="6">Footer</option>
                                            <option value="navbar">Navigation bar</option>
                                            <option value="dontshow">Hidden</option>
                                        </select><span class="select2 select2-container select2-container--default form-control" dir="ltr" data-select2-id="5" style="width: 300px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-envRESTAURANT_LINK_REGISTER_POSITION-container" style="border: 0px;"><span class="select2-selection__rendered" id="select2-envRESTAURANT_LINK_REGISTER_POSITION-container" role="textbox" aria-readonly="true" title="Footer" style="color: rgb(136, 152, 170);">Footer</span><span class="select2-selection__arrow" role="presentation" style="top: 10px;"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>


                                    </div>
                                    <div id="form-group-env[DRIVER_LINK_REGISTER_TITLE]" class="form-group focused">
                                        <label class="form-control-label" for="env[DRIVER_LINK_REGISTER_TITLE]">Title of
                                            driver link</label>
                                        <input step=".01" type="text" name="env[DRIVER_LINK_REGISTER_TITLE]" id="env[DRIVER_LINK_REGISTER_TITLE]" class="form-control form-control   " placeholder="" value="Register as driver" autofocus="">
                                    </div>
                                    <div id="form-group-env[RESTAURANT_LINK_REGISTER_TITLE]" class="form-group focused">
                                        <label class="form-control-label" for="env[RESTAURANT_LINK_REGISTER_TITLE]">Title for the register restaurant
                                            link</label>
                                        <input step=".01" type="text" name="env[RESTAURANT_LINK_REGISTER_TITLE]" id="env[RESTAURANT_LINK_REGISTER_TITLE]" class="form-control form-control   " placeholder="" value="Add your restaurant" autofocus="">
                                    </div>
                                    <div id="form-group-env[APP_SECRET]" class="form-group focused">
                                        <label class="form-control-label" for="env[APP_SECRET]">Mobile app
                                            secret</label>
                                        <input step=".01" type="text" name="env[APP_SECRET]" id="env[APP_SECRET]" class="form-control form-control   " placeholder="" value="app_secret" autofocus="">
                                    </div>
                                    <div id="form-group-env[APP_ENV]" class="form-group focused">

                                        <label class="form-control-label">App environment</label><br>

                                        <select class="form-control form-control-alternative select2init select2-hidden-accessible" name="env[APP_ENV]" id="env[APP_ENV]" data-select2-id="env[APP_ENV]" tabindex="-1" aria-hidden="true">
                                            <option disabled="" selected="" value="" data-select2-id="37"> Select App
                                                environment </option>
                                            <option value="local" data-select2-id="38">Local</option>
                                            <option selected="" value="prodcution" data-select2-id="8">Production
                                            </option>
                                        </select><span class="select2 select2-container select2-container--default form-control select2-container--below" dir="ltr" data-select2-id="7" style="width: 300px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-envAPP_ENV-container" style="border: 0px;"><span class="select2-selection__rendered" id="select2-envAPP_ENV-container" role="textbox" aria-readonly="true" title="Production" style="color: rgb(136, 152, 170);">Production</span><span class="select2-selection__arrow" role="presentation" style="top: 10px;"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>


                                    </div>
                                    <div id="form-group-env[APP_LOG_LEVEL]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[APP_LOG_LEVEL]" id="env[APP_LOG_LEVEL]" class="form-control form-control   " placeholder="" value="debug" autofocus="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments">

                                <div class="">
                                    <h4 class="display-4 mb-0">Stripe</h4>
                                    <hr>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_STRIPE]" id="env[ENABLE_STRIPE]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[ENABLE_STRIPE]" id="env[ENABLE_STRIPE]">
                                            <label class="custom-control-label" for="env[ENABLE_STRIPE]">Enable stripe
                                                for payments when ordering</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[STRIPE_KEY]" class="form-group focused">
                                        <label class="form-control-label" for="env[STRIPE_KEY]">Stripe API key</label>
                                        <input step=".01" type="text" name="env[STRIPE_KEY]" id="env[STRIPE_KEY]" class="form-control form-control   " placeholder="" value="pk_test_Uxj4Pt9ukgWJJyZG73NCeVgs" autofocus="">
                                    </div>
                                    <div id="form-group-env[STRIPE_SECRET]" class="form-group focused">
                                        <label class="form-control-label" for="env[STRIPE_SECRET]">Stripe API
                                            Secret</label>
                                        <input step=".01" type="text" name="env[STRIPE_SECRET]" id="env[STRIPE_SECRET]" class="form-control form-control   " placeholder="" value="sk_test_242cZSUo0JisQBsYKPENSeyz" autofocus="">
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_STRIPE_CONNECT]" id="env[ENABLE_STRIPE_CONNECT]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[ENABLE_STRIPE_CONNECT]" id="env[ENABLE_STRIPE_CONNECT]">
                                            <label class="custom-control-label" for="env[ENABLE_STRIPE_CONNECT]">Enable
                                                Stripe connect</label>
                                        </div>
                                        <small class="text-muted"><strong>If enabled, restaurants will be able to
                                                connect, and money to be send directly to them</strong></small>
                                    </div>
                                    <br>
                                    <h4 class="display-4 mb-0">Paypal</h4>
                                    <hr>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_PAYPAL]" id="env[ENABLE_PAYPAL]hid">
                                            <input value="true" type="checkbox" class="custom-control-input" name="env[ENABLE_PAYPAL]" id="env[ENABLE_PAYPAL]">
                                            <label class="custom-control-label" for="env[ENABLE_PAYPAL]">Enable paypal
                                                for payments when ordering</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[PAYPAL_CLIENT_ID]" class="form-group">
                                        <label class="form-control-label" for="env[PAYPAL_CLIENT_ID]">Paypal client
                                            id</label>
                                        <input step=".01" type="text" name="env[PAYPAL_CLIENT_ID]" id="env[PAYPAL_CLIENT_ID]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[PAYPAL_SECRET]" class="form-group">
                                        <label class="form-control-label" for="env[PAYPAL_SECRET]">Paypal secret</label>
                                        <input step=".01" type="text" name="env[PAYPAL_SECRET]" id="env[PAYPAL_SECRET]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[PAYPAL_MODE]" class="form-group focused">

                                        <label class="form-control-label">Paypal mode</label><br>

                                        <select class="form-control form-control-alternative select2init select2-hidden-accessible" name="env[PAYPAL_MODE]" id="env[PAYPAL_MODE]" data-select2-id="env[PAYPAL_MODE]" tabindex="-1" aria-hidden="true">
                                            <option disabled="" selected="" value="" data-select2-id="41"> Select Paypal
                                                mode </option>
                                            <option selected="" value="sandbox" data-select2-id="10">Development -
                                                sandbox</option>
                                            <option value="live" data-select2-id="42">Production - live</option>
                                        </select><span class="select2 select2-container select2-container--default form-control select2-container--below" dir="ltr" data-select2-id="9" style="width: 300px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-envPAYPAL_MODE-container" style="border: 0px;"><span class="select2-selection__rendered" id="select2-envPAYPAL_MODE-container" role="textbox" aria-readonly="true" title="Development - sandbox" style="color: rgb(136, 152, 170);">Development -
                                                        sandbox</span><span class="select2-selection__arrow" role="presentation" style="top: 10px;"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>


                                    </div>
                                    <br>
                                    <h4 class="display-4 mb-0">Mollie</h4>
                                    <hr>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_MOLLIE]" id="env[ENABLE_MOLLIE]hid">
                                            <input value="true" type="checkbox" class="custom-control-input" name="env[ENABLE_MOLLIE]" id="env[ENABLE_MOLLIE]">
                                            <label class="custom-control-label" for="env[ENABLE_MOLLIE]">Enable mollie
                                                for payments when ordering</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[MOLLIE_KEY]" class="form-group">
                                        <label class="form-control-label" for="env[MOLLIE_KEY]">Mollie client
                                            key</label>
                                        <input step=".01" type="text" name="env[MOLLIE_KEY]" id="env[MOLLIE_KEY]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <br>
                                    <h4 class="display-4 mb-0">Paystack</h4>
                                    <hr>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_PAYSTACK]" id="env[ENABLE_PAYSTACK]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[ENABLE_PAYSTACK]" id="env[ENABLE_PAYSTACK]">
                                            <label class="custom-control-label" for="env[ENABLE_PAYSTACK]">Paystak
                                                payments enabled</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[PAYSTACK_PUBLIC_KEY]" class="form-group">
                                        <label class="form-control-label" for="env[PAYSTACK_PUBLIC_KEY]">PAYSTACK_PUBLIC_KEY</label>
                                        <input step=".01" type="text" name="env[PAYSTACK_PUBLIC_KEY]" id="env[PAYSTACK_PUBLIC_KEY]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[PAYSTACK_SECRET_KEY]" class="form-group">
                                        <label class="form-control-label" for="env[PAYSTACK_SECRET_KEY]">Secret
                                            key</label>
                                        <input step=".01" type="text" name="env[PAYSTACK_SECRET_KEY]" id="env[PAYSTACK_SECRET_KEY]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[MERCHANT_EMAIL]" class="form-group">
                                        <label class="form-control-label" for="env[MERCHANT_EMAIL]">Merchant
                                            email</label>
                                        <input step=".01" type="text" name="env[MERCHANT_EMAIL]" id="env[MERCHANT_EMAIL]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                        <div id="pwm-inline-icon-86297" class="pwm-field-icon" style="position: absolute !important; width: 18px !important; height: 18px !important; min-height: 0px !important; min-width: 0px !important; z-index: 2147483645 !important; box-shadow: none !important; box-sizing: content-box !important; background: none !important; border: none !important; padding: 0px !important; cursor: pointer !important; outline: none !important; margin-top: -32px; margin-left: 949px;">
                                            <svg style="display: inline-block !important; width: 16px !important; height: 16px !important; fill: rgb(230, 0, 23) !important; margin-top: 0.5px !important; position: absolute !important; top: 0px !important; left: 0px !important;" viewBox="0 0 40 64">
                                                <g>
                                                    <path d="m20,28.12a33.78,33.78 0 0 1 13.36,2.74a22.18,22.18 0 0 1 0.64,5.32c0,9.43 -5.66,17.81 -14,20.94c-8.34,-3.13 -14,-11.51 -14,-20.94a22.2,22.2 0 0 1 0.64,-5.32a33.78,33.78 0 0 1 13.36,-2.74m0,-28.12c-8.82,0 -14,7.36 -14,16.41l0,5.16c2,-1.2 2,-1.49 5,-2.08l0,-3.08c0,-6.21 2.9,-11.41 8.81,-11.41l0.19,0c6.6,0 9,4.77 9,11.41l0,3.08c3,0.58 3,0.88 5,2.08l0,-5.16c0,-9 -5.18,-16.41 -14,-16.41l0,0zm0,22c-6.39,0 -12.77,0.67 -18.47,4a31.6,31.6 0 0 0 -1.53,9.74c0,13.64 8.52,25 20,28.26c11.48,-3.27 20,-14.63 20,-28.26a31.66,31.66 0 0 0 -1.54,-9.77c-5.69,-3.3 -12.08,-4 -18.47,-4l0,0l0.01,0.03z">
                                                    </path>
                                                    <path d="m21.23,39.5a2.81,2.81 0 0 0 1.77,-2.59a2.94,2.94 0 0 0 -3,-2.93a3,3 0 0 0 -3,3a2.66,2.66 0 0 0 1.77,2.48l-1.77,4.54l6,0l-1.77,-4.5z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <div id="form-group-env[PAYSTACK_PAYMENT_URL]" class="form-group focused">
                                        <label class="form-control-label" for="env[PAYSTACK_PAYMENT_URL]">Paystack
                                            payment url</label>
                                        <input step=".01" type="text" name="env[PAYSTACK_PAYMENT_URL]" id="env[PAYSTACK_PAYMENT_URL]" class="form-control form-control   " placeholder="" value="https://api.paystack.co" autofocus="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="plugins" role="tabpanel" aria-labelledby="plugins">

                                <div class="">
                                    <br>
                                    <h4 class="display-4 mb-0">Google plugins</h4>
                                    <hr>
                                    <div id="form-group-env[RECAPTCHA_SITE_KEY]" class="form-group">
                                        <label class="form-control-label" for="env[RECAPTCHA_SITE_KEY]">Recaptcha site
                                            key</label>
                                        <input step=".01" type="text" name="env[RECAPTCHA_SITE_KEY]" id="env[RECAPTCHA_SITE_KEY]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                        <small class="text-muted"><strong>Make empty if you can't make submition on
                                                register screen</strong></small>
                                    </div>
                                    <div id="form-group-env[RECAPTCHA_SECRET_KEY]" class="form-group">
                                        <label class="form-control-label" for="env[RECAPTCHA_SECRET_KEY]">Recaptcha
                                            secret</label>
                                        <input step=".01" type="text" name="env[RECAPTCHA_SECRET_KEY]" id="env[RECAPTCHA_SECRET_KEY]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                        <small class="text-muted"><strong>Make empty if you can't make submition on
                                                register screen</strong></small>
                                    </div>
                                    <div id="form-group-env[GOOGLE_MAPS_API_KEY]" class="form-group focused">
                                        <label class="form-control-label" for="env[GOOGLE_MAPS_API_KEY]">Google maps api
                                            key</label>
                                        <input step=".01" type="text" name="env[GOOGLE_MAPS_API_KEY]" id="env[GOOGLE_MAPS_API_KEY]" class="form-control form-control   " placeholder="" value="AIzaSyAKwIV-6y31LwzBieBhJqAztrZL9C76T7Y" autofocus="">
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[ENABLE_LOCATION_SEARCH]" id="env[ENABLE_LOCATION_SEARCH]hid">
                                            <input value="true" checked="" type="checkbox" class="custom-control-input" name="env[ENABLE_LOCATION_SEARCH]" id="env[ENABLE_LOCATION_SEARCH]">
                                            <label class="custom-control-label" for="env[ENABLE_LOCATION_SEARCH]">Enable
                                                location search</label>
                                        </div>
                                    </div>
                                    <div id="form-group-env[GOOGLE_ANALYTICS]" class="form-group">
                                        <label class="form-control-label" for="env[GOOGLE_ANALYTICS]">Google analytics
                                            key</label>
                                        <input step=".01" type="text" name="env[GOOGLE_ANALYTICS]" id="env[GOOGLE_ANALYTICS]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <br>
                                    <h4 class="display-4 mb-0">Login services</h4>
                                    <hr>
                                    <div id="form-group-env[GOOGLE_CLIENT_ID]" class="form-group focused">
                                        <label class="form-control-label" for="env[GOOGLE_CLIENT_ID]">Google client id
                                            for sign in</label>
                                        <input step=".01" type="text" name="env[GOOGLE_CLIENT_ID]" id="env[GOOGLE_CLIENT_ID]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[GOOGLE_CLIENT_SECRET]" class="form-group focused">
                                        <label class="form-control-label" for="env[GOOGLE_CLIENT_SECRET]">Google client
                                            secret for sign in</label>
                                        <input step=".01" type="text" name="env[GOOGLE_CLIENT_SECRET]" id="env[GOOGLE_CLIENT_SECRET]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[GOOGLE_REDIRECT]" class="form-group focused">
                                        <label class="form-control-label" for="env[GOOGLE_REDIRECT]">Google redirect
                                            link for sign in</label>
                                        <input step=".01" type="text" name="env[GOOGLE_REDIRECT]" id="env[GOOGLE_REDIRECT]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[FACEBOOK_CLIENT_ID]" class="form-group focused">
                                        <label class="form-control-label" for="env[FACEBOOK_CLIENT_ID]">Facebook client
                                            id</label>
                                        <input step=".01" type="text" name="env[FACEBOOK_CLIENT_ID]" id="env[FACEBOOK_CLIENT_ID]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[FACEBOOK_CLIENT_SECRET]" class="form-group focused">
                                        <label class="form-control-label" for="env[FACEBOOK_CLIENT_SECRET]">Facebook
                                            client secret</label>
                                        <input step=".01" type="text" name="env[FACEBOOK_CLIENT_SECRET]" id="env[FACEBOOK_CLIENT_SECRET]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[FACEBOOK_REDIRECT]" class="form-group focused">
                                        <label class="form-control-label" for="env[FACEBOOK_REDIRECT]">Facebook
                                            redirec</label>
                                        <input step=".01" type="text" name="env[FACEBOOK_REDIRECT]" id="env[FACEBOOK_REDIRECT]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <br>
                                    <h4 class="display-4 mb-0">Notifications</h4>
                                    <hr>
                                    <div id="form-group-env[ONESIGNAL_APP_ID]" class="form-group focused">
                                        <label class="form-control-label" for="env[ONESIGNAL_APP_ID]">Onesignal App
                                            id</label>
                                        <input step=".01" type="text" name="env[ONESIGNAL_APP_ID]" id="env[ONESIGNAL_APP_ID]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[ONESIGNAL_REST_API_KEY]" class="form-group focused">
                                        <label class="form-control-label" for="env[ONESIGNAL_REST_API_KEY]">Onesignal
                                            rest api key</label>
                                        <input step=".01" type="text" name="env[ONESIGNAL_REST_API_KEY]" id="env[ONESIGNAL_REST_API_KEY]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[TWILIO_ACCOUNT_SID]" class="form-group focused">
                                        <label class="form-control-label" for="env[TWILIO_ACCOUNT_SID]">Twillo Account
                                            SID</label>
                                        <input step=".01" type="text" name="env[TWILIO_ACCOUNT_SID]" id="env[TWILIO_ACCOUNT_SID]" class="form-control form-control   " placeholder="" value="SID" autofocus="" oldautocomplete="remove" autocomplete="off">
                                        <div id="pwm-inline-icon-25856" class="pwm-field-icon" style="position: absolute !important; width: 18px !important; height: 18px !important; min-height: 0px !important; min-width: 0px !important; z-index: 2147483645 !important; box-shadow: none !important; box-sizing: content-box !important; background: none !important; border: none !important; padding: 0px !important; cursor: pointer !important; outline: none !important; margin-top: -32px; margin-left: 949px;">
                                            <svg style="display: inline-block !important; width: 16px !important; height: 16px !important; fill: rgb(230, 0, 23) !important; margin-top: 0.5px !important; position: absolute !important; top: 0px !important; left: 0px !important;" viewBox="0 0 40 64">
                                                <g>
                                                    <path d="m20,28.12a33.78,33.78 0 0 1 13.36,2.74a22.18,22.18 0 0 1 0.64,5.32c0,9.43 -5.66,17.81 -14,20.94c-8.34,-3.13 -14,-11.51 -14,-20.94a22.2,22.2 0 0 1 0.64,-5.32a33.78,33.78 0 0 1 13.36,-2.74m0,-28.12c-8.82,0 -14,7.36 -14,16.41l0,5.16c2,-1.2 2,-1.49 5,-2.08l0,-3.08c0,-6.21 2.9,-11.41 8.81,-11.41l0.19,0c6.6,0 9,4.77 9,11.41l0,3.08c3,0.58 3,0.88 5,2.08l0,-5.16c0,-9 -5.18,-16.41 -14,-16.41l0,0zm0,22c-6.39,0 -12.77,0.67 -18.47,4a31.6,31.6 0 0 0 -1.53,9.74c0,13.64 8.52,25 20,28.26c11.48,-3.27 20,-14.63 20,-28.26a31.66,31.66 0 0 0 -1.54,-9.77c-5.69,-3.3 -12.08,-4 -18.47,-4l0,0l0.01,0.03z">
                                                    </path>
                                                    <path d="m21.23,39.5a2.81,2.81 0 0 0 1.77,-2.59a2.94,2.94 0 0 0 -3,-2.93a3,3 0 0 0 -3,3a2.66,2.66 0 0 0 1.77,2.48l-1.77,4.54l6,0l-1.77,-4.5z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <div id="form-group-env[TWILIO_AUTH_TOKEN]" class="form-group focused">
                                        <label class="form-control-label" for="env[TWILIO_AUTH_TOKEN]">Twillo Account
                                            auth token</label>
                                        <input step=".01" type="text" name="env[TWILIO_AUTH_TOKEN]" id="env[TWILIO_AUTH_TOKEN]" class="form-control form-control" placeholder="" value="TOKEN" autofocus="">
                                    </div>
                                    <div id="form-group-env[TWILIO_FROM]" class="form-group focused">
                                        <label class="form-control-label" for="env[TWILIO_FROM]">Twillo from
                                            number</label>
                                        <input step=".01" type="text" name="env[TWILIO_FROM]" id="env[TWILIO_FROM]" class="form-control form-control" placeholder="" value="NUMBER" autofocus="">
                                    </div>
                                    <div class="form-group  ">

                                        <div class="custom-control custom-checkbox">
                                            <input type="hidden" value="false" name="env[SEND_SMS_NOTIFICATIONS]" id="env[SEND_SMS_NOTIFICATIONS]hid">
                                            <input value="true" type="checkbox" class="custom-control-input" name="env[SEND_SMS_NOTIFICATIONS]" id="env[SEND_SMS_NOTIFICATIONS]">
                                            <label class="custom-control-label" for="env[SEND_SMS_NOTIFICATIONS]">System
                                                should send sms notifications</label>
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="display-4 mb-0">Pusher live notifications</h4>
                                    <hr>
                                    <div id="form-group-env[PUSHER_APP_ID]" class="form-group">
                                        <label class="form-control-label" for="env[PUSHER_APP_ID]">Pusher app id</label>
                                        <input step=".01" type="text" name="env[PUSHER_APP_ID]" id="env[PUSHER_APP_ID]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                        <small class="text-muted"><strong>Pusher is used for notification for call
                                                waiter and new orders avaialbe</strong></small>
                                    </div>
                                    <div id="form-group-env[PUSHER_APP_KEY]" class="form-group">
                                        <label class="form-control-label" for="env[PUSHER_APP_KEY]">Pusher app
                                            key</label>
                                        <input step=".01" type="text" name="env[PUSHER_APP_KEY]" id="env[PUSHER_APP_KEY]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[PUSHER_APP_SECRET]" class="form-group">
                                        <label class="form-control-label" for="env[PUSHER_APP_SECRET]">Pusher app
                                            secret</label>
                                        <input step=".01" type="text" name="env[PUSHER_APP_SECRET]" id="env[PUSHER_APP_SECRET]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[PUSHER_APP_CLUSTER]" class="form-group focused">
                                        <label class="form-control-label" for="env[PUSHER_APP_CLUSTER]">Pusher app
                                            cluster</label>
                                        <input step=".01" type="text" name="env[PUSHER_APP_CLUSTER]" id="env[PUSHER_APP_CLUSTER]" class="form-control form-control   " placeholder="" value="mt1" autofocus="">
                                    </div>
                                    <div id="form-group-env[BROADCAST_DRIVER]" class="form-group focused">

                                        <label class="form-control-label">Broadcast Driver</label><br>

                                        <select class="form-control form-control-alternative select2init select2-hidden-accessible" name="env[BROADCAST_DRIVER]" id="env[BROADCAST_DRIVER]" data-select2-id="env[BROADCAST_DRIVER]" tabindex="-1" aria-hidden="true">
                                            <option disabled="" selected="" value="" data-select2-id="45"> Select
                                                Broadcast Driver </option>
                                            <option selected="" value="log" data-select2-id="20">Log</option>
                                            <option value="pusher" data-select2-id="46">Pusher</option>
                                        </select><span class="select2 select2-container select2-container--default form-control select2-container--below" dir="ltr" data-select2-id="19" style="width: 300px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-envBROADCAST_DRIVER-container" style="border: 0px;"><span class="select2-selection__rendered" id="select2-envBROADCAST_DRIVER-container" role="textbox" aria-readonly="true" title="Log" style="color: rgb(136, 152, 170);">Log</span><span class="select2-selection__arrow" role="presentation" style="top: 10px;"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>


                                    </div>
                                    <br>
                                    <h4 class="display-4 mb-0">Share this</h4>
                                    <hr>
                                    <div id="form-group-env[SHARE_THIS_PROPERTY]" class="form-group">
                                        <label class="form-control-label" for="env[SHARE_THIS_PROPERTY]">Share this
                                            property id</label>
                                        <input step=".01" type="text" name="env[SHARE_THIS_PROPERTY]" id="env[SHARE_THIS_PROPERTY]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                        <small class="text-muted"><strong>You can find this number in Share this import
                                                link</strong></small>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade active show" id="smtp" role="tabpanel" aria-labelledby="smtp">

                                <div class="">
                                    <div id="form-group-env[MAIL_MAILER]" class="form-group focused">

                                        <label class="form-control-label">Mail driver</label><br>

                                        <select class="form-control form-control-alternative select2init select2-hidden-accessible" name="env[MAIL_MAILER]" id="env[MAIL_MAILER]" data-select2-id="env[MAIL_MAILER]" tabindex="-1" aria-hidden="true">
                                            <option disabled="" selected="" value=""> Select Mail driver </option>
                                            <option selected="" value="smtp" data-select2-id="22">SMTP</option>
                                            <option value="sendmail">PHP Sendmail - best of port 465</option>
                                        </select><span class="select2 select2-container select2-container--default form-control" dir="ltr" data-select2-id="21" style="width: 300px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-envMAIL_MAILER-container" style="border: 0px;"><span class="select2-selection__rendered" id="select2-envMAIL_MAILER-container" role="textbox" aria-readonly="true" title="SMTP" style="color: rgb(136, 152, 170);">SMTP</span><span class="select2-selection__arrow" role="presentation" style="top: 10px;"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>


                                    </div>
                                    <div id="form-group-env[MAIL_HOST]" class="form-group focused">
                                        <label class="form-control-label" for="env[MAIL_HOST]">Host</label>
                                        <input step=".01" type="text" name="env[MAIL_HOST]" id="env[MAIL_HOST]" class="form-control form-control   " placeholder="" value="smtp.mailtrap.io" autofocus="">
                                    </div>
                                    <div id="form-group-env[MAIL_PORT]" class="form-group focused">
                                        <label class="form-control-label" for="env[MAIL_PORT]">Port</label>
                                        <input step=".01" type="text" name="env[MAIL_PORT]" id="env[MAIL_PORT]" class="form-control form-control   " placeholder="" value="2525" autofocus="">
                                        <small class="text-muted"><strong>Common ports are 26, 465, 587</strong></small>
                                    </div>
                                    <div id="form-group-env[MAIL_ENCRYPTION]" class="form-group" data-select2-id="form-group-env[MAIL_ENCRYPTION]">

                                        <label class="form-control-label">Encryption</label><br>

                                        <select class="form-control form-control-alternative select2init select2-hidden-accessible" name="env[MAIL_ENCRYPTION]" id="env[MAIL_ENCRYPTION]" data-select2-id="env[MAIL_ENCRYPTION]" tabindex="-1" aria-hidden="true">
                                            <option disabled="" selected="" value="" data-select2-id="24"> Select
                                                Encryption </option>
                                            <option value="null" data-select2-id="49">Null - best for port 26</option>
                                            <option value="" data-select2-id="50">None - best for port 587</option>
                                            <option value="ssl" data-select2-id="51">SSL - best for port 465</option>
                                        </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="23" style="width: 100px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-envMAIL_ENCRYPTION-container"><span class="select2-selection__rendered" id="select2-envMAIL_ENCRYPTION-container" role="textbox" aria-readonly="true" title=" Select Encryption "> Select
                                                        Encryption </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>


                                    </div>
                                    <div id="form-group-env[MAIL_USERNAME]" class="form-group focused">
                                        <label class="form-control-label" for="env[MAIL_USERNAME]">Username</label>
                                        <input step=".01" type="text" name="env[MAIL_USERNAME]" id="env[MAIL_USERNAME]" class="form-control form-control   " placeholder="" value="802fc656dd8029" autofocus="">
                                        <div id="pwm-inline-icon-19139" class="pwm-field-icon" style="position: absolute !important; width: 18px !important; height: 18px !important; min-height: 0px !important; min-width: 0px !important; z-index: 2147483645 !important; box-shadow: none !important; box-sizing: content-box !important; background: none !important; border: none !important; padding: 0px !important; cursor: pointer !important; outline: none !important; margin-top: -32px; margin-left: 949px;">
                                            <svg style="display: inline-block !important; width: 16px !important; height: 16px !important; fill: rgb(230, 0, 23) !important; margin-top: 0.5px !important; position: absolute !important; top: 0px !important; left: 0px !important;" viewBox="0 0 40 64">
                                                <g>
                                                    <path d="m20,28.12a33.78,33.78 0 0 1 13.36,2.74a22.18,22.18 0 0 1 0.64,5.32c0,9.43 -5.66,17.81 -14,20.94c-8.34,-3.13 -14,-11.51 -14,-20.94a22.2,22.2 0 0 1 0.64,-5.32a33.78,33.78 0 0 1 13.36,-2.74m0,-28.12c-8.82,0 -14,7.36 -14,16.41l0,5.16c2,-1.2 2,-1.49 5,-2.08l0,-3.08c0,-6.21 2.9,-11.41 8.81,-11.41l0.19,0c6.6,0 9,4.77 9,11.41l0,3.08c3,0.58 3,0.88 5,2.08l0,-5.16c0,-9 -5.18,-16.41 -14,-16.41l0,0zm0,22c-6.39,0 -12.77,0.67 -18.47,4a31.6,31.6 0 0 0 -1.53,9.74c0,13.64 8.52,25 20,28.26c11.48,-3.27 20,-14.63 20,-28.26a31.66,31.66 0 0 0 -1.54,-9.77c-5.69,-3.3 -12.08,-4 -18.47,-4l0,0l0.01,0.03z">
                                                    </path>
                                                    <path d="m21.23,39.5a2.81,2.81 0 0 0 1.77,-2.59a2.94,2.94 0 0 0 -3,-2.93a3,3 0 0 0 -3,3a2.66,2.66 0 0 0 1.77,2.48l-1.77,4.54l6,0l-1.77,-4.5z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                    <div id="form-group-env[MAIL_PASSWORD]" class="form-group focused">
                                        <label class="form-control-label" for="env[MAIL_PASSWORD]">Password</label>
                                        <input step=".01" type="text" name="env[MAIL_PASSWORD]" id="env[MAIL_PASSWORD]" class="form-control form-control   " placeholder="" value="bbcf39d313eac6" autofocus="">
                                    </div>
                                    <div id="form-group-env[MAIL_FROM_ADDRESS]" class="form-group focused">
                                        <label class="form-control-label" for="env[MAIL_FROM_ADDRESS]">From
                                            address</label>
                                        <input step=".01" type="text" name="env[MAIL_FROM_ADDRESS]" id="env[MAIL_FROM_ADDRESS]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[MAIL_FROM_NAME]" class="form-group focused">
                                        <label class="form-control-label" for="env[MAIL_FROM_NAME]">From Name</label>
                                        <input step=".01" type="text" name="env[MAIL_FROM_NAME]" id="env[MAIL_FROM_NAME]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[DB_CONNECTION]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[DB_CONNECTION]" id="env[DB_CONNECTION]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[DB_HOST]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[DB_HOST]" id="env[DB_HOST]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[DB_PORT]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[DB_PORT]" id="env[DB_PORT]" class="form-control form-control   " placeholder="" value="3306" autofocus="">
                                    </div>
                                    <div id="form-group-env[DB_DATABASE]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[DB_DATABASE]" id="env[DB_DATABASE]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[DB_USERNAME]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[DB_USERNAME]" id="env[DB_USERNAME]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[DB_PASSWORD]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[DB_PASSWORD]" id="env[DB_PASSWORD]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[CACHE_DRIVER]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[CACHE_DRIVER]" id="env[CACHE_DRIVER]" class="form-control form-control   " placeholder="" value="file" autofocus="">
                                    </div>
                                    <div id="form-group-env[SESSION_DRIVER]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[SESSION_DRIVER]" id="env[SESSION_DRIVER]" class="form-control form-control   " placeholder="" value="file" autofocus="">
                                    </div>
                                    <div id="form-group-env[QUEUE_DRIVER]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[QUEUE_DRIVER]" id="env[QUEUE_DRIVER]" class="form-control form-control   " placeholder="" value="sync" autofocus="">
                                    </div>
                                    <div id="form-group-env[REDIS_HOST]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[REDIS_HOST]" id="env[REDIS_HOST]" class="form-control form-control   " placeholder="" value="127.0.0.1" autofocus="">
                                    </div>
                                    <div id="form-group-env[REDIS_PASSWORD]" class="form-group">
                                        <input step=".01" type="hidden" name="env[REDIS_PASSWORD]" id="env[REDIS_PASSWORD]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                    <div id="form-group-env[REDIS_PORT]" class="form-group focused">
                                        <input step=".01" type="hidden" name="env[REDIS_PORT]" id="env[REDIS_PORT]" class="form-control form-control   " placeholder="" value="" autofocus="">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection