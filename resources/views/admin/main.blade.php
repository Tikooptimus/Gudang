<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title') Beta</title>
    <link rel="icon" type="image/png" href="{{url('favicon.png')}}">
    <link href="{{url('sbadmin/dist/css/styles.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script>
    @stack('css')
</head>

<body class="sb-nav-fixed">

    @include('admin.navbar')

    <div id="layoutSidenav">

        @include('admin.sidebar')

        <div id="layoutSidenav_content">
            <main>
                <!-- Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
            @include('admin.footer')
        </div>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{asset('sbadmin/dist/js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('sbadmin/dist/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('sbadmin/dist/assets/demo/chart-bar-demo.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('sbadmin/dist/assets/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('sbadmin/dist/js/navbar-nav.js')}}"></script>
    @stack('js')

</body>

</html>
