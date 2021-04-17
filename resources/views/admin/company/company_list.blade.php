@extends('layouts.app', ['title' => __('Company')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Companies'),
        'class' => 'col-lg-7'
    ])
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-0 col-md-12 col-sm-12 order-xl-1">
                <div class="card bg-secondary shadow">
                  <div class="card">
              <!-- Card header -->
              @can('Add Company')
              <div class="card-header text-right">
                <a href="{{ route('admin:company.create') }}">
                  <button class="btn btn-sm btn-icon btn-primary" type="button">
                     <span class="btn-inner--icon"><i class="ni ni-shop"></i></span>
                     <span class="btn-inner--text">Register New Company</span>
                  </button>
                </a>
              </div>
              @endcan
              <div class="container table-responsive py-4">
                <table class="table table-flush" id="datatable-buttons">
                  <thead class="thead-light">
                    <tr>
                      <th>Sr.no</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php
                    $i = 0;
                  @endphp
                  @if(isset($companies) && !empty($companies))
                  @foreach ($companies as $key => $value)
                  @php
                    $i += 1;
                    $edit_url = url('/admin/company/edit/'.$value->id);
                  @endphp
                    <tr>
                      <td><div class="btn badge badge-success badge-pill">#{{$i}}</div></td>
                      <td>{{$value->name}}</td>
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
                          <a class="dropdown-item" href="{{$edit_url}}">Edit</a>
                          @if($value->status == 1)
                            <a class="dropdown-item status-change" href="javascript:void(0);"  rel="{{$value->status}}" data-outlet-id="{{$value->id}}">Deactivate</a>
                          @else
                            <a class="dropdown-item status-change" href="javascript:void(0);"  rel="{{$value->status}}" data-outlet-id="{{$value->id}}">Activate</a>
                          @endif
                          @can('Delete Company')
                          <a class="dropdown-item" href="#">Delete</a>
                          @endcan
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
          $('.status-change').on('click', function(){
              var status = $(this).attr('rel');
              var outlet_id = $(this).attr('data-outlet-id');
              $.ajax({
              type:'POST',
              url:'{{ route("admin:company.status") }}',
              data:{'status': status, 'company_id': outlet_id, '_token': "{{ csrf_token() }}"},
              success:function(response) {
                 var status = response.status;
                 var message = response.message;
                 var current_status = response.current_status;
                 if(status == true)
                 {
                  location.reload();
                  toastr.success(message);
                 }else
                 {
                  toastr.error(message);
                 }
              }
           });
          });
    </script>
@endsection
