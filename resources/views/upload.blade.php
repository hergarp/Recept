<!DOCTYPE html>
<html lang="hu">

<head>
  @include('../template/head')
  <link rel="stylesheet" href="css/upload-desktop.css" />
  <script src="js/urlap_validacio.js" type="text/javascript"></script>
  <script src="js/upload.js"></script>
  <title>Receptfeltöltés | Recapt</title>
</head>

<body>
  <main>
    <header>
      @include('../template/header')
    </header>
    @if(Auth::check())
    <form action="/upload" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <article>
      <p>A csillaggal (<span class="red">*</span>) jelölt mezők kitöltése kötelező.</p>
      <input class="w-100" type="text" name="title" id="title" placeholder="Név*" required/>
      <input class="d-none" id="slug" type="text" name="url_slug">
      <div id="image">
        <div>
          <h2>kép feltöltése<span class="red">*</span></h2>
          <input type="file" name="file" id="file" required/>
          <p class="red">Csak saját készítésű képeket lehet feltölteni. Nem fogadunk el más
            honlapokról levett, vagy könyvekben, újságokban megjelent fotókat,
            amelyek szerzői joga más tulajdonában van.</p>
        </div>
      </div>
      <section>
        <h2>Hozzávalók<span class="red">*</span></h2>
        <div id="ingredients">
          <div class="d-none alapanyag-felvitel-template m-form__selectWrapper -colorBgTernary mb-3 ingredients">
            <input class="-hidden m-form__input raw-material-name" id="material" list="materials" name="alapanyagok" placeholder="Alapanyag">
            <datalist id="materials">
              @foreach ($materials as $material)
                <option value="{{ $material -> megnevezes}}">{{ $material -> megnevezes}}</option>
              @endforeach
            </datalist>
            <input class="-hidden m-form__input raw-material-quantity" min="0" name="quantities" id="quantity" placeholder="mennyiség"/>
            <select class="m-form__select left-b raw-material-unit" name="units" id="unit">
             <option selected disabled>mértékegység</option>
            </select>
            <div class="right">
              <button type="button" class="-delete little-button">–</button>
            </div>
            <div id="quantity-hiba" class="quantity-hiba w-100"></div>
          </div>
        </div>
        <div>
          <p class="right">
            további alapanyag hozzáadása 
            <button type="button" id="adding-material" class="-adding little-button">+</button>
          </p>
        </div>
      </section>
      <section>
        <h2>Lépések<span class="red">*</span></h2>
        <div id="steps">
          <div class="d-none step-template steps w-100">
            <textarea class="step-txt" name="steps" id="step" cols="30" rows="1"></textarea>
            <div class="right">
              <button type="button" class="-delete little-button">–</button>
            </div>
          </div>
        </div>
        <div>
          <p class="right">
            további lépés hozzáadása <button type="button" id="adding-step" class="-adding little-button">+</button>
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
          <select class="w-100 m-form__select" name="category" id="category">
            <option value="">Kategória</option>
            @foreach ($kategorias as $kategoria)
            <option value="{{ $kategoria -> kategoria}}">{{ $kategoria -> kategoria}}</option>
            @endforeach
          </select>
        </div>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="kitchen" id="kitchen">
            <option value="">Konyha</option>
            @foreach  ($konyhas as $konyha)  
            <option value="{{ $konyha -> konyha}}">{{ $konyha -> konyha}}</option>
            @endforeach
          </select>
        </div>

        <div class="-colorBgTernary mb-3 w-100 portion">
          <label for="adag">Adag:</label>
          <input id="adag" class="align-center -hidden m-form__input" name="adag" min="1" max="100" required/>
        </div>
        <div id="adag-hiba" class="w-100"></div>
      </section>
      <section>
        <h2>Értékek</h2>
        <div class="-colorBgTernary mb-3 w-100 values">
          <label for="preparation">Előkészületi idő: </label>
          <input class="align-center -hidden m-form__input" name="preparation" id="preparation" min="1"/>
          <span>perc</span>
        </div>
        <div id="preparation-hiba" class="w-100"></div>
        <div class="-colorBgTernary mb-3 w-100 values">
          <label for="cooking">Főzési idő: </label>
          <input class="align-center -hidden m-form__input" name="cooking" id="cooking" min="1"/>
          <span>perc</span>
        </div>
        <div id="cooking-hiba" class="w-100"></div>
        <div class="-colorBgTernary mb-3 w-100 values">
          <label for="baking">Sütési idő: </label>
          <input class="align-center -hidden m-form__input" name="baking" id="baking" min="1"/>
          <span>perc</span>
        </div>
        <div id="baking-hiba" class="w-100"></div>
      </section>
      <section>
        <h2>Mikor</h2>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="breakfast"><input class="d-none"
            type="checkbox" name="breakfast" id="breakfast" value="1"/>reggeli</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="elevenses"><input class="d-none"
            type="checkbox" name="elevenses" id="elevenses" value="1"/>tízórai</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="lunch"><input class="d-none" type="checkbox"
            name="lunch" id="lunch" value="1"/>ebéd</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="snack"><input class="d-none" type="checkbox"
            name="snack" id="snack" value="1"/>uzsonna</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="dinner"><input class="d-none" type="checkbox"
            name="dinner" id="dinner" value="1"/>vacsora</label>
      </section>
      <section>
        <h2>Szezon</h2>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="winter"><input class="d-none" type="checkbox"
            name="winter" id="winter" value="1"/>tél</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="spring"><input class="d-none" type="checkbox"
            name="spring" id="spring" value="1"/>tavasz</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="summer"><input class="d-none" type="checkbox"
            name="summer" id="summer" value="1"/>nyár</label>
        <label class="m-button -fontSize-16 p-3 mr-2 -colorBgTernary mb-1" for="autumn"><input class="d-none" type="checkbox"
            name="autumn" id="autumn" value="1"/>ősz</label>
      </section>
      <section>
        <h2>Hasznos információk</h2>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="snacky" id="snacky">
            <option selected value="">Fogás</option>
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
          <div class="d-none name-template -colorBgTernary mb-3 w-100 names">
            <input class="-hidden m-form__input w-80" type="text" id="name" placeholder="További elnevezés"/>
            <div class="right"><button type="button" class="-delete little-button">–</button></div>
          </div>
        </div>
        <p class="right">
          elnevezés hozzáadása <button type="button" id="adding-name" class="-adding little-button">+</button>
        </p>
      </section>
    </aside>
    <div class="align-center w-100" id="d-send">
      <button type="submit" class="-adding -sending">Beküldés</button>
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