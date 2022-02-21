<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <title>Document</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
        </header>
        <div class="container">
            <div>
                {{ __('Titkosított felületre kíván belépni. Kérem, adja meg jelszavát a folytatás előtt.') }}
            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors :errors="$errors" />

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div>
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <div>
                    <x-button>
                        {{ __('Confirm') }}
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
