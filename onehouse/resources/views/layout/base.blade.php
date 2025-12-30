<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    @vite('resources/css/style.css')

    <title>@yield('title', 'OneHouse')</title>
</head>

<body class="fade">
    <div class="welcome wrapper">

        @yield('content')
        <div class="footer">ssss</div>
    </div>



    @vite('resources/js/fadein.js')
</body>

</html>
