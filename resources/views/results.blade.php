<!DOCTYPE html>
<html lang="hu">
<head>
    @include('template/head')
    <link rel="stylesheet" href="css/results-desktop.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/upload.js"></script>
    <title>Találatok | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('template/header')
            <h2>Találatok a '#'' kulcsszóra</h2>
        </header>
        <div class="container">
        <article>
            <div class="result">
                <img src="img/cake.jpg" alt="" srcset="">
                <h3>Title</h3>
            </div>
            <div class="result">
                <img src="img/cocktail.webp" alt="" srcset="">
                <h3>Title</h3>
            </div>
            <div class="result">
                <img src="img/cake.jpg" alt="" srcset="">
                <h3>Title</h3>
            </div>
            <div class="result">
                <img src="img/cake.jpg" alt="" srcset="">
                <h3>Title</h3>
            </div>
            <div class="result">
                <img src="img/cake.jpg" alt="" srcset="">
                <h3>Title</h3>
            </div>
            <div class="result">
                <img src="img/cake.jpg" alt="" srcset="">
                <h3>Title</h3>
            </div>
        </article>
        <aside>
            <section>
                <h2>Szezon</h2>
                <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="winter"><input class="d-none" type="checkbox"
                    name="winter" id="winter" />tél</label>
                <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="spring"><input class="d-none" type="checkbox"
                    name="spring" id="spring" />tavasz</label>
                <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="summer"><input class="d-none" type="checkbox"
                    name="summer" id="summer" />nyár</label>
                <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="autumn"><input class="d-none" type="checkbox"
                    name="autumn" id="autumn" />ősz</label>
            </section>
            <section>
                <h2>Napszak</h2>
                <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="breakfast"><input class="d-none"
                    type="checkbox" name="breakfast" id="breakfast" />reggeli</label>
                <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="elevenses"><input class="d-none"
                    type="checkbox" name="elevenses" id="elevenses" />tízórai</label>
                <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="lunch"><input class="d-none" type="checkbox"
                    name="lunch" id="lunch" />ebéd</label>
                <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="snack"><input class="d-none" type="checkbox"
                    name="snack" id="snack" />uzsonna</label>
                <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="dinner"><input class="d-none" type="checkbox"
                    name="dinner" id="dinner" />vacsora</label>
            </section>
            <section>
                <h2>Alapanyagok</h2>
                <div class="-colorBgTernary mb-3 w-100">
                    <input class="-hidden m-form__input" type="text" name="raw-material" id="raw-material" placeholder="Alapanyag">
                </div>
                <div class="-colorBgTernary mb-3 w-100">
                    <input class="-hidden m-form__input" type="text" name="no-material" id="no-material" placeholder="Alapanyag nélkül">
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
        </aside>
        </div>
        <footer>
            @include('template/footer')
        </footer>
    </main>
</body>
</html>