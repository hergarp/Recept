<nav>
    <ul>
        <li class="float-letf">
            <a class="flp" href="index">
                <img src="../img/logo.png" alt="">
            </a>
        </li>
        @if (Auth::guest()) 
        <li class="float-right"><a href="/login">Bejelentkezés</a></li>
        @else
        <li class="float-right"><a href="/logout">Kijelentkezés</a></li>
        @endif
        <li class="float-right"><a href="">Receptbeküldés</a></li>
    </ul>
</nav>