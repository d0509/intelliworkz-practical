<!DOCTYPE html>
<html lang="en">

<head>

    @yield('contentHeader')
    @include('user.includes.head')
</head>

<body>
    @include('user.includes.header')
    @yield('content')
    @include('user.includes.footer')

    @include('user.includes.scripts')
    @yield('contentFooter')
</body>

</html>
