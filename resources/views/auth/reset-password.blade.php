<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <title>Jelszó visszaállítása | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
        </header>
        <div class="container">
            <!-- Validation Errors -->
            <x-auth-validation-errors :errors="$errors" />

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" type="password" name="password" required />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation"
                                        type="password"
                                        name="password_confirmation" required />
                </div>

                <div>
                    <x-button>
                        {{ __('Jelszó visszaállítása') }}
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
