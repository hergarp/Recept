<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <link rel="stylesheet" href="../css/profile-desktop.css">
    <link rel="stylesheet" href="../css/rating.css">
    <title>Profil | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
            <h2>Profil</h2>
        </header>
        <div class="container">
            <article>
                <div class="result -colorBgTernary">
                    <img src="img/cake.jpg" alt="" srcset="">
                    <form action="">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </form>
                    <h3>Title</h3>
                </div>
                <div class="result -colorBgTernary">
                    <img src="img/cake.jpg" alt="" srcset="">
                    <form action="">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </form>
                    <h3>Title</h3>
                </div>
                <div class="result -colorBgTernary">
                    <img src="img/cake.jpg" alt="" srcset="">
                    <form action="">
                        <div class="rate">
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                    </form>
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
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="breakfast"><input class="d-none"
                        type="checkbox" name="breakfast" id="breakfast" />reggeli</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="elevenses"><input class="d-none"
                        type="checkbox" name="elevenses" id="elevenses" />tízórai</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="lunch"><input class="d-none" type="checkbox"
                        name="lunch" id="lunch" />ebéd</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="snack"><input class="d-none" type="checkbox"
                        name="snack" id="snack" />uzsonna</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="dinner"><input class="d-none" type="checkbox"
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
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="glutenfree"><input class="d-none"
                        type="checkbox" name="glutenfree" id="glutenfree"/>gluténmentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="sugarfree"><input class="d-none"
                        type="checkbox" name="sugarfree" id="sugarfree" />cukormentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="milk-free"><input class="d-none" type="checkbox"
                        name="milk-free" id="milk-free" />tejmentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="egg-free"><input class="d-none" type="checkbox"
                        name="egg-free" id="egg-free" />tojásmentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="laktosefree"><input class="d-none" type="checkbox"
                        name="laktosefree" id="laktosefree" />laktózmentes</label>
                    <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="vegan"><input class="d-none" type="checkbox"
                        name="vegan" id="vegan" />vegán</label>
                </section>
            </aside>
        </div>
        <footer>
            @include('../template/footer')
        </footer>
    </main>
</body>
</html>