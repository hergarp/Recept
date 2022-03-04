<!DOCTYPE html>
<html lang="hu">

<head>
  @include('../template/head')
  <link rel="stylesheet" href="../css/admin-upload-recipe-desktop.css">
  <script src="../js/upload.js"></script>
  <title>Admin – Receptfelvitel | Recapt</title>
</head>

<body>
  <main>
    <header>
      @include('../template/header')
    </header>
    <div class="container">
    @if (Auth::check() and Auth::user()->is_admin)
    <form action="">
    <article>
      <input class="w-100 -hidden" type="text" name="title" id="title" placeholder="Név" value="Light Strawberry" />
      <div id="image">
        <img src="../img/cocktail.webp" alt="">
      </div>
      <section>
        <h2>Hozzávalók</h2>
        <div id="ingredients">
          <div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">
            <select class="m-form__select right-b raw-material-name" name="raw-material-1" id="raw-material-1">
              <option value="">eperszirup</option>
            </select>
            <input class="-hidden m-form__input raw-material-quantity" type="number" name="quantity-1" id="quantity-1"
              placeholder="mennyiség" value="1" />
            <select class="m-form__select left-b raw-material-unit" name="unit-1" id="unit-1">
              <option value="">cl</option>
            </select>
            <div class="right">
              <button class="-delete little-button">–</button>
            </div>
          </div>
          <div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">
            <select class="m-form__select right-b raw-material-name" name="raw-material-2" id="raw-material-2">
              <option value="">ananászlé</option>
            </select>
            <input class="-hidden m-form__input  raw-material-quantity" type="number" name="quantity-2" id="quantity-2"
              placeholder="mennyiség" value="1" />
            <select class="m-form__select left-b raw-material-unit" name="unit-2" id="unit-2">
              <option value="">cl</option>
            </select>
            <div class="right">
              <button class="-delete little-button">–</button>
            </div>
          </div>
          <div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">
            <select class="m-form__select right-b raw-material-name" name="raw-material-3" id="raw-material-3">
              <option value="">citromlé</option>
            </select>
            <input class="-hidden m-form__input  raw-material-quantity" type="number" name="quantity-3" id="quantity-3"
              placeholder="mennyiség" value="1" />
            <select class="m-form__select left-b raw-material-unit" name="unit-3" id="unit-3">
              <option value="">cl</option>
            </select>
            <div class="right">
              <button class="-delete little-button">–</button>
            </div>
          </div>
          <div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">
            <select class="m-form__select right-b raw-material-name" name="raw-material-4" id="raw-material-4">
              <option value="">grapefruitlé</option>
            </select>
            <input class="-hidden m-form__input  raw-material-quantity" type="number" name="quantity-4" id="quantity-4"
              placeholder="mennyiség" value="1" />
            <select class="m-form__select left-b raw-material-unit" name="unit-4" id="unit-4">
              <option value="">cl</option>
            </select>
            <div class="right">
              <button class="-delete little-button">–</button>
            </div>
          </div>
          <div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">
            <select class="m-form__select right-b raw-material-name" name="raw-material-5" id="raw-material-5">
              <option value="">pépesített eper</option>
            </select>
            <input class="-hidden m-form__input  raw-material-quantity" type="number" name="quantity-5" id="quantity-5"
              placeholder="mennyiség" value="3" />
            <select class="m-form__select left-b raw-material-unit" name="unit-5" id="unit-5">
              <option value="">bk</option>
            </select>
            <div class="right">
              <button class="-delete little-button">–</button>
            </div>
          </div>
          <div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">
            <select class="m-form__select right-b raw-material-name" name="raw-material-6" id="raw-material-6">
              <option value="">alkoholmentes pezsgő</option>
            </select>
            <input class="-hidden m-form__input  raw-material-quantity" type="number" name="quantity-6" id="quantity-6"
              placeholder="mennyiség" />
            <select class="m-form__select left-b raw-material-unit" name="unit-6" id="unit-6">
              <option value="">ízlés szerint</option>
            </select>
            <div class="right">
              <button class="-delete little-button">–</button>
            </div>
          </div>
          <div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">
            <select class="m-form__select right-b raw-material-name" name="raw-material-7" id="raw-material-7">
              <option value="">eper</option>
            </select>
            <input class="-hidden m-form__input  raw-material-quantity" type="number" name="quantity-7" id="quantity-7"
              placeholder="mennyiség" value="0.5" />
            <select class="m-form__select left-b raw-material-unit" name="unit-7" id="unit-7">
              <option value="">db</option>
            </select>
            <div class="right">
              <button class="-delete little-button">–</button>
            </div>
          </div>
        </div>
        <div>
          <p class="right">
            további alapanyag hozzáadása <button id="adding-material" class="-adding little-button">+</button>
          </p>
        </div>
      </section>
      <section>
        <h2>Lépések</h2>
        <div id="steps">
        <div class="steps w-100">
          <textarea class="step-txt" name="step1" id="step1" cols="30"
          rows="1">Erőteljesen összerázzuk a sékerben az összes adalékot a jéggel és a pezsgő nélkül, a pezsgőskehelybe szűrjük és feltöltjük pezsgővel.</textarea>
          <div class="right">
            <button class="-delete little-button">–</button>
          </div>
        </div>
        <div class="steps w-100">
          <textarea class="step-txt" name="step1" id="step1" cols="30" rows="1">Az epret a pohár szélére szúrjuk.</textarea>
          <div class="right">
            <button class="-delete little-button">–</button>
          </div>
        </div>
        </div>
        <div>
          <p class="right">
            további lépés hozzáadása <button id="adding-step" class="-adding little-button">+</button>
          </p>
        </div>
      </section>
      <section>
        <h2>Üzenet</h2>
        <textarea class="w-100" name="message" id="message" cols="30" rows="5"
          placeholder="Itt üzenhetsz a szerkesztőségnek, ha valamilyen alapanyagot nem találnál vagy kérdésed lenne. Kitöltése nem kötelező."></textarea>
      </section>
    </article>

    <aside>
      <section>
        <h2>Jellemzők</h2>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="category" id="category" required>
            <option value="">italok</option>
          </select>
        </div>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="kitchen" id="kitchen" required>
            <option value="">Konyha</option>
          </select>
        </div>
        <div class="-colorBgTernary mb-3 w-100">
          <input class="w-100 -hidden m-form__input" type="number" placeholder="Adag" name="adag" min="1" max="100"> />
        </div>
      </section>
      <section>
        <h2>Értékek</h2>
        <div class="-colorBgTernary mb-3 w-100">
          <input class="-hidden m-form__input w-80" type="text" name="preparation" id="preparation"
            placeholder="Előkészületi idő" value="5" />
          <span>perc</span>
        </div>
        <div class="-colorBgTernary mb-3 w-100">
          <input class="-hidden m-form__input w-80" type="text" name="cooking" id="cooking" placeholder="Főzési idő" />
          <span>perc</span>
        </div>
        <div class="-colorBgTernary mb-3 w-100">
          <input class="-hidden m-form__input w-80" type="text" name="baking" id="baking" placeholder="Sütési idő" />
          <span>perc</span>
        </div>
      </section>
      <section>
        <h2>Mikor</h2>
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
        <h2>Szezon</h2>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="winter"><input class="d-none" type="checkbox"
            name="winter" id="winter" />tél</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="spring"><input class="d-none" type="checkbox"
            name="spring" id="spring" />tavasz</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="summer"><input class="d-none" type="checkbox"
            name="summer" id="summer" checked />nyár</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="autumn"><input class="d-none" type="checkbox"
            name="autumn" id="autumn" />ősz</label>
      </section>
      <section>
        <h2>Hasznos információk</h2>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="snack" id="snack">
            <option value="ital">ital</option>
          </select>
        </div>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="technology" id="technology">
            <option value="séker">séker</option>
          </select>
        </div>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="baby" id="baby">
            <option value="">Babakonyha</option>
            <option value="baba 18–24 hónap">baba 18–24 hónap</option>
            <option value="baba 12–18 hónap">baba 12–18 hónap</option>
            <option value="baba 8–12 hónap">baba 8–12 hónap</option>
            <option value="baba 6–7 hónap">baba 6–7 hónap</option>
            <option value="baba 5–6 hónap">baba 5–6 hónap</option>
            <option value="baba-mama">baba-mama</option>
          </select>
        </div>
      </section>
      <section>
        <h2>Egyéb elnevezések</h2>
        <div id="names">
          <div class="-colorBgTernary mb-3 w-100 names">
            <input class="-hidden m-form__input w-80" type="text" name="other-name-1" id="other-name-1"
              placeholder="Egyéb elnevezés" value="eper koktél" />
            <div class="right">
              <button class="-delete little-button">–</button>
            </div>  
          </div>
        </div>
          <div>
            <p class="right">
              elnevezés hozzáadása <button id="adding-name" class="-adding little-button">+</button>
            </p>
          </div>
      </section>
    </aside>
    <div class="align-center w-100" id="d-send">
      <button class="-rejection -sending">Elvetés</button>
      <button class="-draft -sending">Mentés vázlatként</button>
      <button class="-adding -sending">Publikálás</button>
    </div>
  </form>
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