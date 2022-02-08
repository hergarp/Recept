<nav>
    <ul>
        <li class="float-letf">
            <a class="flp" href="index">
                <img src="../img/logo.png" alt="">
            </a>
        </li>
        @if(\Request::is("login") or \Request::is("register"))

        @else
            @if (Auth::guest()) 
            <li class="float-right"><a href="/login">Bejelentkezés</a></li>
            @else
            <li class="float-right"><a href="/logout">Kijelentkezés</a></li>
            <li class="float-right"><a href="/profile">Profil</a></li>
            @endif
            <li class="float-right"><a href="/upload">Receptbeküldés</a></li>
        @endif
    </ul>
</nav>