<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'RMS') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/buttons.bootstrap4.min.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/select.bootstrap4.min.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/dropify.css" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/select2.min.css" rel="stylesheet">
        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/js/dropify.js"></script>
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyBwpadkd8mOmHOdQjq8t4EfhZrDxT1anL0"></script>
       
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <!-- User Outlets Session and details -->
            @php
              $outlet_id = session()->get('outlet_id');
              $current_outlet = \App\Outlet::find($outlet_id);

              $role_name = Auth::user()->getRoleNames();
              $role_name = $role_name[0];

            if($role_name == "Super Admin")
            {
                $outlets = \App\Outlet::select('id', 'name', 'outlet_logo')->get();
                $active_outlets = array();
                if(isset($outlets) && !empty($outlets))
                {
                    foreach($outlets as $key => $value)
                    {
                        $data['id'] = $value->id;
                        $data['name'] = $value->name;
                        $data['outlet_logo'] = $value->outlet_logo;
                        $active_outlets[] = $data;
                    }
                } 
            }else{
              $outlets = Auth::user()->outlets;
                if(isset($outlets) && !empty($outlets))
                {
                    $u_outlets = \json_decode($outlets);
                    Session::put('outlet_id', $u_outlets[0]);
                    $active_outlets = array();
                    foreach($u_outlets as $key => $value)
                    {
                        $outlet = \App\Outlet::select('id', 'name', 'outlet_logo')->where('id', $value)->first();
                        $data['id'] = $outlet->id;
                        $data['name'] = $outlet->name;
                        $data['outlet_logo'] = $outlet->outlet_logo;
                        $active_outlets[] = $data;
                    }
                }
            }
              
            @endphp
              @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/js/jquery.validate.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables JS -->
        <script src="{{ asset('argon') }}/vendor/dataTables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/dataTables/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/dataTables/dataTables.buttons.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/dataTables/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/dataTables/buttons.html5.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/dataTables/buttons.flash.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/dataTables/buttons.print.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/dataTables/dataTables.select.min.js"></script>
        <script src="{{ asset('argon') }}/js/select2.min.js"></script>
        @stack('js')
    </body>
</html>
<script type="text/javascript">
$(document).ready(function() {
  $('#datatable-buttons').DataTable();
});

$('#datatable-buttons').dataTable( {
  "language": {
    "paginate": {
      "previous": "<",
      "next": ">"
    }
  }
});
</script>
<script>
    $('.dropify').dropify();
</script>
