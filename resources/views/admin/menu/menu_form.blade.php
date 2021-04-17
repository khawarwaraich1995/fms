@extends('layouts.app', ['title' => __('Menu')])

@section('content')
@include('users.partials.header', [
'title' => __('Add new Item'),
'class' => 'col-lg-12',
])
<?php

if (isset($menu->id) && $menu->id != 0) {
    $submit_url = route('admin:menu.update', [$menu->id ?? '']);
} else {
    $submit_url = route('admin:menu.add');
}
?>

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-7">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Item Management</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('admin:menu') }}" class="btn btn-sm btn-primary">Back to items</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-12">
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">Item information</h6>
                    <div class="pl-lg-4">
                        <form method="post" id="item-form" action="{{$submit_url}}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="item_name">Item Name</label>
                                        <input type="text" name="item_name" id="item_name" class="form-control form-control-alternative" placeholder="Name" value="{{$menu->item_name ?? ''}}">
                                    </div>
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="item_cat_id">Item Category</label>
                                        <select class="form-control form-control-alternative" name="item_cat_id">
                                            @if(isset($categories) && !empty($categories))
                                            @foreach ($categories as $key => $value)
                                            <option value="{{$value->id}}" <?php if (isset($menu->item_cat_id) && $menu->item_cat_id == $value->id) {
                                                                                echo "selected";
                                                                            } ?>>{{$value->cat_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="item_image">Item Image</label>
                                        @php
                                        if(isset($menu) && !empty($menu->item_image) && File::exists(public_path(ORIGNAL_IMAGE_PATH_ITEMS.$menu->item_image)))
                                        {
                                        $path = BASE_URL.ORIGNAL_IMAGE_PATH_ITEMS.$menu->item_image;
                                        }else
                                        {
                                        $path = NO_IMAGE;
                                        }
                                        @endphp
                                        <div style="display: flex;justify-content: center;">
                                            <input type="file" name="item_image" class="dropify" data-default-file="{{$path}}" />
                                        </div>
                                    </div>
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="item_price">Item Price</label>
                                        <input type="number" name="item_price" id="item_price" class="form-control form-control-alternative" placeholder="Price" value="{{$menu->item_price ?? ''}}">
                                    </div>
                                    <div class="form-group focused">
                                        <div class="row">
                                            <div class="col-lg-7 col-md-7">
                                                <label class="form-control-label" for="item_discount">Item Discount</label>
                                                <input type="number" name="item_discount" id="item_discount" class="form-control form-control-alternative" placeholder="Discount" value="{{$menu->item_discount ?? ''}}">
                                            </div>
                                            <div class="col-lg-5 col-md-5">
                                                <label class="form-control-label" for="item_discount_type">Discount Type</label>
                                                <select class="form-control form-control-alternative required" name="item_discount_type">
                                                    <option value="percent" <?php if (isset($menu) && $menu->item_discount_type == "percent") {
                                                                                echo "selected";
                                                                            } ?>> Percentage (%)</option>
                                                    <option value="amount" <?php if (isset($menu) && $menu->item_discount_type == "amount") {
                                                                                echo "selected";
                                                                            } ?>> Exact Amount</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form-group-vat" class="form-group focused">
                                        <label class="form-control-label" for="item_vat">VAT percentage (will be added into Item Price)</label>
                                        <input type="number" name="item_vat" id="item_vat" class="form-control form-control form-control-alternative" placeholder="Item VAT percentage" value="{{$menu->item_vat ?? ''}}">
                                    </div>
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="item_description">Item
                                            Description</label>
                                        <textarea id="item_description" name="item_description" class="form-control form-control-alternative" placeholder="Item Description here..." rows="3">{{$menu->item_description ?? ''}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        @php
                                        if($menu->status == 1)
                                        {
                                        $checked = "checked";
                                        }else{
                                        $checked = "";
                                        }
                                        @endphp
                                        <label class="form-control-label" for="status">Item available</label>
                                        <label class="custom-toggle" style="float: right">
                                            <input type="checkbox" name="status" id="status" {{$checked}}>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        @php
                                        if($menu->is_featured == 1)
                                        {
                                        $checked = "checked";
                                        }else{
                                        $checked = "";
                                        }
                                        @endphp
                                        <label class="form-control-label" for="status">Featured</label>
                                        <label class="custom-toggle" style="float: right">
                                            <input type="checkbox" name="is_featured" id="is_featured" {{$checked}}>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                    @php
                                        if($menu->status == 1)
                                        {
                                        $checked = "checked";
                                        }else{
                                        $checked = "";
                                        }
                                        @endphp
                                        <label class="form-control-label" for="itemVat">Enable VAT</label>
                                        <label class="custom-toggle" style="float: right">
                                            <input type="checkbox" name="itemVat_status" id="itemVat" {{$checked}}>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                    @php
                                        if($menu->itemDiscount_status == 1)
                                        {
                                        $checked = "checked";
                                        }else{
                                        $checked = "";
                                        }
                                        @endphp
                                        <label class="form-control-label" for="itemDiscount_status">Enable Discount</label>
                                        <label class="custom-toggle" style="float: right">
                                            <input type="checkbox" name="itemDiscount_status" id="itemDiscount_status" {{$checked}}>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                    @php
                                        if($menu->has_extras == 1)
                                        {
                                        $checked = "checked";
                                        }else{
                                        $checked = "";
                                        }
                                        @endphp
                                        <label class="form-control-label" for="has_extras">Enable Extras</label>
                                        <label class="custom-toggle" style="float: right">
                                            <input type="checkbox" name="has_extras" id="has_extras" {{$checked}}>
                                            <span class="custom-toggle-slider rounded-circle"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <button class="btn btn-icon btn-success" type="submit" id="save">
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
        <div class="col-xl-5 mb-5 mb-xl-0">
            <br>
            <div class="card card-profile shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h5 class="h3 mb-0">Extras</h5>
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-new-extras">Add</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Name</th>
                                <th scope="col" class="sort" data-sort="name">Price</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <tr>
                                <th scope="row">Test</th>
                                <td class="budget">34.00</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-new-extras" data-extraName="as" onclick="(setExtrasId(1, 'asas', 3))">Edit</button>
                                            <form action="https://cms.khawarr.com" method="post">
                                                <input type="hidden" name="_token" value="UhOgjfCbNjRg7njIO2rnx4mrTUN8JkyeVLbXVaEq"> <input type="hidden" name="_method" value="delete">
                                                <button type="button" class="dropdown-item" onclick="confirm('Are you sure you want to delete this extras?') ? this.parentElement.submit() : ''">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
        </div>
    </footer>
    <!-- Excel Modal -->
    <div class="modal fade" id="modal-new-extras" tabindex="-1" role="dialog" aria-labelledby="modal-new-extras" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title-extras" id="modal-title-extras">Add Extras for Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form id="excel-form" method="post" action="{{route('admin:categories.upload.excel')}}" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="extras_id" id="extras_id" value="">
                    <div class="modal-body bg-secondary shadow">
                        <div class="form-group focused">
                            <label class="form-control-label" for="extra_item_name">Name</label>
                            <input type="text" name="extra_item_name" id="extra_item_name" class="form-control form-control-alternative" placeholder="Name">
                        </div>
                        <div class="form-group focused">
                            <label class="form-control-label" for="extra_item_price">Item Price</label>
                            <input type="number" name="extra_item_price" id="extra_item_price" class="form-control form-control-alternative" placeholder="Price" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="bt btn-sm btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#save").on('click', function() {
            $("#item-form").validate({
                rules: {
                    item_name: {
                        required: true,
                    },
                }
            });
        });
    });
</script>

<script type="text/javascript">
    "use strict";

    function setExtrasId(id, name, price) {
        var extras_id = id;
        var extras_name = name;
        var extras_price = price;
        $('#modal-title-extras').html("Edit option")
        $('#extras_id').val(id);
        $('#extra_item_name').val(extras_name);
        $('#extra_item_price').val(extras_price);
    }
</script>
@endsection