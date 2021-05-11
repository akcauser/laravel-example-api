<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Blank Page &mdash; Stisla</title>

    @include('cms.layouts.template_styles')
    @yield('page_styles')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('cms.layouts.navbar')
            @include('cms.layouts.sidebar')
            @yield('content')
            @include('cms.layouts.footer')
        </div>
    </div>
    @include('cms.layouts.template_scripts')
    @yield('page_scripts')
</body>

</html>