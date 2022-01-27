<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fontawesome/all.css')}}">
    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- data table -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/data-table/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
</head>

<body>
    <!-- sideBar wrapper -->
    @include('backend.partials.sidebar')

    <!-- content wrapper-->
    <div class="content-wrapper sideBars_open">
        <!-- top head start -->
        @include('backend.partials.navbar')

        <!-- Main content start -->
        @yield('content')
    </div>

    <!-- footer section -->
    @include('backend.partials.footer')


    <!--Start javascript -->
    <!-- jQuery.min.js -->
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Optional js  -->
    <script type="text/javascript" src="{{asset('assets/js/main.js')}}"></script>
    <!-- data table -->
    <script type="text/javascript" src="{{asset('assets/vendor/js/data-table/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendor/js/data-table/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>