<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <!-- CSS -->
    <link type="text/css" href="{{URL::asset('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('/assets/css/libs.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('/assets/css/grid.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('/assets/css/main.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('/assets/css/rateit.css')}}" rel="stylesheet">
    <link type="text/css" href="{{URL::asset('/assets/css/update.css?v=32')}}" rel="stylesheet">
    <script type="text/javascript" src="{{URL::asset('/assets/js/libs.min.js')}}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
    </script>
</head>
<body>
    @section('header')
      @include('sites.components.header')
    @show

    @section('menu')
      @include('sites.components.menu')
    @show

    <div class="content">
        <div class="container">
            <div class="row">

                @section('saidbar')
                  @include('sites.components.saidbar')
                @show

                @yield('content')
                
            </div>
        </div>
    </div>

    @section('footer')
      @include('sites.components.footer')
    @show

</body>
</html>
