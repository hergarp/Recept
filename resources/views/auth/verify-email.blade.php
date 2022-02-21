<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <title>E-mail verifikálás | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
        </header>
        <div class="container">
            <div>
                {{ __('Köszönjük regisztrációját! Mielőtt elmélyedne az oldal használatában, kérjük, igazolja e-mail címét az arra kiküldött levélben elhelyezett linkre való kattintással. Amennyiben nem érkezett meg levelünk, kattintson a \'Verifikációs e-mail újraküldése\' gombra.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div>
                    {{ __('Egy új verifikációs link ki lett küldve az Ön által a regisztráció során megadott e-mail címre.') }}
                </div>
            @endif

            <div>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-button class="m-button p-3">
                            {{ __('Verifikációs e-mail újraküldése') }}
                        </x-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit">
                        {{ __('Kijelentkezés') }}
                    </button>
                </form>
            </div>
        </div>
        <footer>
            @include('../template/footer')
        </footer>
    </main>
</body>
</html>
