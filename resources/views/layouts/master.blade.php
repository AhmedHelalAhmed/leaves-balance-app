<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Leaves Balance App</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper" id="app">


    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Leaves Balance App</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/images/profile.svg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Welcome</a>
                </div>
            </div>

            <nav class="mt-2">
         @include('layouts._nav')
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">

        @include('layouts._header')

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    @include('layouts._footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="/js/app.js"></script>
</body>
</html>
