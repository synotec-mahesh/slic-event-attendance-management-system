<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SLIC') }}</title>

    @include('backend.layouts.styles')
    @yield('styles')
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <!-- Navbar -->
        @include('backend.layouts.inc.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('backend.layouts.inc.mainsidebar')


        <div class="content-wrapper">
            @yield('content-header')
            @yield('content')
        </div>



        @include('backend.layouts.inc.footer')


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>



    @include('backend.layouts.scripts')
    @stack('scripts')
    {{-- @livewireScripts --}}

</body>

</html>
