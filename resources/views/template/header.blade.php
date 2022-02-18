<nav class="dropdown">
    <a class="flp" href="../index">
        <img src="../img/logo.png" alt="">
    </a>
    <ul>
        @if(\Request::is("login") or \Request::is("register"))

        @else
            <li class="float-right"><a href="#">Menü</a>
            <ul>
            @if (Auth::guest()) 
            <li><a href="/login">Bejelentkezés</a></li>
            @else
            <li><a href="/logout">Kijelentkezés</a></li>
            <li><a href="/profile">Profil</a></li>
            @endif
            <li>
                <a href="#">Receptek</a>
                <ul>
                    <li><a href="../admin/recipe-list">Publikus receptek</a></li>
                    <li><a href="../admin/drafr-recipe-list">Draft receptek</a></li>
                </ul>
            </li>
            <li><a href="/upload">Receptbeküldés</a></li>
</ul>
</li>
        @endif
    </ul>
</nav>