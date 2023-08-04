<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    @include('app.layouts.partials.head')
</head>
<body>
    @include('app.layouts.partials.header')

    <main id="main-body-one-col" class="main-body">
        @yield('content')
    </main>
     {{-- <main id="main-body" class="main-body col-md-9"> 
        @yield('content')
     </main>  --}}
     

    {{-- @yield('content') --}}

    @include('app.layouts.partials.footer')
    @include('app.layouts.partials.js')
    @yield('script')
</body>
</html>