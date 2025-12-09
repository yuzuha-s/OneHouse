@extends('layout.index')

@section('ttitle', 'password_help')

@section('content')

    <div class="auth-header wrapper">
        <div class="list-nav">
            <h1>Password Reset</h1>
        </div>

        <div class="list-nav">
            <div class="validate-wrapper">
                @foreach ($errors->all() as $error)
                    <div class="validate">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                            fill="#576bf5">
                            <path
                                d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z" />
                        </svg>
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <div class="auth-form">
            <div class="setup-form wrapper">
                <div class="resetform-contant">
                    <label for="email">email</label>
                    <input id="email" value="{{ old('email') }}" type="email" name="email" class="forminput"
                        required autofocus>
                </div>
            </div>


            <div class="setup-form wrapper">
                <div class="resetform-contant">
                    <label for="password">Password</label>
                    <input id="password" name="password" value="{{ old('password') }}" type="password" class="forminput"
                        required autofocus>
                </div>
            </div>

            <div class="setup-form wrapper">
                <div class="register">
                    <button type="submit">変更する</button>
                </div>
            </div>


            <div class="setup-form wrapper">
                <div class="button-form wrapper">
                    <a href="/login" class="setup-button">ログイン</a>
                    <a class="btn-hidden setup-button">ログイン</a>

                </div>
            </div>
        </div>
    </form>


@endsection
