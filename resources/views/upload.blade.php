<!DOCTYPE html>
<html lang="hu">

<head>
  @include('../template/head')
  <link rel="stylesheet" href="css/upload-desktop.css" />
  <script src="js/upload.js"></script>
  <title>Receptfeltöltés | Recapt</title>
</head>

<body>
  <main>
    <header>
      @include('../template/header')
    </header>
    @if(Auth::check())
    <form action="/admin/upload" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <article>
      <input class="w-100" type="text" name="title" id="title" placeholder="Név" />
      <div id="image">
        <div>
          <input type="file" name="file" id="file" />
          <p>kép feltöltése <br> <span style="color: red">Csak saját készítésű képeket lehet feltölteni. Nem fogadunk el más
            honlapokról levett, vagy könyvekben, újságokban megjelent fotókat,
            amelyek szerzői joga más tulajdonában van.</span></p>
        </div>
      </div>
      <section>
        <h2>Hozzávalók</h2>
        <div id="ingredients">
        </div>
        <div>
          <p class="right">
            további alapanyag hozzáadása 
            <button id="adding-material" class="-adding little-button">+</button>
          </p>
        </div>
      </section>
      <section>
        <h2>Lépések</h2>
        <div id="steps">
          <div class="steps w-100">
            <textarea class="step-txt" name="step1" id="step1" cols="30" rows="1"></textarea>
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
            <option value="">Kategória</option>
            @foreach ($kategorias as $kategoria)
            <option value="{{ $kategoria -> kategoria}}">{{ $kategoria -> kategoria}}</option>
            @endforeach
          </select>
        </div>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="kitchen" id="kitchen" required>
            <option value="">Konyha</option>
            @foreach  ($konyhas as $konyha)  
            <option value="{{ $konyha -> konyha}}">{{ $konyha -> konyha}}</option>
            @endforeach
          </select>
        </div>
        <div class="-colorBgTernary mb-3 w-100 m-form__select">
        <span>Adag:</span><input class="-hidden m-form__input w-80" type="number"  name="adag" min="1" max="100" />
          
        </div>
      </section>
      <section>
        <h2>Értékek</h2>
        <div class="-colorBgTernary mb-3 w-100">
          <input class="-hidden m-form__input w-80" type="text" name="preparation" id="preparation"
            placeholder="Előkészületi idő" />
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
            name="summer" id="summer" />nyár</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary" for="autumn"><input class="d-none" type="checkbox"
            name="autumn" id="autumn" />ősz</label>
      </section>
      <section>
        <h2>Hasznos információk</h2>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="snack" id="snack">
            <option value="">Fogás</option>
            <option value="hideg előétel">hideg előétel</option>
            <option value="meleg előétel">meleg előétel</option>
            <option value="amuse-bouche">amuse-bouche</option>
            <option value="egyéb fogás">egyéb fogás</option>
            <option value="desszert">desszert</option>
            <option value="köret">köret</option>
            <option value="főétel">főétel</option>
            <option value="leves">leves</option>
            <option value="ital">ital</option>
          </select>
        </div>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="technology" id="technology">
            <option value="">Konyhatechnológia</option>
            <option value="bográcsos">bográcsos</option>
            <option value="grill">grill</option>
            <option value="hidegkonyha">hidegkonyha</option>
            <option value="kenyérsütő">kenyérsütő</option>
            <option value="kukta">kukta</option>
            <option value="rántott ételek">rántott ételek</option>
            <option value="római tál">római tál</option>
            <option value="séker">séker</option>
            <option value="sörös">sörös</option>
            <option value="süti sütés nélkül">süti sütés nélkül</option>
            <option value="vadkovászos">vadkovászos</option>
            <option value="wok">wok</option>
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
            <input class="-hidden m-form__input w-80" type="text" name="name-' +nameNum+ '" id="name-'+nameNum+'" placeholder="További elnevezés" />
            <div class="right"><button class="-delete little-button">–</button></div>
          </div>
        </div>
        <p class="right">
          elnevezés hozzáadása <button id="adding-name" class="-adding little-button">+</button>
        </p>
      </section>
    </aside>
    <div class="align-center w-100" id="d-send">
      <button type="submit" class="m-button -adding -sending">Beküldés</button>
    </div>
  </form>
  @else
  <div class="align-center">
    <p>Receptfeltöltéshez először be kell jelentkeznie.</p>
    <a href="/login">Bejelentkezés</a>
  </div>
  @endif
    <footer>
      @include('../template/footer')
    </footer>
  </main>
</body>

</html>