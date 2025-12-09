@extends('layout.index')

@section('ttitle', 'login')

@section('content')

    <div class="auth-header wrapper">
        <div class="list-nav">
            <h1>Login</h1>
        </div>

        <div class="list-nav">
            <div class="validate-wrapper">
                @if (session('status'))
                    <div class="validate"> {{ session('status') }}</div>
                @endif

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

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="auth-form">
            <div class="setup-form wrapper">
                {{-- <div class="resetform-contant">
                    <label for="name">User Name</label>
                    <input id="name" name="name" value="{{ old('name') }}" type="text" class="forminput"
                        required autofocus>
                </div>
            </div> --}}

                <div class="setup-form wrapper">
                    <div class="resetform-contant">
                        <label for="email">email</label>
                        <input id="email" value="{{ old('email') }}" type="email" name="email" class="forminput"
                            required autofocus>
                    </div>
                </div>

                <div class="setup-form wrapper">
                    <div class="resetform-contant">
                        <label for="passsword">Password</label>
                        <input id="password" name="password" value="{{ old('password') }}" type="password"
                            class="forminput" required autofocus>
                    </div>
                </div>

                <div class="setup-form wrapper">
                    <div class="register">
                        <button type="submit">ログイン</button>
                    </div>
                </div>


                <div class="setup-form wrapper">
                    <div class="button-form wrapper">
                        <a href="/password_help" class="setup-button">パスワードを忘れた方</a>
                        <a href="/setup" class="setup-button">新規登録</a>
                    </div>
                </div>
            </div>
    </form>
@endsection



{{--

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
