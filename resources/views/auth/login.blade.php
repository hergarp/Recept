<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <link rel="stylesheet" href="css/login.css">
    <title>Login | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
            <h2 class="align-center mb-3">Bejelentkezés</h2>
        </header>
        <div class="container">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="login-cont">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="right">
                        <x-label for="email" :value="__('Email')" />

                        <x-input class="m-form__input -colorBgTernary" id="email" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="right">
                        <x-label for="password" :value="__('Jelszó')" />

                        <x-input class="m-form__input -colorBgTernary" id="password" 
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="align-center">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"  name="remember">
                            <span>{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="align-center">
                        @if (Route::has('password.request'))
                        <small>
                            <a href="{{ route('password.request') }}">
                                {{ __('Elfelejtette jelszavát?') }}
                            </a>
                        </small>
                        <br>
                        <small>
                            <a href="{{ route('register') }}">
                                {{ __('Még nem regisztrált?') }}
                            </a>
                        </small>
                        @endif
                        <br>
                        <x-button class="m-button -adding mt-20 p-3">
                            {{ __('Bejelentkezés') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
        <footer>
            @include('../template/footer')
        </footer>
    </main>
</body>
</html>