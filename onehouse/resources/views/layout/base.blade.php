<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/style.css')

    <title>@yield('title', 'OneHouse')</title>
</head>

<body class="fade">
    <div class="body-light">
        <div class="welcome wrapper">
            <div class="section-left">
                @yield('content')
            </div>
        </div>



    </div>
    @vite('resources/js/fadein.js')
</body>

</html>
