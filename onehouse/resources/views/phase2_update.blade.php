@extends('layout.back')

@section('title', 'phase2 | update')

@section('content')

@endsection

@section('aside')

    <form action="{{ route('update', ['id' => $maker->id]) }}" method="POST" id="maker-form">
        @csrf
        <div class="marker-edit wrapper">
            <div class="list">
                <div class="list-header wrapper">
                    <div class="list-nav">
                        <svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 -960 960 960" width="50px"
                            fill="#1f1f1f">
                            <path
                                d="M692.87-615.85h61.03v-61.02h-61.03v61.02Zm0 165.29h61.03v-61.03h-61.03v61.03Zm0 164.87h61.03v-61.03h-61.03v61.03ZM640.92-140v-50.26h208.82v-579.48H460.51v99.1l-50.25-35.54V-820H900v680H640.92ZM60-140v-365.13l255.54-182.41 255.13 182.33V-140H367.28v-190.41H263.79V-140H60Zm50.26-50.26h103.28v-190.41h204v190.41h102.87v-289.33L315.54-625.03 110.26-479.24v288.98Zm530.66-352.56ZM417.54-190.26v-190.41h-204v190.41-190.41h204v190.41Z" />
                        </svg>
                        <h3>marker</h3>
                    </div>

                    <div class="list-nav">
                        <div class="validate-wrapper">
                            @error('star')
                                <div class="validate">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                        width="20px" fill="#576bf5">
                                        <path
                                            d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z" />
                                    </svg>
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror

                            @error('name')
                                <div class="validate">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960"
                                        width="20px" fill="#576bf5">
                                        <path
                                            d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z" />
                                    </svg>
                                    <p>{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="list-nav end-contant">
                        <div class="star-rating">
                            <input type="hidden" name="star_value" value="{{ old('star_value', $maker->star ?? 0) }}">

                            @for ($i = 1; $i <= 5; $i++)
                                <label for="" class="star-check">
                                    <input type="checkbox" name="star[]" value="{{ $i }}"
                                        @if ($i <= old('star_value', $maker->star ?? 0)) checked @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="60px" viewBox="0 -960 960 960"
                                        width="50px" fill="#FFFFFF" stroke="#8C8C8C" stroke-width="50">
                                        <path
                                            d="m305-704 112-145q12-16 28.5-23.5T480-880q18 0 34.5 7.5T543-849l112 145 170 57q26 8 41 29.5t15 47.5q0 12-3.5 24T866-523L756-367l4 164q1 35-23 59t-56 24q-2 0-22-3l-179-50-179 50q-5 2-11 2.5t-11 .5q-32 0-56-24t-23-59l4-165L95-523q-8-11-11.5-23T80-570q0-25 14.5-46.5T135-647l170-57Z">
                                        </path>
                                    </svg>
                                </label>
                            @endfor
                        </div>
                        <div class="register">
                            <button type="submit">変更する</button>
                        </div>
                    </div>
                </div>
                <div class="wrapper updated_at">
                    <div class="update">最終更新日：{{ $maker->updated_at->format('m月d日 H:i') }}</div>
                </div>

                <div class="marker-form wrapper">
                    <div class="maker-left">

                        <div class="makerform-contant">
                            <label>メーカー名</label><input type="text" name="name"
                                value="{{ old('name', $maker->name) }}" class="maker-input" >
                        </div>
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div class="makerform-contant">
                            <label>担当者名</label>
                            <input type="text" name="sales" value="{{ old('sales', $maker->sales) }}" class="maker-input">
                        </div>

                        <div class="makerform-contant">
                            <label>ブランド</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 1)
                                        <div class="">
                                            <label class="checkbox-btn">
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', $maker->features->pluck('id')->toArray()))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="makerform-contant">
                            <label>標準仕様・オプション・特典など</label>
                            <textarea name="option">{{ old('option', $maker->option) }}</textarea>
                        </div>




                    </div>

                    <div class="maker-right">
                        <div class="makerform-contant">
                            <label>工法・構造</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 2)
                                        <div class="">
                                            <label class="checkbox-btn">
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', $maker->features->pluck('id')->toArray()))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="makerform-contant">
                            <label>耐熱性能・省エネ性</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 3)
                                        <div class="">
                                            <label class="checkbox-btn">
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', $maker->features->pluck('id')->toArray()))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="makerform-contant">
                            <label>耐震性</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 4)
                                        <div class="">
                                            <label class="checkbox-btn">
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', $maker->features->pluck('id')->toArray()))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="makerform-contant">
                            <label>保証・アフターサービス</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 5)
                                        <div class="">
                                            <label class="checkbox-btn">
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', $maker->features->pluck('id')->toArray()))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="makerform-contant">
                            <label>デザイン間取りの自由度</label>
                            <div class="form-button">
                                @foreach ($features as $feature)
                                    @if ($feature->category->id === 6)
                                        <div class="">
                                            <label class="checkbox-btn">
                                                <input type="checkbox" name="features[]" value="{{ $feature->id }}"
                                                    @if (in_array($feature->id, old('features', $maker->features->pluck('id')->toArray()))) checked @endif>
                                                {{ $feature->tag }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>

    @vite('resources/js/makerlist.js')
@endsection
