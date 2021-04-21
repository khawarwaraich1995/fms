<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
        $path = BASE_URL.SMALL_IMAGE_PATH_OUTLET.$current_outlet->outlet_logo;
        $check_exist = File::exists(public_path().SMALL_IMAGE_PATH_OUTLET.$current_outlet->outlet_logo);
        if($check_exist == 1 && $current_outlet->outlet_logo != '')
        {
        $image = $path;
        }else{
        $image = NO_IMAGE;
        }
        @endphp
        <!-- Brand -->
        <a class="navbar-brand admin-logo pt-0" href="{{ route('admin:home') }}">
            <img src="{{ $image }}" class="navbar-brand-img" alt="...">
        </a>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('admin:home') }}">
                            <img src="{{ $image }}">
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle outlets-dropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><img class="outlet-logo-dropdown" src="{{$image}}" />
                    {{$current_outlet->name}}</button>
                @if(isset($active_outlets) && !empty($active_outlets))
                <div class="dropdown-menu">
                    @foreach($active_outlets as $value)
                    @php
                    $path = BASE_URL.SMALL_IMAGE_PATH_OUTLET.$value['outlet_logo'];
                    $check_exist = File::exists(public_path().SMALL_IMAGE_PATH_OUTLET.$value['outlet_logo']);
                    if($check_exist == 1 && $value['outlet_logo'] != '')
                    {
                    $image_path = $path;
                    }else{
                    $image_path = NO_IMAGE;
                    }
                    @endphp
                    @if($value['id'] != $outlet_id)
                    <a class="dropdown-item" href="{{ url('/admin/outlet/session/'.$value['id']) }}"
                        rel="{{$value['id']}}"><img class="outlet-logo-dropdown" src="{{$image_path}}" />
                        {{$value['name']}}</a>
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
            <hr>
            <!-- Navigation -->
            <ul class="navbar-nav">
                @can('View Dashboard')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin:home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @endcan
                @can('View Orders')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin:home') }}">
                        <i class="ni ni-active-40 text-success"></i> {{ __('Live Orders') }}
                        <div class="blob red"></div>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin:owner.restaurant') }}">
                        <i class="ni ni-shop text-orange"></i> {{ __('Restaurant') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="true"
                        aria-controls="navbar-forms">
                        <i class="ni ni-single-copy-04 text-pink"></i>
                        <span class="nav-link-text">{{ __('Manage Restaurant') }}</span>
                    </a>
                    <div class="collapse" id="navbar-forms">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin:categories') }}" class="nav-link">
                                    <i class="ni ni-basket text-red"></i>{{ __('Categories') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin:menu') }}" class="nav-link">
                                     <i class="ni ni-cart text-green"></i>{{ __('Menu') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin:extras') }}" class="nav-link">
                                <i class="ni ni-fat-add text-orange"></i>{{ __('Extras') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="ni ni-box-2 text-yellow"></i>{{ __('Deals') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                   <i class="ni ni-tag text-purple"></i>{{ __('Voucher Discounts') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                     <i class="ni ni-circle-08 text-red"></i> {{ __('Customers') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                     <i class="ni ni-badge text-orange"></i>{{ __('Riders') }}
                                </a>
                            </li>
                            @can('view reports')
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="ni ni-chart-pie-35 text-blue"></i> {{ __('Reports') }}
                                </a>
                            </li>
                            @endcan
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="ni ni-shop text-blue"></i> {{ __('Settings & Features') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @can('View Company')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin:company') }}">
                        <i class="ni ni-building text-purple"></i> {{ __('Company') }}
                    </a>
                </li>
                @endcan
                @role('Super Admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin:outlets') }}">
                        <i class="ni ni-shop text-orange"></i> {{ __('Outlets') }}
                    </a>
                </li>
                @endrole

                @can('View roles and permissions')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin:roles')}}">
                        <i class="ni ni-planet text-pink"></i> {{ __('Roles & Permissions') }}
                    </a>
                </li>
                @endcan
                @role('Super Admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin:permissions')}}">
                        <i class="ni ni-planet text-yellow"></i> {{ __('Permissions Management') }}
                    </a>
                </li>
                @endrole
                @can('View Users')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin:users')}}">
                        <i class="ni ni-circle-08 text-orange"></i> {{ __('Users') }}
                    </a>
                </li>
                @endcan
                <!-- @can('view drivers')
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-delivery-fast text-info"></i> {{ __('Drivers') }}
                    </a>
                </li>
            @endcan -->
                @can('View Settings')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin:settings')}}">
                        <i class="ni ni-settings text-success"></i> {{ __('Settings') }}
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
