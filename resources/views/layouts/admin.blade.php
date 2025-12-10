<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard') - Perpus Mini</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {{-- AdminKit CSS --}}
    <link rel="stylesheet" href="{{ asset('adminkit/css/app.css') }}">
    @stack('styles')
</head>

<body>
    <div class="wrapper">
        @include('partials.admin.sidebar')

        <div class="main">
            @include('partials.admin.navbar')

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            @include('partials.admin.footer')
        </div>
    </div>

    <script src="{{ asset('adminkit/js/app.js') }}"></script>
    @stack('scripts')
</body>

</html>
