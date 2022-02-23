<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('assets/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        .toast {
            opacity: 1 !important;
        }
    </style>
</head>

<body>
    <!-- Responsive navbar-->
    @include('frontend.partials.navbar')
    <!-- Page header with logo and tagline-->
    @yield('content')
    <!-- Footer-->
    @include('frontend.partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- data table -->
    <script type="text/javascript" src="{{asset('assets/vendor/js/data-table/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendor/js/data-table/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('assets/scripts.js')}}"></script>

    {!! Toastr::message() !!}

    <script type="text/javascript">
        $(function () {
          var table = $('#data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('student.data') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'name', name: 'name'},
                  {data: 'subject', name: 'subject'},
                  {data: 'roll', name: 'roll'}
              ]
          });
          
        });
      </script>

</body>

</html>