@extends('layout.base')

@section('ttitle', 'welcome')

@section('content')


    <div class="appname wrapper">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" height="110px" viewBox="0 -960 960 960" width="110px" fill="#000">
                <path
                    d="M230.77-190.77h161.54v-240h175.38v240h161.54v-373.85L480-753.46 230.77-564.87v374.1ZM200-160v-420l280-211.54L760-580v420H536.92v-240H423.08v240H200Zm280-312.23Z" />
            </svg>
        </div>
        <div class="app-title">OneHouse.</div>

    </div>
    <div class="subname">
        <span>自動デプロイされました！</span>
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

    <div class="article-group">
        <article>
            <div class="article-point">
                <div class="article-title">
                    <span class="point-badge">POINT</span>
                    <strong>1</strong>
                </div>

            </div>
            <div class="app-intro">
                <div class="intro-box">
                    <h3>チェックリストで家探しの情報を管理</h3>
                    <p>家探しの最初～完成までのチェックリストを確認でき、進捗に合わせて完了までしっかりチェックできます。</p>
                </div>
                <div class="intro-content">
                    <div class="phone">
                        <div class="screen">
                            <img src="{{ asset('images/point1.png') }}" alt="">
                        </div>

                    </div>

                    <div class="caption point-cap1">

                        <div class="is-glow">
                            <img src="{{ asset('images/point1-1.png') }}" alt="">
                            <p class="is-point1">追加ボタンでリストに
                                追加できます！</p>
                        </div>

                    </div>


                </div>

            </div>
        </article>

        <article>
            <div class="article-point">
                <div class="article-title">
                    <span class="point-badge">POINT</span>
                    <strong>2</strong>
                </div>

            </div>
            <div class="app-intro">
                <div class="intro-box">
                    <h3>訪問した住宅メーカーの比較ができる</h3>
                    <p>気になった住宅メーカーの特徴を
                        残しながら、自分たちに合う
                        住まい選びができます。</p>
                    <p class="is-point2">耐震性やブランドイメージ、標準仕様などの確認も漏らすことなく記録できます</p>
                </div>
                <div class="intro-content">
                    <div class="phone">
                        <div class="screen">
                            <img src="{{ asset('images/point2.png') }}" alt="">
                        </div>
                    </div>

                    <div class="caption point-cap2">

                    </div>

                </div>
            </div>
        </article>

        <article>
            <div class="article-point">
                <div class="article-title">
                    <span class="point-badge">POINT</span>
                    <strong>3</strong>
                </div>

            </div>
            <div class="app-intro">
                <div class="intro-box">
                    <h3>将来の資金やローンをグラフで見える化</h3>
                    <p>将来の資金やローンをチャートで直感的に
                        見える化でき、 金利や支出が変わっても
                        すぐにシミュレーションできます。</p>
                </div>
                <div class="intro-content">
                    <div class="phone">
                        <div class="screen">
                            <img src="{{ asset('images/point3.png') }}" alt="">
                        </div>

                    </div>
                </div>

            </div>
        </article>

        <article>
            <div class="article-point">
                <div class="article-title">
                    <span class="point-badge">POINT</span>
                    <strong>4</strong>
                </div>

            </div>
            <div class="app-intro">
                <div class="intro-box">
                    <h3>安心して建てられる土地を探す</h3>
                    <p>土地面積(㎡)、容積率・建ぺい率(%)、
                        坪単価を入力して簡単に
                        建築可能面積がわかり、保存して後から閲覧・変更できます。</p>

                    <div>
                        <div class="is-glow is-img4"> <img src="{{ asset('images/point4-2.png') }}" alt="">
                            <p></p>
                        </div>
                    </div>

                </div>
                <div class="intro-content">
                    <div class="phone">
                        <div class="screen">
                            <img src="{{ asset('images/point4.png') }}" alt="">
                        </div>
                    </div>
                    <div class="caption point-cap4">
                        <div class="is-glow"> <img src="{{ asset('images/point4-1.png') }}" alt="">
                            <p class="is-point4">バーを動かして
                                面積と費用を調整が可能</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </article>




    <div class="welcome-setup  wrapper">
        <div class="register wrapper">
            <a href="{{ route('setup') }}"> <button>はじめる</button></a>
        </div>
    </div>




@endsection
