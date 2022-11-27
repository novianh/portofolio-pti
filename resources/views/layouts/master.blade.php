<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    @include('components.css')

    @yield('css')

</head>

<body>
    {{-- navigation --}}
    @include('components.navigation')

    {{-- js --}}
    @include('components.js')
    @yield('js')
</body>

</html>
