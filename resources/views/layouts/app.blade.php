<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Assignment</title>

    <!-- fabicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/fe/images/fav.png') }}" />
    <!-- All CSS -->

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/be/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/be/css/sb-admin-2.min.css')}}" rel="stylesheet">
    @stack('styles')
    @livewireStyles
</head>

<body class="bg-gradient-primary">
    <div id="app">
        @yield('content')
    </div>
    <!-- Jquery-->
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/be/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/be/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/be/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/be/js/sb-admin-2.min.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
