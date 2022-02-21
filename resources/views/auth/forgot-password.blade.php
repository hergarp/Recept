<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <title>Elfelejtett jelszó | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
            <h2 class="align-center mb-3">Elfelejtett jelszó</h2>
        </header>
        <div class="container">
        <div>
            {{ __('Elfelejtette jelszavát? Semmi gond! Csak adja meg e-mail címét, és levélben elküldjük a reset linket, melynek segítségével új jelszót adhat meg.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input class="m-form__input -colorBgTernary" id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div>
                <x-button class="m-button -adding mt-20 p-3">
                    {{ __('Küldjék a reset linket') }}
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
