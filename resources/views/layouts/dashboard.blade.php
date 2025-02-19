@include('layouts.head')

<body class="bg-white">
    <!-- Navbar -->
    @include('layouts.sidebar')

    <!--  Main Content -->

    @yield('content')

</body>
@yield('scripts')