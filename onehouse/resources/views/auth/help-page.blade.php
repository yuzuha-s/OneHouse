@extends('layout.base')

@section('title', 'Onehouse | アプリ使用方法')

@section('content')
    <div class="appname wrapper">
        <div class="help-back"><a href="{{ route('phase1') }}"><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                    viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                    <path
                        d="M266-200v-66.67h301.33q67.67 0 116.84-44.33 49.16-44.33 49.16-110.33t-49.16-110.34Q635-576 567.33-576H286.67l110.66 110.67-46.66 46.66L160-609.33 350.67-800l46.66 46.67-110.66 110.66h280q95.66 0 164.5 63.67Q800-515.33 800-421.33q0 94-68.83 157.66Q662.33-200 566.67-200H266Z" />
                </svg></a></div>
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="110px" viewBox="0 -960 960 960" width="110px" fill="#000">
                <path
                    d="M230.77-190.77h161.54v-240h175.38v240h161.54v-373.85L480-753.46 230.77-564.87v374.1ZM200-160v-420l280-211.54L760-580v420H536.92v-240H423.08v240H200Zm280-312.23Z" />
            </svg>
        </div>
        <div class="app-title">OneHouse.</div>

    </div>
    <div class="subname">
        <span>一度きりだから、OneHouse.でしっかり管理。</span>
    </div>

    <div class="worry-content wrapper">
        <nav>
            <ul class="worry-list">
                <li class="worry-bubble">
                    <p class="worry-p">注文住宅が欲しい？</p>
                </li>
                <li class="worry-bubble">
                    <p class="worry-p">住宅メーカーどこにしよう？</p>
                </li>
                <li class="worry-bubble">
                    <p class="worry-p">住宅ローンや今後の生活の見通しはどう立てる？</p>
                </li>
                <li class="worry-bubble">
                    <p class="worry-p">土地や場所探しは大変......</p>
                </li>
                <li>
                    <div class="illust">
                        <img src="{{ asset('images/illust.png') }}" alt="パソコンを見て困っているイラスト">
                    </div>
                </li>
                <li class="worry-bubble">
                    <p class="worry-p">理想の住まいを形にできるかな？</p>
                </li>
            </ul>
        </nav>
    </div>

    <div class="lead-text wrapper">
        <h1>住宅購入の「最初の一歩」が分からない方へ</h1>
        <p>迷わず進めるサポートアプリ</p>
    </div>

    <div class="contant">
        <div class="pl-svg pc-only"> <img src="{{ asset('images/point1.svg') }}" alt=""></div>
        <div class="pl-svg pc-only"> <img src="{{ asset('images/point2.svg') }}" alt=""></div>
        <div class="pl-svg pc-only"> <img src="{{ asset('images/point3.svg') }}" alt=""></div>
        <div class="pl-svg pc-only"> <img src="{{ asset('images/point4.svg') }}" alt=""></div>

        <div class="pl-svg mobile-only"> <img src="{{ asset('images/mv-point1.svg') }}" alt=""></div>
        <div class="pl-svg mobile-only"> <img src="{{ asset('images/mv-point2.svg') }}" alt=""></div>
        <div class="pl-svg mobile-only"> <img src="{{ asset('images/mv-point3.svg') }}" alt=""></div>
        <div class="pl-svg mobile-only"> <img src="{{ asset('images/mv-point4.svg') }}" alt=""></div>
    </div>

    </div>

@endsection
