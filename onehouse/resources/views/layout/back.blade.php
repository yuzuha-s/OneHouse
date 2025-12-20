<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/style.css')

    <title>@yield('title', 'OneHouse')</title>
</head>

<body class="fade">
    <header></header>

    <div class="section">
        <div class="maker-back">
            <nav>
                <ul>
                    <li><a href="{{ route('phase2') }}"><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                <path
                                    d="M266-200v-66.67h301.33q67.67 0 116.84-44.33 49.16-44.33 49.16-110.33t-49.16-110.34Q635-576 567.33-576H286.67l110.66 110.67-46.66 46.66L160-609.33 350.67-800l46.66 46.67-110.66 110.66h280q95.66 0 164.5 63.67Q800-515.33 800-421.33q0 94-68.83 157.66Q662.33-200 566.67-200H266Z" />
                            </svg></a></li>
                </ul>
            </nav>
        </div>

        <main class="contant">
            <div class="wrapper">
                @yield('content')


                @yield('aside')

            </div>
        </main>
    </div>
@vite('resources/js/fadein.js')
</body>

</html>
