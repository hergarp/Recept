
<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <link rel="stylesheet" href="../css/materials-desktop.css">
    <script src="../js/materials.js"></script>
    <script src="../js/materials-table.js"></script>
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
                <form id="adding-material" action="/admin/add-materials" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input name="megnevezes" class="-hidden m-form__input -colorBgTernary" type="text" placeholder="Alapanyag megnevezése">
                    <div class="button-div">
                        <button type="submit" class="-adding m-button p-3" name="form1">Alapanyag felvétele</button>
                    </div>
                </form>
            </section>
            <hr>
            <section>
                <h2>Alapanyag – mértékegység felvétele</h2>
                <form id="adding-matunit" action="/admin/add-matunits" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div>                            
                        <div class="select-div mb-3">
                            <input id="alapanyag" class="m-form__input -colorBgTernary" list="materials" name="alapanyag" placeholder="Alapanyag">
                            <datalist id="materials">
                                @foreach ($materials as $material)     
                                    <option value="{{ $material->megnevezes }}">{{ $material->megnevezes }}</option>
                                @endforeach
                            </datalist>
                            <select class="m-form__select -colorBgTernary" name="mertekegyseg" id="unit">
                                <option disabled selected value>Válassz mértékegységet</option>    
                                @foreach ($units as $unit)    
                                    <option value="{{ $unit->mertekegyseg}}">{{ $unit->mertekegyseg}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="existing-matunits">
                            <table id="am-table">
                            </table>
                        </div>
                    </div>
                    <div class="button-div">
                        <button type="submit" class="-adding m-button p-3" name="form2">Alapanyag – mértékegység felvétele</button>
                    </div>
                </form>
            </section>
            <hr>
            <section>
                <h2>Allergének hozzáadása</h2>
                <form id="adding-allergen" action="/admin/add-allergen" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="select-div">
                        <input class="m-form__input -colorBgTernary" list="materials" name="alapanyag" placeholder="Alapanyag">
                        <datalist id="materials">
                            @foreach ($materials as $material)     
                                <option value="{{ $material->megnevezes }}">{{ $material->megnevezes }}</option>
                            @endforeach
                        </datalist>
                        <select class="m-form__select -colorBgTernary" name="allergen" id="allergen">
                            <option disabled selected value>Válassz allergént</option>     
                            <option value="sugar">cukor</option>
                            <option value="milk">tej</option>
                            <option value="laktose">laktóz</option>
                            <option value="egg">tojás</option>
                            <option value="gluten">glutén</option>
                        </select>
                    </div>
                    <div class="button-div">
                        <button type="submit" class="-adding m-button p-3" name="form3">Allergén hozzáadása</button>
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