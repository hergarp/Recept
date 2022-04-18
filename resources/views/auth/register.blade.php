<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <link rel="stylesheet" href="css/registration.css">
    <title>Regisztráció</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
            <h2 class="align-center mb-3">Regisztráció</h2>
        </header>
        <div class="container">
        
        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="reg-cont">
                <!-- Name -->
                <div class="right">
                    <x-label for="name" :value="__('Név')" />

                    <x-input class="m-form__input -colorBgTernary" id="name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="right">
                    <x-label for="email" :value="__('Email')" />

                    <x-input class="m-form__input -colorBgTernary" id="email" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="right">
                    <x-label for="password" :value="__('Jelszó')" />

                    <x-input class="m-form__input -colorBgTernary" id="password"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="right">
                    <x-label for="password_confirmation" :value="__('Jelszó megerősítése')" />

                    <x-input class="m-form__input -colorBgTernary" id="password_confirmation"
                                    type="password"
                                    name="password_confirmation" required />
                </div>
            </div>
            <div class="align-center">
                <small>
                    <a href="{{ route('login') }}">
                        {{ __('Már regisztrált?') }}
                    </a>
                </small>
                <br>
                <x-button class="m-button -adding mt-20 p-3">
                    {{ __('Regisztráció') }}
                </x-button>
            </div>
        </form>
        </div>
        <footer>
            @include('../template/footer')
        </footer>
    </main>
</body>
</html>