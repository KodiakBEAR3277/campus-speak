<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layout.css')
</head>

<body>

    @include('layout.header')
    <main>
        @yield('content')
    </main>
    @include('layout.footer')
    @vite(['./resources/js/app.js'])
   @include('layout.js')

</body>

</html>