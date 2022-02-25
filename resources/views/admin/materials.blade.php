
<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <link rel="stylesheet" href="../css/materials-desktop.css">
    <title>Alapanyagok | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
        </header>
        <div class="container">
            @if (Auth::check() and Auth::user()->is_admin)
            <section>
                <h2>Alapanyag felvétele</h2>
                <form id="adding-material" action="">
                    <input class="-hidden m-form__input -colorBgTernary" type="text" placeholder="Alapanyag megnevezése">
                    <div class="button-div">
                        <button class="-adding m-button p-3">Alapanyag felvétele</button>
                    </div>
                </form>
            </section>
            <hr>
            <section>
                <h2>Alapanyag – mértékegység felvétele</h2>
                <form id="adding-matunit" action="">
                    <div>    
                        <div class="select-div">
                            <select class="m-form__select -colorBgTernary" name="material-1" id="material-1">
                                <option value="">Valami</option>
                            </select>
                            <select class="m-form__select -colorBgTernary" name="unit-1" id="unit-1">
                                <option value="">Mértékegység valami</option>
                            </select>
                        </div>
                        <div>
                            <p class="right">
                            alapanyag – mértékegység hozzáadása <button id="adding-mu" class="-adding little-button">+</button>
                            </p>
                        </div>
                        <div id="existing-matunits"></div>
                    </div>
                    <div class="button-div">
                        <button class="-adding m-button p-3">Alapanyag – mértékegység felvétele</button>
                    </div>
                </form>
            </section>
            <hr>
            <section>
                <h2>Allergének hozzáadása</h2>
                <form id="adding-allergen" action="">
                    <div class="select-div">
                        <select class="m-form__select -colorBgTernary" name="material" id="material">
                            <option value="">Valami</option>
                        </select>
                        <select class="m-form__select -colorBgTernary" name="allergen" id="allergen">
                            <option value="">Valami</option>
                        </select>
                    </div>
                    <div class="button-div">
                        <button class="-adding m-button p-3">Allergén hozzáadása</button>
                    </div>
                </form>
            </section>
            @else
            <div class="align-center">
                <p>Ezen oldal betöltéséhez adminnak kell lenni.</p>
                <a href="/login">Bejelentkezés</a>
            </div>
            @endif
        </div>
        <footer>
            @include('../template/footer')
        </footer>
    </main>
</body>
</html>