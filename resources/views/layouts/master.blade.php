<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.meta')
    <title>@yield('title') | {{ config('app.name') }}</title>
    @include('partials.css')
</head>
<body dir="rtl">
<div class="container mt-4">
    @yield('content')
</div>
@include('partials.js')
</body>
</html>
