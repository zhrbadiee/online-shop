<!DOCTYPE html>
<html>

<head>
    @include('admin.layouts.partials.head')
    <title>@yield('title', 'پنل ادمین آیلی شاپ')</title>
</head>

<body>
    <div id="wrapper">
        @include('admin.layouts.partials.navbar')
        <div id="page-wrapper" class="gray-bg">
            @include('admin.layouts.partials.header')
            @yield('breadcrumb')
            <div class="wrapper wrapper-content">
                @yield('content')
            </div>
        </div>
    </div>
    @include('admin.layouts.partials.js')
    @stack('js-script')
    @yield('script')
</body>

</html>
