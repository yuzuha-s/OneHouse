@extends('layout.base')

@section('ttitle', 'help | page')

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

    <div class="wrapper">
        <table class="update-table wrapper">
            <thead>
                <tr>
                    <th>更新日時</th>
                    <th>更新箇所</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2025/01/03</td>
                    <td>アップデート記録追加</td>
                </tr>
                <tr>
                    <td>2025/01/04</td>
                    <td>ランディングページ背景色追加</td>
                </tr>
                <tr>
                    <td>2025/01/05</td>
                    <td>チェックリストをカードに変更</td>
                </tr>
            </tbody>
        </table>
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
                        <p class="is-point2">耐震性やブランドイメージ、
                            標準仕様などの確認も
                            漏らすことなく記録できます</p>
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

                        <div class="">
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

            </article>
        </div>

    </div>

@endsection
