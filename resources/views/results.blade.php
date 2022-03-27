<!DOCTYPE html>
<html lang="hu">
<head>
    @include('template/head')
    <link rel="stylesheet" href="css/results-desktop.css">
    <script src="js/results.js"></script>
    <title>Találatok | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('template/header')
            <h2>Találatok a <span class="salmon">{{$keyword}}</span> kulcsszóra</h2>
            <p id="url"></p>
        </header>
        <div class="container">
        <article>
            <div class="d-none template result">
                <img src="#" alt="">
                <h3>Title</h3>
            </div>
            @if (count($recipes) != 0)
            @foreach ($recipes as $recipe)
            <div class="result">
                <a href="../recipe/{{$recipe['url_slug']}}?adag={{$recipe['adag']}}">
                    <div class="image" style="background-image: url('../{{$recipe['kep']}}');"></div>
                    <h3>{{$recipe['megnevezes']}}</h3>
                </a>
            </div>
            @endforeach
            @else
                <p>Nincsenek találatok.</p>
            @endif
        </article>
        <aside>
            <form action="/results">
                <input class="d-none" name="keyword" type="text" value="{{$keyword}}">
                <input class="d-none" name="search_selector" type="text" value="{{$_GET['search_selector']}}">
                <input class="-salmon -sending w-100" type="submit" value="Szűrés">
                <section>
                    <h2>Szezon</h2>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="winter"><input class="d-none" type="checkbox"
                        name="winter" id="winter" <?php echo isset($_GET['winter'])? 'checked' : '' ;?>/>tél</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="spring"><input class="d-none" type="checkbox"
                        name="spring" id="spring" <?php echo isset($_GET['spring'])? 'checked' : '' ;?>/>tavasz</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="summer"><input class="d-none" type="checkbox"
                        name="summer" id="summer" <?php echo isset($_GET['summer'])? 'checked' : '' ;?>/>nyár</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="autumn"><input class="d-none" type="checkbox"
                        name="autumn" id="autumn" <?php echo isset($_GET['autumn'])? 'checked' : '' ;?>/>ősz</label>
                </section>
                <section>
                    <h2>Napszak</h2>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="breakfast"><input class="d-none"
                        type="checkbox" name="breakfast" id="breakfast" <?php echo isset($_GET['breakfast'])? 'checked' : '' ;?>/>reggeli</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="elevenses"><input class="d-none"
                        type="checkbox" name="elevenses" id="elevenses" <?php echo isset($_GET['elevenses'])? 'checked' : '' ;?>/>tízórai</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="lunch"><input class="d-none" type="checkbox"
                        name="lunch" id="lunch" <?php echo isset($_GET['lunch'])? 'checked' : '' ;?>/>ebéd</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="snack"><input class="d-none" type="checkbox"
                        name="snack" id="snack" <?php echo isset($_GET['snack'])? 'checked' : '' ;?>/>uzsonna</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="dinner"><input class="d-none" type="checkbox"
                        name="dinner" id="dinner" <?php echo isset($_GET['dinner'])? 'checked' : '' ;?>/>vacsora</label>
                </section>
                <section>
                    <h2>Alapanyagok</h2>
                    <div class="-colorBgTernary mb-3 w-100">
                        <input class="-hidden m-form__input" list="materials" type="text" name="raw_material" placeholder="Alapanyag" value="<?php echo isset($_GET['raw_material'])? $_GET['raw_material'] : '' ;?>">
                        <datalist id="materials">
                            @foreach ($materials as $material)     
                                <option value="{{ $material->megnevezes }}">{{ $material->megnevezes }}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="-colorBgTernary mb-3 w-100">
                        <input class="-hidden m-form__input" list="no-materials" type="text" name="no_material" placeholder="Alapanyag nélkül" value="<?php echo isset($_GET['no_material'])? $_GET['no_material'] : '' ;?>">
                        <datalist id="no-materials">
                            @foreach ($materials as $material)     
                                <option value="{{ $material->megnevezes }}">{{ $material->megnevezes }}</option>
                            @endforeach
                        </datalist>    
                    </div>
                </section>
                <section>
                    <h2>Speciális étrendek</h2>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="glutenfree"><input class="d-none"
                        type="checkbox" name="glutenfree" id="glutenfree"/>gluténmentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="sugarfree"><input class="d-none"
                        type="checkbox" name="sugarfree" id="sugarfree" />cukormentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="milk-free"><input class="d-none" type="checkbox"
                        name="milk-free" id="milk-free" />tejmentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="egg-free"><input class="d-none" type="checkbox"
                        name="egg-free" id="egg-free" />tojásmentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="laktosefree"><input class="d-none" type="checkbox"
                        name="laktosefree" id="laktosefree" />laktózmentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="vegan"><input class="d-none" type="checkbox"
                        name="vegan" id="vegan" />vegán</label>
                </section>
            </form>
        </aside>
        </div>
        <footer>
            @include('template/footer')
        </footer>
    </main>
</body>
</html>