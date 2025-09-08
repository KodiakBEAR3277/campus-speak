<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    @include('layout.css')

</head>

<body>

    <main>
        @yield('content')
    </main>
    @include('layout.js')
    <script src="./assets/static/js/initTheme.js"></script>

</body>

</html>