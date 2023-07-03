<head>
    @include('partials.header')
</head>

<body>
    <div id="app">
        @include('partials.navbar')
        <main class="py-4" style="padding-top: 0; padding-bottom: 0;">
            @yield('content')
        </main>
        <footer>
            @include('partials.footer');
        </footer>
    </div>

</body>

</html>
