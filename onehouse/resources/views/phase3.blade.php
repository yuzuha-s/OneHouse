@extends('layout.nav')

@section('title', 'phase3')

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
                            d="M490.31-140v-.21.21q-51.59.46-112.77-7.42-61.18-7.89-113.94-25.18-52.75-17.3-88.18-44.66Q140-244.62 140-283.85q0 39.23 35.42 66.59 35.43 27.36 88.18 44.66 52.76 17.29 113.94 25.18 61.18 7.88 112.77 7.42Zm-10.18-208.31v-.54.54q-43.23-.15-83.67-4.01-40.43-3.86-76.96-11.98-36.52-8.11-69.15-20.16t-60.09-28.85q27.46 16.8 60.09 28.85t69.15 20.16q36.53 8.12 76.96 11.98 40.44 3.86 83.67 4.01ZM480-606.15q85.97 0 174.96-25.35 88.99-25.35 110.25-55.71-21.54-30.87-110.04-56.7-88.5-25.83-175.17-25.83-87.59 0-175.83 24.93-88.25 24.94-110.55 56.07 21.92 32.2 109.24 57.39 87.32 25.2 177.14 25.2Zm225.9 476.12h30.51v-167.38l74.31 74.56 21.54-21.54-111.23-111.23-111.24 111.23 21.54 21.54 74.57-74.56v167.38Zm15.13 62.34q-72.36 0-123.75-51.06-51.38-51.05-51.38-123.66 0-72.77 51.38-124.15 51.39-51.39 123.75-51.39 72.35 0 123.74 51.39 51.38 51.38 51.38 124.15 0 72.61-51.38 123.66-51.39 51.06-123.74 51.06ZM473.56-190.46q2.36 13.64 6.81 26.14 4.45 12.5 9.94 24.32-51.59.46-112.77-7.42-61.18-7.89-113.94-25.18-52.75-17.3-88.18-44.66Q140-244.62 140-283.85V-680q0-57.92 99.54-98.96Q339.08-820 480-820q140.92 0 240.46 41.04Q820-737.92 820-680v204.92q-11.82-5.48-24.32-9.55-12.5-4.06-25.94-6.42v-132.03q-53.84 31.54-130.19 48.87-76.34 17.34-159.96 17.21-85.77 0-162.06-17.46-76.3-17.46-127.27-48.62v156.49q50.56 33.15 127.55 50.59 76.98 17.44 161.78 17.44 11.31 0 22.1-.34 10.8-.33 22.11-1.15-9.67 11.87-17.39 24.78-7.72 12.91-13.97 26.96h-12.31q-87.26-.18-160.83-15.79-73.58-15.62-129.04-49.21v135.21q7.84 17.07 34.74 32.92 26.9 15.85 65.55 27.77 38.66 11.92 86.18 19.26 47.53 7.33 96.83 7.69Z" />
                    </svg>
                    <h3>loan</h3>
                </div>

                <div class="list-nav">
                    <div class="validate-wrapper hidden" id="calc-validate">

                        <div class="validate"><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                viewBox="0 -960 960 960" width="40px" fill="#576bf5">
                                <path
                                    d="M422-297.33 704.67-580l-49.34-48.67L422-395.33l-118-118-48.67 48.66L422-297.33ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-83 31.5-156t85.83-127q54.34-54 127.34-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 82.33-31.5 155.33-31.5 73-85.5 127.34Q709-143 636-111.5T480-80Zm0-66.67q139.33 0 236.33-97.33t97-236q0-139.33-97-236.33t-236.33-97q-138.67 0-236 97-97.33 97-97.33 236.33 0 138.67 97.33 236 97.33 97.33 236 97.33ZM480-480Z" />
                            </svg>
                            <p id="calc-message"></p>
                        </div>

                    </div>
                </div>

                <div class="list-nav">

                </div>
            </div>

            <form method="GET" action="{{ route('phase3.showLoanChart') }}">
                @csrf
                <div class="loan-form wrapper">
                    <div class="loan-left">
                        <div class="wrapper">
                            <div class="play">
                                <svg xmlns="http://www.w3.org/2000/svg" height="30px"
                                    viewBox="0 -960 960 960" width="30px" fill="#8C8C8C">
                                    <path
                                        d="M403.33-320 630-480.67 403.33-640v320ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-42.33 8.33-82.5 8.34-40.17 25.34-78.5l50.66 50.67q-8 27.33-12.83 54.82-4.83 27.48-4.83 55.51 0 139.58 96.87 236.46 96.88 96.87 236.46 96.87t236.46-96.87q96.87-96.88 96.87-236.46T716.4-716.46q-96.93-96.87-236.59-96.87-28.14 0-55.66 4.67-27.51 4.68-54.48 12.99l-51-51Q357.33-862 396.33-871q39-9 81-9 83.24 0 156.46 31.5Q707-817 761.63-763q54.63 54 86.5 127Q880-563 880-480t-31.5 156Q817-251 763-197t-127 85.5Q563-80 480-80ZM215.25-692.67q-22.25 0-37.75-15.58-15.5-15.57-15.5-37.83 0-22.25 15.58-37.75t37.83-15.5q22.26 0 37.76 15.58 15.5 15.57 15.5 37.83 0 22.25-15.58 37.75t-37.84 15.5ZM480-480Z" />
                                </svg>
                                <p>金額を入れてシュミレーションしてみよう！</p>
                            </div>
                        </div>

                        <div class="left-fix">
                            <div class="loanform-contant">
                                <label for="">借入金額(万円)</label>
                                <div class="form-row">
                                    <input id="loan" type="number" name="loan" value="{{ old('loan', $loan) }}">
                                </div>
                            </div>

                            <div class="loanform-contant">
                                <label for="">年利(固定金利%)</label>
                                <div class="form-row">
                                    <input type="number" id="rate" step="0.1" name="rate"
                                        value="{{ old('rate', $rate) }}">
                                </div>
                            </div>

                            <div class="loanform-contant">
                                <label for="">返済期間(年)</label>
                                <div class="form-row">
                                    <input id="loan_term" type="number" min="10" max="40" name="loan_term"
                                        value="{{ old('loan_term', $loan_term) }}">
                                </div>
                            </div>
                        </div>

                        <div class="left-fix">
                            <div class="loanform-contant">
                                <label for="">年齢(歳)</label>
                                <div class="form-row">
                                    <input id="age" type="number" name="age" value="{{ old('age', $age) }}">
                                </div>
                            </div>

                            <div class="loanform-contant">
                                <label for="">毎月の支出(万円)</label>
                                <div class="form-row">
                                    <input id="expense" type="number" name="expense"
                                        value="{{ old('expense', $expense) }}">
                                </div>
                            </div>

                            <div class="loanform-contant">
                                <label for="">現在の収入(万円/年間)</label>
                                <div class="form-row">
                                    <input id="income" type="number" name="income"
                                        value="{{ old('income', $income) }}">
                                </div>
                            </div>
                        </div>
                        <div class="calculate">
                            <button type="submit" id="calc-btn">計算する</button>
                        </div>
                    </div>

                    <div class="loan-right">
                        <div class="loan-card">
                            <div class="valiableform-row">
                                <div class="form-valiable" id="payoffAge">33</div>
                                <span>歳で完済が完了します。</span>
                            </div>
                            <div class="valiableform-row">
                                <span>月々の返済額は</span>
                                <div class="form-valiable" id="monthlyPayment">16 </div>
                                <span>万円です。</span>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <div id="loan-chart" data-loan="{{ $loan }}" data-rate="{{ $rate }}"
                data-term="{{ $loan_term }}" data-age="{{ $age }}" data-expense={{ $expense }}
                data-income="{{ $income }}"></div>

            @vite('resources/js/loanSimulation.js')
            @vite('resources/js/app.js')

        </div>
    </div>
@endsection
