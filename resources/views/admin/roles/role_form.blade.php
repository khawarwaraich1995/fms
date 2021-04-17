@extends('layouts.app', ['title' => __('Users')])

@section('content')
@include('users.partials.header', [
'title' => __('Add New Roles'),
'class' => 'col-lg-12',
])
<?php
      if (isset($role->id) && $role->id != 0) {
          $submit_url = route('admin:role.update', [$role->id ?? '']);
      } else {
          $submit_url = route('admin:role.add');
      }
    ?>
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12 order-xl-1">
      <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <h3 class="col-12 mb-0">{{ __('Role Form') }}</h3>
          </div>
        </div>
        <div class="card-body">
          <form id="roles_form" method="post" action="{{$submit_url}}" enctype="multipart/form-data">
            @csrf
            <fieldset>
              <h6 class="heading-small text-muted mb-4">Add New Role</h6>
              <div class="row">
                <div class="col-lg-4 col-md-4 offset-md-4">
                  <div class="form-group">
                    <label class="form-control-label"><span class="required-icon">* </span>Role Title</label>
                    <input class="form-control form-control-alternative" type="text" value="{{$role->name ?? ''}}" id="title" name="name">
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="row">
            <div class="col-lg-2 col-md-2">
                <a class="btn btn-icon btn-success" href="{{route('admin:roles')}}" id="back">
                  <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                  <span class="btn-inner--text">Back</span>
                </a>
              </div>
              <div class="col-lg-2 col-md-2 offset-lg-8">
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

  @include('layouts.footers.auth')
</div>

<script>
  $(document).ready(function() {
    $("#save").on('click', function() {
      $("#roles_form").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            email: true
          }
        }
      });
    });
  });
</script>
@endsection