@extends('layouts.app', ['title' => __('Outlets')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Outlets'),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-0 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                  <div class="card">
              <!-- Card header -->
              @role('Super Admin')
              <div class="card-header text-right">
                <a href="{{ route('admin:outlet.create') }}">
                  <button class="btn btn-sm btn-icon btn-primary" type="button">
                     <span class="btn-inner--icon"><i class="ni ni-shop"></i></span>
                     <span class="btn-inner--text">Register New Outlet</span>
                  </button>
                </a>
              </div>
              @endrole
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
              @if($message = Session::get('error'))
              <div class="col-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                  <span class="alert-text"><strong>Oopss!</strong> {{$message}}</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
              </div>
              @endif
              <div class="container table-responsive py-4">
                <table class="table table-flush" id="datatable-buttons">
                  <thead class="thead-light">
                    <tr>
                      <th>Sr.no</th>
                      <th>Name</th>
                      <th>Logo</th>
                      <th>URL</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                    $i = 0;
                  @endphp
                  @if(isset($outlets) && !empty($outlets))
                  @foreach ($outlets as $key => $value)
                  @php
                    $i = $i + 1;
                    $edit_url = url('/admin/outlets/edit/'.$value->id);
                    $delete_url = url('/admin/outlets/destroy/'.$value->id);
                  @endphp
                    <tr>
                      <td><div class="btn badge badge-success badge-pill">#{{$i}}</div></td>
                      <td>{{$value->name}}</td>
                      <td>
                      @php
                      $path = BASE_URL.SMALL_IMAGE_PATH_OUTLET.$value->outlet_logo;
                      $check_exist = File::exists(public_path().SMALL_IMAGE_PATH_OUTLET.$value->outlet_logo);
                      if($check_exist == 1 && $value->outlet_logo != '')
                      {
                        $image = $path;
                      }else{
                        $image = NO_IMAGE;
                      }
                      @endphp
                      <img class="rounded" src="{{$image}}" width="50px" height="50px">
                      </td>
                      <td>{{$value->url}}</td>
                      <td>{{$value->phone}}</td>
                      <td>
                        <span class="badge badge-dot mr-4 current_status">
                        @if($value->status == 1)
                        <i class="bg-success"></i>
                        <span class="status badge badge-success badge-pill">Active</span>
                        @else
                        <i class="bg-danger"></i>
                        <span class="status badge badge-danger badge-pill">Inactive</span>
                        @endif
                      </span>
                    </td>
                    <td class="text-center">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="bottom-end" style="position: absolute;will-change: transform;top: 0px;left: 0px;transform: translate3d(-160px, 32px, 0px);">
                          @role('Super Admin')
                            <a class="dropdown-item" href="{{$edit_url}}">Edit</a>
                            @endrole
                          @role('Super Admin')
                            @if($value->status == 1)
                              <a class="dropdown-item status-change" href="javascript:void(0);"  rel="{{$value->status}}" data-outlet-id="{{$value->id}}">Deactivate</a>
                            @else
                              <a class="dropdown-item status-change" href="javascript:void(0);"  rel="{{$value->status}}" data-outlet-id="{{$value->id}}">Activate</a>
                            @endif
                          @endrole

                          @role('Super Admin')
                            <a class="dropdown-item delete-outlet" href="{{$delete_url}}">Delete</a>
                          @endrole
                        </div>
                      </div>
                    </td>
                    </tr>
                @endforeach
                @endif
                  </tbody>
                </table>
              </div>
            </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
    <script type="text/javascript">
    //// Change Status of Outlet
          $('.status-change').on('click', function(){
              var status = $(this).attr('rel');
              var outlet_id = $(this).attr('data-outlet-id');
              $.ajax({
              type:'POST',
              url:'{{ route("admin:outlet.status") }}',
              data:{'status': status, 'outlet_id': outlet_id, '_token': "{{ csrf_token() }}"},
              success:function(response) {
                 var status = response.status;
                 var message = response.message;
                 var current_status = response.current_status;
                 if(status == true)
                 {
                    location.reload();
                 }
              }
           });
          });
    </script>
@endsection
