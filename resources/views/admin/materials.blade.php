
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
                            <select class="m-form__select -colorBgTernary" name="alapanyag" id="mat">
                                <option disabled selected value>Válassz alapanyagot</option>
                                @foreach ($materials as $material)     
                                    <option value="{{ $material->megnevezes }}">{{ $material->megnevezes }}</option>
                                @endforeach
                            </select>
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
                        <select class="m-form__select -colorBgTernary" name="alapanyag" id="material">
                            <option disabled selected value>Válassz alapanyagot</option>     
                            @foreach ($materials as $material)     
                                <option value="{{ $material->megnevezes }}">{{ $material->megnevezes }}</option>
                            @endforeach
                        </select>
                        <select class="m-form__select -colorBgTernary" name="allergen" id="allergen">
                            <option disabled selected value>Válassz allergént</option>     
                            <option value="cukor">cukor</option>
                            <option value="tej">tej</option>
                            <option value="laktóz">laktóz</option>
                            <option value="tojás">tojás</option>
                            <option value="glutén">glutén</option>
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