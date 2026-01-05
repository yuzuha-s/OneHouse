@extends('layout.nav')

@section('title', 'phase4')

@section('content')

@endsection

@section('aside')

    <div class="marker-edit wrapper">
        <div class="list">
            <div class="list-header wrapper">
                <div class="list-nav">
                    <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px"
                        fill="#1f1f1f">
                        <path
                            d="M628.92-531.44v-1.51 1.51-158.25 158.25ZM185.95-163.8q-16.21 7.52-31.08-2.1Q140-175.51 140-193.8v-523.53q0-11.85 6.35-21.27 6.34-9.42 17.39-13.66l190.98-66.2 251.23 87.79 168.1-65.94q16.21-7.11 31.08 1.73Q820-786.05 820-768.15v327.53q-10.03-15.38-22.5-28.44-12.47-13.07-27.76-23.86v-249.9l-140.82 53.13v158.25q-13.43 1.21-25.8 3.35-12.38 2.14-24.45 6.14v-167.74l-197.34-67.8v517.41L185.95-163.8Zm4.31-54.05 140.82-53.64v-486l-140.82 47.23v492.41Zm454.2-4.38q38.59 0 64.71-25.73 26.11-25.73 26.32-65.3.2-38.59-26.12-64.8-26.32-26.22-64.91-26.22-38.59 0-64.81 26.22-26.21 26.21-26.21 64.8 0 38.85 26.21 64.94 26.22 26.09 64.81 26.09Zm0 50.25q-58.33 0-99.81-41.47-41.47-41.47-41.47-99.81 0-58.74 41.47-100.01 41.48-41.27 99.81-41.27 58.74 0 100.01 41.27t41.27 100.01q0 22.88-6.48 43.2-6.49 20.32-18.93 37.55L860-133.49 826.9-100l-99.41-99q-17.64 13.38-38.3 20.2-20.65 6.82-44.73 6.82ZM331.08-757.49v486-486Z" />
                    </svg>
                    <h3>land size</h3>
                </div>

                <div class="list-nav">
                    <div class="validate-wrapper">
                        @if (session('success'))
                            <div class="validate">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960"
                                    width="40px" fill="#576bf5">
                                    <path
                                        d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z" />
                                </svg>
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="list-nav">
                    <div class="back"></div>
                </div>
            </div>

            <div class="wrapper">
                <div class="play">
                    <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                        fill="#8C8C8C">
                        <path
                            d="M403.33-320 630-480.67 403.33-640v320ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-42.33 8.33-82.5 8.34-40.17 25.34-78.5l50.66 50.67q-8 27.33-12.83 54.82-4.83 27.48-4.83 55.51 0 139.58 96.87 236.46 96.88 96.87 236.46 96.87t236.46-96.87q96.87-96.88 96.87-236.46T716.4-716.46q-96.93-96.87-236.59-96.87-28.14 0-55.66 4.67-27.51 4.68-54.48 12.99l-51-51Q357.33-862 396.33-871q39-9 81-9 83.24 0 156.46 31.5Q707-817 761.63-763q54.63 54 86.5 127Q880-563 880-480t-31.5 156Q817-251 763-197t-127 85.5Q563-80 480-80ZM215.25-692.67q-22.25 0-37.75-15.58-15.5-15.57-15.5-37.83 0-22.25 15.58-37.75t37.83-15.5q22.26 0 37.76 15.58 15.5 15.57 15.5 37.83 0 22.25-15.58 37.75t-37.84 15.5ZM480-480Z" />
                    </svg>
                    <p>土地情報を入力して建築面積をシュミレーションしてみよう！</p>
                </div>
            </div>

            <form action="{{ route('phase4.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="landLog_id" value="">
                <div class="land-form wrapper">



                    <div class="land-left">
                        <div class="land-left-fix">

                            <div class="landform-contant">
                                <label for="">住所</label>
                                <div class="land-form-row">
                                    <textarea name="address" placeholder="〒" class="landtextarea">{{ old('address') }}</textarea>
                                </div>
                                <div class="error-space"> @error('address')
                                        <div class="error">登録には{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="land-left-fix">
                            <div class="landform-contant">
                                <label for="">土地面積(㎡)</label>
                                <div class="land-form-row"><input type="number" class="landinput" placeholder="90"
                                        step="0.1" name="landarea" value="{{ old('landarea') }}">
                                </div>
                                <div class="error-space"> @error('landarea')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="landform-contant">
                                <label for="">階数(1～3階)</label>
                                <div class="land-form-row"><input type="number" class="landinput" placeholder="2"
                                        name="floor" value="{{ old('floor') }}">
                                </div>
                                <div class="error-space"> @error('floor')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="land-left-fix">
                            <div class="landform-contant">
                                <label for="">容積率(%)</label>
                                <div class="land-form-row"><input type="number" class="landinput" placeholder="200"
                                        name="far" value="{{ old('far') }}"></div>
                                <div class="error-space"> @error('far')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="landform-contant">
                                <label for="">建ぺい率(%)</label>
                                <div class="land-form-row"> <input type="number" class="landinput" placeholder="80"
                                        name="bcr" value="{{ old('bcr') }}"></div>
                                <div class="error-space"> @error('bcr')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="land-left-fix">
                            <div class="landform-contant">
                                <label for="">坪単価(万円)</label>
                                <div class="land-form-row"> <input type="number" class="landinput" placeholder="80"
                                        name="pricePerTsubo" value="{{ old('pricePerTsubo') }}"></div>
                                <div class="error-space"> @error('pricePerTsubo')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-contact">
                                <label class="hidden">aaa</label>
                                <div class="land-form-row">
                                    <div class="land-calculate">
                                        <button type="button"id="calculate-btn">計算する</button><span></span>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="land-right">
                        <div class="land-card">
                            <div class="card-inner wrapper">
                                <h4>建築可能面積</h4>
                                <div class="land-right-valiable">
                                    <div class="land-form-row"><span class="long-p">合計</span>
                                        <input type="hidden" name="builable_area" id="builable_area_hidden"
                                            value="{{ $builable_area ?? 0 }}">
                                        <div class="form-valiable builable_area">{{ $builable_area ?? 0 }}</div>
                                        <span>㎡</span>
                                    </div>
                                    <div class="land-form-row">
                                        <span class="long-p">1階あたりの最大床面積</span>
                                        <div class="form-valiable maxfloor_area">{{ $maxFloorArea ?? 0 }}</div>
                                        <span>㎡</span>
                                    </div>
                                </div>
                            </div>

                            <div class="landform-contant">
                                <div class="error-space"> @error('builable_area')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="card-inner-center wrapper">
                                <input type="range" id="range" name="builable_area_Tubo" min="0"
                                    class="range">
                                <div class="land-form-row"><span class="form-valiable builable_area_Tubo"
                                        id="value">{{ $builable_area_Tubo ?? 0 }}
                                    </span>
                                    <span>坪</span>
                                </div>
                            </div>

                            <div class="landform-contant">
                                <div class="error-space">
                                    <div class="error"></div>
                                </div>
                            </div>


                            <div class="card-inner wrapper">
                                <h4>建築費用</h4>
                                <div class="land-right-valiable">
                                    <div class="land-form-row">
                                        <div class="form-valiable building_cost">{{ $building_cost ?? 0 }}</div>
                                        <span>万円</span>
                                    </div>
                                </div>
                            </div>
                            <div class="register"><button type="submit">登録する</button></div>
                        </div>

                    </div>

                </div>
            </form>

            <div class="land-list">
                <div class="table-wrapper" id="landtable">
                    <div class="landtable-contant">
                        <table class="land-table">
                            <thead>
                                <tr class="hidden">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="landsimulation">
                                @foreach ($landLogs as $landLog)
                                    <tr class="select-row" data-id="{{ $landLog->id }}"
                                        data-address="{{ $landLog->address }}" data-landarea="{{ $landLog->landarea }}"
                                        data-floor="{{ $landLog->floor }}" data-far="{{ $landLog->far }}"
                                        data-bcr="{{ $landLog->bcr }}" data-price="{{ $landLog->pricePerTsubo ?? 0 }}"
                                        data-builable-area="{{ $landLog->builable_area }}"
                                        data-tsubo="{{ $landLog->tsubo }}">

                                        <td data-label="更新日："> {{ $landLog->updated_formatted }} </td>
                                        <td data-label="住所：">{{ $landLog->address }}</td>
                                        <td data-label="土地面積：">{{ $landLog->landarea }}㎡</td>
                                        <td data-label="建築可能面積：">{{ $landLog->builable_area }}㎡/{{ $landLog->tsubo }}坪
                                        </td>

                                        <td data-label="容積率/建ぺい率：">{{ $landLog->far }}%/{{ $landLog->bcr }}%</td>
                                        <td><button type="button" class="edit-row"><svg
                                                    xmlns="http://www.w3.org/2000/svg" height="40px"
                                                    viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                                    <path
                                                        d="M284-286h68l250-249.33-68-69.34-250 250V-286Zm339.33-270.67 40-40.66q6.67-6.67 7-15 .34-8.34-7-15.67l-38-37.33q-7.33-7.34-15.33-7-8 .33-14.67 7l-40 39.33 68 69.33ZM186.67-120q-27.5 0-47.09-19.58Q120-159.17 120-186.67v-586.66q0-27.5 19.58-47.09Q159.17-840 186.67-840h192.66q7.67-35.33 35.84-57.67Q443.33-920 480-920t64.83 22.33Q573-875.33 580.67-840h192.66q27.5 0 47.09 19.58Q840-800.83 840-773.33v586.66q0 27.5-19.58 47.09Q800.83-120 773.33-120H186.67Zm0-66.67h586.66v-586.66H186.67v586.66Zm293.33-608q13.67 0 23.5-9.83t9.83-23.5q0-13.67-9.83-23.5t-23.5-9.83q-13.67 0-23.5 9.83t-9.83 23.5q0 13.67 9.83 23.5t23.5 9.83Zm-293.33 608v-586.66 586.66Z" />
                                                </svg></button></td>


                                        <td>
                                            <form action="{{ route('phase4.destroy', ['id' => $landLog->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="land-delete-btn"
                                                    onclick="return confirm('本当に削除しますか？')"><svg
                                                        xmlns="http://www.w3.org/2000/svg" height="40px"
                                                        viewBox="0 -960 960 960" width="40px" fill="#8C8C8C">
                                                        <path
                                                            d="M282.98-140q-25.71 0-44.14-18.43t-18.43-44.14v-532.05H180v-50.25h174.05v-30.51h251.9v30.51H780v50.25h-40.41v532.05q0 25.79-18.39 44.18T677.02-140H282.98Zm406.35-594.62H270.67v532.05q0 5.39 3.59 8.85t8.72 3.46h394.04q4.62 0 8.47-3.84 3.84-3.85 3.84-8.47v-532.05ZM379.54-273.23h50.25v-379.08h-50.25v379.08Zm150.67 0h50.25v-379.08h-50.25v379.08ZM270.67-734.62v544.36V-734.62Z" />
                                                    </svg></button>
                                        </td>
                                        </form>
                                    </tr>
                                @endforeach

                            </tbody>
                            <thead>
                                <tr class="hidden">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/landSimulation.js')
@endsection
