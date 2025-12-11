{{-- @extends('layout.nav')

@section('ttitle', 'phase5')

@section('content')

@endsection

@section('aside')
    <div class="list">
        <div class="list-header wrapper">
            <div class="list-nav">
                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#1f1f1f">
                    <path
                        d="M380.57-208.92v-50.26H820v50.26H380.57Zm0-245.95v-50.26H820v50.26H380.57Zm0-246.36v-50.26H820v50.26H380.57ZM201.28-173.87q-25.2 0-43.03-17.45-17.84-17.44-17.84-42.65 0-25.22 17.65-42.87t42.86-17.65q25.22 0 42.66 17.97 17.45 17.96 17.45 43.01 0 24.49-17.56 42.06-17.55 17.58-42.19 17.58Zm0-245.95q-25.2 0-43.03-17.77-17.84-17.77-17.84-42.41 0-24.64 17.89-42.41 17.89-17.77 43.01-17.77 24.57 0 42.14 17.77 17.58 17.77 17.58 42.41 0 24.64-17.56 42.41-17.55 17.77-42.19 17.77Zm-.69-246.36q-24.64 0-42.41-17.77-17.77-17.77-17.77-42.41 0-24.64 17.77-42.41 17.77-17.77 42.54-17.77t42.54 17.77q17.77 17.77 17.77 42.41 0 24.64-17.76 42.41-17.75 17.77-42.68 17.77Z" />
                </svg>
                <h3>ChecklList</h3>
            </div>

            <div class="list-nav">
                <div class="validate-wrapper"></div>
            </div>

            <div class="add_button">
                <button class="bn13"><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                        width="40px" fill="#fff">
                        <path
                            d="M640-121v-120H520v-80h120v-120h80v120h120v80H720v120h-80ZM120-240v-80h80v80h-80Zm160 0v-80h163q-3 21-2.5 40t3.5 40H280ZM120-400v-80h80v80h-80Zm160 0v-80h266q-23 16-41.5 36T472-400H280ZM120-560v-80h80v80h-80Zm160 0v-80h480v80H280ZM120-720v-80h80v80h-80Zm160 0v-80h480v80H280Z" />
                    </svg>
                </button>
            </div>


        </div>

        <div class="table-wrapper">
            <table class="checklist">
                <thead>
                    <tr>
                        <th><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                                fill="#1f1f1f">
                                <path
                                    d="M480-480Zm286.59-173.33q-47.26 0-80.26-33.08-33-33.08-33-80.34 0-47.25 33.08-80.25t80.34-33Q814-880 847-846.92t33 80.33q0 47.26-33.08 80.26-33.08 33-80.33 33ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q30.67 0 60.18 4.67 29.51 4.66 58.49 14-8.91 14.01-14.57 30.09-5.67 16.08-8.1 32.57-23.41-7.33-47.41-11-24-3.66-48.59-3.66-139.58 0-236.46 96.87-96.87 96.88-96.87 236.46t96.87 236.46q96.88 96.87 236.46 96.87t236.46-96.87q96.87-96.88 96.87-236.46 0-24.59-3.66-48.59-3.67-24-11-47.41 16.49-2.43 32.57-8.1 16.08-5.66 30.09-14.57 9.34 28.98 14 58.49Q880-510.67 880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-58.33-217.33L706-581.67q-18-5.66-33.17-14.5Q657.67-605 643-617L422-396 304-513.33l-48.67 48.66 166.34 167.34Z" />
                            </svg></th>
                        <th>List <button id="toggle-phase1" class="toggle">1<svg xmlns="http://www.w3.org/2000/svg"
                                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg></button>
                            <button id="toggle-phase2" class="toggle">2<svg xmlns="http://www.w3.org/2000/svg"
                                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg></button>
                            <button id="toggle-phase3" class="toggle">3<svg xmlns="http://www.w3.org/2000/svg"
                                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg></button>
                            <button id="toggle-phase4" class="toggle">4<svg xmlns="http://www.w3.org/2000/svg"
                                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg></button>
                            <button id="toggle-phase5" class="toggle">5<svg xmlns="http://www.w3.org/2000/svg"
                                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
                                    <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                                </svg></button>
                        </th>
                        <th>フェーズ

                        </th>
                        <th><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                                fill="#1f1f1f">
                                <path
                                    d="M284-286h68l250-249.33-68-69.34-250 250V-286Zm339.33-270.67 40-40.66q6.67-6.67 7-15 .34-8.34-7-15.67l-38-37.33q-7.33-7.34-15.33-7-8 .33-14.67 7l-40 39.33 68 69.33ZM186.67-120q-27.5 0-47.09-19.58Q120-159.17 120-186.67v-586.66q0-27.5 19.58-47.09Q159.17-840 186.67-840h192.66q7.67-35.33 35.84-57.67Q443.33-920 480-920t64.83 22.33Q573-875.33 580.67-840h192.66q27.5 0 47.09 19.58Q840-800.83 840-773.33v586.66q0 27.5-19.58 47.09Q800.83-120 773.33-120H186.67Zm0-66.67h586.66v-586.66H186.67v586.66Zm293.33-608q13.67 0 23.5-9.83t9.83-23.5q0-13.67-9.83-23.5t-23.5-9.83q-13.67 0-23.5 9.83t-9.83 23.5q0 13.67 9.83 23.5t23.5 9.83Zm-293.33 608v-586.66 586.66Z" />
                            </svg></th>
                        <th><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px"
                                fill="#1f1f1f">
                                <path
                                    d="M282.98-140q-25.71 0-44.14-18.43t-18.43-44.14v-532.05H180v-50.25h174.05v-30.51h251.9v30.51H780v50.25h-40.41v532.05q0 25.79-18.39 44.18T677.02-140H282.98Zm406.35-594.62H270.67v532.05q0 5.39 3.59 8.85t8.72 3.46h394.04q4.62 0 8.47-3.84 3.84-3.85 3.84-8.47v-532.05ZM379.54-273.23h50.25v-379.08h-50.25v379.08Zm150.67 0h50.25v-379.08h-50.25v379.08ZM270.67-734.62v544.36V-734.62Z" />
                            </svg></th>
                    </tr>
                </thead>
                <tbody class="checklist">
                    <input type="hidden" id="profile_id" value="{{ auth()->user()->profile->id }}">

                    @foreach ($checkLists as $checkList)
                        @if ($checkList->phase->number === 1)
                            <tr class="phase1-row" data-id="{{ $checkList->id }}">
                                <td> <label class="switch">
                                        <input type="checkbox" name="checked" value="{{ $checkList->checked }}"
                                            @if ($checkList->checked) checked @endif>
                                        <span class="slider"></span>
                                    </label></td>
                                <td>{{ $checkList->phase->list }}</td>
                                <td><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                        width="40px" fill="#61C6DF">
                                        <path
                                            d="M710.97-192.56h32v-104.88h104.88v-32H742.97v-104.87h-32v104.87H606.1v32h104.87v104.88ZM726.15-140q-72.16 0-123-51.05t-50.84-122.59q0-72.73 50.83-123.72 50.84-51 123.34-51 71.83 0 122.88 51 51.05 50.99 51.05 123.72 0 71.54-51.05 122.59T726.15-140ZM180-220v-450l300-225.77L780-670v102.95q-11.82-3.67-24.47-5.1-12.65-1.44-25.79-1.85v-70.87L480-833.08 230.26-644.96v374.7h240.23q1.87 13.08 5.86 25.83 3.99 12.74 9.32 24.43H180Zm300-331.87Z" />
                                    </svg></td>
                                <td></td>
                                <td>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    @foreach ($checkLists as $checkList)
                        @if ($checkList->phase->number === 2)
                            <tr class="phase2-row" data-id="{{ $checkList->id }}">
                                <td> <label class="switch">
                                        <input type="checkbox" name="checked" value="{{ $checkList->checked }}"
                                            @if ($checkList->checked) checked @endif>
                                        <span class="slider"></span>
                                    </label></td>
                                <td>{{ $checkList->phase->list }}</td>
                                <td><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                        width="40px" fill="#61C6DF">
                                        <path
                                            d="M692.87-615.85h61.03v-61.02h-61.03v61.02Zm0 165.29h61.03v-61.03h-61.03v61.03Zm0 164.87h61.03v-61.03h-61.03v61.03ZM640.92-140v-50.26h208.82v-579.48H460.51v99.1l-50.25-35.54V-820H900v680H640.92ZM60-140v-365.13l255.54-182.41 255.13 182.33V-140H367.28v-190.41H263.79V-140H60Zm50.26-50.26h103.28v-190.41h204v190.41h102.87v-289.33L315.54-625.03 110.26-479.24v288.98Zm530.66-352.56ZM417.54-190.26v-190.41h-204v190.41-190.41h204v190.41Z" />
                                    </svg>
                                </td>
                                <td></td>
                                <td>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @foreach ($checkLists as $checkList)
                        @if ($checkList->phase->number === 3)
                            <tr class="phase3-row" data-id="{{ $checkList->id }}">
                                <td> <label class="switch">
                                        <input type="checkbox" name="checked" value="{{ $checkList->checked }}"
                                            @if ($checkList->checked) checked @endif>
                                        <span class="slider"></span>
                                    </label></td>
                                <td>{{ $checkList->phase->list }}</td>
                                <td><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                        width="40px" fill="#61C6DF">
                                        <path
                                            d="M490.31-140v-.21.21q-51.59.46-112.77-7.42-61.18-7.89-113.94-25.18-52.75-17.3-88.18-44.66Q140-244.62 140-283.85q0 39.23 35.42 66.59 35.43 27.36 88.18 44.66 52.76 17.29 113.94 25.18 61.18 7.88 112.77 7.42Zm-10.18-208.31v-.54.54q-43.23-.15-83.67-4.01-40.43-3.86-76.96-11.98-36.52-8.11-69.15-20.16t-60.09-28.85q27.46 16.8 60.09 28.85t69.15 20.16q36.53 8.12 76.96 11.98 40.44 3.86 83.67 4.01ZM480-606.15q85.97 0 174.96-25.35 88.99-25.35 110.25-55.71-21.54-30.87-110.04-56.7-88.5-25.83-175.17-25.83-87.59 0-175.83 24.93-88.25 24.94-110.55 56.07 21.92 32.2 109.24 57.39 87.32 25.2 177.14 25.2Zm225.9 476.12h30.51v-167.38l74.31 74.56 21.54-21.54-111.23-111.23-111.24 111.23 21.54 21.54 74.57-74.56v167.38Zm15.13 62.34q-72.36 0-123.75-51.06-51.38-51.05-51.38-123.66 0-72.77 51.38-124.15 51.39-51.39 123.75-51.39 72.35 0 123.74 51.39 51.38 51.38 51.38 124.15 0 72.61-51.38 123.66-51.39 51.06-123.74 51.06ZM473.56-190.46q2.36 13.64 6.81 26.14 4.45 12.5 9.94 24.32-51.59.46-112.77-7.42-61.18-7.89-113.94-25.18-52.75-17.3-88.18-44.66Q140-244.62 140-283.85V-680q0-57.92 99.54-98.96Q339.08-820 480-820q140.92 0 240.46 41.04Q820-737.92 820-680v204.92q-11.82-5.48-24.32-9.55-12.5-4.06-25.94-6.42v-132.03q-53.84 31.54-130.19 48.87-76.34 17.34-159.96 17.21-85.77 0-162.06-17.46-76.3-17.46-127.27-48.62v156.49q50.56 33.15 127.55 50.59 76.98 17.44 161.78 17.44 11.31 0 22.1-.34 10.8-.33 22.11-1.15-9.67 11.87-17.39 24.78-7.72 12.91-13.97 26.96h-12.31q-87.26-.18-160.83-15.79-73.58-15.62-129.04-49.21v135.21q7.84 17.07 34.74 32.92 26.9 15.85 65.55 27.77 38.66 11.92 86.18 19.26 47.53 7.33 96.83 7.69Z" />
                                    </svg></td>
                                <td></td>
                                <td>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @foreach ($checkLists as $checkList)
                        @if ($checkList->phase->number === 4)
                            <tr class="phase4-row" data-id="{{ $checkList->id }}">
                                <td> <label class="switch">
                                        <input type="checkbox" name="checked" value="{{ $checkList->checked }}"
                                            @if ($checkList->checked) checked @endif>
                                        <span class="slider"></span>
                                    </label></td>
                                <td>{{ $checkList->phase->list }}</td>
                                <td><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                        width="40px" fill="#61C6DF">
                                        <path
                                            d="M628.92-531.44v-1.51 1.51-158.25 158.25ZM185.95-163.8q-16.21 7.52-31.08-2.1Q140-175.51 140-193.8v-523.53q0-11.85 6.35-21.27 6.34-9.42 17.39-13.66l190.98-66.2 251.23 87.79 168.1-65.94q16.21-7.11 31.08 1.73Q820-786.05 820-768.15v327.53q-10.03-15.38-22.5-28.44-12.47-13.07-27.76-23.86v-249.9l-140.82 53.13v158.25q-13.43 1.21-25.8 3.35-12.38 2.14-24.45 6.14v-167.74l-197.34-67.8v517.41L185.95-163.8Zm4.31-54.05 140.82-53.64v-486l-140.82 47.23v492.41Zm454.2-4.38q38.59 0 64.71-25.73 26.11-25.73 26.32-65.3.2-38.59-26.12-64.8-26.32-26.22-64.91-26.22-38.59 0-64.81 26.22-26.21 26.21-26.21 64.8 0 38.85 26.21 64.94 26.22 26.09 64.81 26.09Zm0 50.25q-58.33 0-99.81-41.47-41.47-41.47-41.47-99.81 0-58.74 41.47-100.01 41.48-41.27 99.81-41.27 58.74 0 100.01 41.27t41.27 100.01q0 22.88-6.48 43.2-6.49 20.32-18.93 37.55L860-133.49 826.9-100l-99.41-99q-17.64 13.38-38.3 20.2-20.65 6.82-44.73 6.82ZM331.08-757.49v486-486Z" />
                                    </svg></td>
                                <td></td>
                                <td>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    @foreach ($checkLists as $checkList)
                        @if ($checkList->phase->number === 5)
                            <tr class="phase5-row" data-id="{{ $checkList->id }}">
                                <td> <label class="switch">
                                        <input type="checkbox" name="checked" value="{{ $checkList->checked }}"
                                            @if ($checkList->checked) checked @endif>
                                        <span class="slider"></span>
                                    </label></td>
                                <td>{{ $checkList->phase->list }}</td>
                                <td><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                        width="40px" fill="#61C6DF">
                                        <path
                                            d="M180-140v-383.1l-80.64 61.77-30.13-40L180-586v-109.9h50.26v71.08L480-815l410.77 314.08-30.13 39.38L780-523.1V-140H180Zm50.26-50.26h206.92v-175.38h85.64v175.38h206.92v-371.02L480-751.72 230.26-561.28v371.02ZM180-744.61q0-41.18 27.9-70.08 27.89-28.9 71.84-28.9 23.69 0 36.59-14.34 12.9-14.35 12.9-34.38h50.26q0 40.77-27.62 69.88-27.62 29.1-72.13 29.1-23.1 0-36.29 14.05-13.19 14.06-13.19 34.67H180Zm50.26 554.35h499.48-499.48Z" />
                                    </svg></td>
                                <td></td>
                                <td>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                    @foreach ($checkLists as $checkList)
                        @if ($checkList->phase->number === 6)
                            <tr data-id="{{ $checkList->id }}">
                                <td><label class="switch">
                                        <input type="checkbox" name="checked" value="{{ $checkList->checked }}"
                                            @if ($checkList->checked) checked @endif>
                                        <span class="slider"></span>
                                    </label></td>
                                <td>{{ $checkList->phase->list }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>


    @vite('resources/js/checkList.js')

@endsection --}}
