<!-- views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @yield('custom_head')
</head>

<body>
    @extends('admin.layouts.app')

    @section('content')
        <header class="header">
            <h1>@yield('header')</h1>
        </header>

        <div class="inner-content">
            @yield('content')
        </div>
    @endsection
</body>
</html>
