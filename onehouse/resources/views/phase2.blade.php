@extends('layout.nav')

@section('ttitle', 'phase2')

@section('content')

@endsection

@section('aside')

    <div class="list">

        <div class="list-header wrapper">
            <div class="list-nav">
                <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px" fill="#1f1f1f">
                    <path
                        d="M692.87-615.85h61.03v-61.02h-61.03v61.02Zm0 165.29h61.03v-61.03h-61.03v61.03Zm0 164.87h61.03v-61.03h-61.03v61.03ZM640.92-140v-50.26h208.82v-579.48H460.51v99.1l-50.25-35.54V-820H900v680H640.92ZM60-140v-365.13l255.54-182.41 255.13 182.33V-140H367.28v-190.41H263.79V-140H60Zm50.26-50.26h103.28v-190.41h204v190.41h102.87v-289.33L315.54-625.03 110.26-479.24v288.98Zm530.66-352.56ZM417.54-190.26v-190.41h-204v190.41-190.41h204v190.41Z" />
                </svg>
                <h3>Maker</h3>
            </div>


            <div class="list-nav">
                <div class="validate-wrapper">
                    @if (session('success'))
                        <div class="validate">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                                fill="#576bf5">
                                <path
                                    d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z" />
                            </svg>{{ session('success') }}
                        </div>
                    @endif
                </div>

            </div>

            <div class="add_button land2_add">
                <a href="{{ route('create') }}"> <button><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                            viewBox="0 -960 960 960" width="40px" fill="#FFFFFF">
                            <path
                                d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                        </svg></button></a>

            </div>
        </div>

        <div class="marker-list wrapper">
            @foreach ($makers as $maker)
                <div class="cards splide__slide">
                    <div class="card-main">
                        <div class="marker-listnav">
                            <div class="marker-listnav-contant wrapper">
                                <h4>{{ $maker->name }}</h4>
                                <p>担当：{{ $maker->sales }}</p>
                            </div>

                        </div>
                        <div class="marker-listnav-contant wrapper">
                            <div class="marker-liststar">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                        width="40px" fill="{{ $i <= $maker->star ? '#FFE173' : '#FFFFFF' }}"
                                        stroke="{{ $i <= $maker->star ? '#E6C200' : '#8C8C8C' }}" stroke-width="40">
                                        <path
                                            d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z" />
                                    </svg>
                                @endfor
                            </div>
                            <p class="update">更新日：{{ $maker->updated_at->format('m/d H:i') }}</p>

                        </div>

                        <div class="visible">

                            @php
                                // カテゴリ名ごとにまとめる
                                $grouped = $maker->features->groupBy(function ($feature) {
                                    return $feature->category->name;
                                });
                            @endphp

                            @foreach ($grouped as $categoryName => $features)
                                <div class="visible-contain">
                                    <div class="visible-groupe">
                                        <p>{{ $categoryName }}</p>

                                        @foreach ($features as $feature)
                                            <button class="choice method">{{ $feature->tag }}</button>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach



                        </div>
                        <div class="visible-groupe textarea">
                            <p>そのほかオプション</p>
                            <p class="textarea-input">{{ $maker->option }} </p>
                        </div>
                    </div>


                    <div class="card-right">
                        <nav>
                            <ul>
                                <li><button class="maker-edit"><a href="{{ route('edit', ['id' => $maker->id]) }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                                width="40px" fill="#8C8C8C">
                                                <path
                                                    d="M367.69-631.8v-50.25h344.62v50.25H367.69Zm0 115.39v-50.26h344.62v50.26H367.69Zm118.98 366.15H190.26h296.41Zm0 50.26H232.82q-38.78 0-65.8-27.02Q140-154.04 140-192.82v-122.56h120V-860h560v348.05q-12.95-.84-25.57 1.09-12.62 1.94-24.69 6.45v-305.33H310.26v494.36h252.35l-50.25 50.25h-322.1v72.31q0 18.09 12.28 30.33 12.27 12.23 29.61 12.23h254.52V-100Zm77.95 0v-105.69l217.15-216.16q7.46-7.46 16.15-10.5 8.69-3.03 17.39-3.03 9.3 0 18.19 3.53 8.88 3.54 15.96 10.62l37 37.38q6.87 7.47 10.21 16.16Q900-359 900-350.31t-3.57 17.69q-3.56 9-10.32 16.46L670.31-100H564.62Zm287.69-250.31-37-37.38 37 37.38Zm-240 202.62h38l129.84-130.47-18.38-19-18.62-18.76-130.84 130.23v38Zm149.46-149.47-18.62-18.76 37 37.76-18.38-19Z" />
                                            </svg></a></button></li>
                                <li>
                                    <form action="{{ route('destroy', ['id' => $maker->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('本当に削除しますか？')" class="maker-delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                                width="40px" fill="#8C8C8C">
                                                <path
                                                    d="M282.98-140q-25.71 0-44.14-18.43t-18.43-44.14v-532.05H180v-50.25h174.05v-30.51h251.9v30.51H780v50.25h-40.41v532.05q0 25.79-18.39 44.18T677.02-140H282.98Zm406.35-594.62H270.67v532.05q0 5.39 3.59 8.85t8.72 3.46h394.04q4.62 0 8.47-3.84 3.84-3.85 3.84-8.47v-532.05ZM379.54-273.23h50.25v-379.08h-50.25v379.08Zm150.67 0h50.25v-379.08h-50.25v379.08ZM270.67-734.62v544.36V-734.62Z" />
                                            </svg>

                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            @endforeach

        </div>

        <div class="pagination wrapper">
            {{ $makers->links() }}
        </div>
    </div>

@endsection
