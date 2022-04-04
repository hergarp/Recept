<nav class="dropdown">
    <h1 class="d-none"><a class="flp" href="../index">Recapt</a></h1>
    <a class="flp" href="../../index">
        <img src="../../img/logo.png" alt="">
    </a>
    <ul>
        @if(\Request::is("login") or \Request::is("register"))

        @else
            <li class="float-right"><a href="#">Menü</a>
            <ul>
                <li><a href="/upload">Receptbeküldés</a></li>
                @if (Auth::check() and Auth::user()->is_admin)
                <li>
                    <a href="#">Receptek</a>
                    <ul>
                        <li><a href="../../admin/recipe-list">Publikus receptek</a></li>
                        <li><a href="../../admin/draft-recipe-list">Draft receptek</a></li>
                    </ul>
                </li>
                <li><a href="../../admin/materials">Alapanyag műveletek</a></li>
                @endif
                @if (Auth::guest()) 
                <li><a href="../login">Bejelentkezés</a></li>
                @else
                <li><a href="../../profile">Profil</a></li>
                <li><a href="../logout">Kijelentkezés</a></li>
                @endif
            </ul>
            </li>
        @endif
    </ul>
</nav>