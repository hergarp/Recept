<!DOCTYPE html>
<html lang="hu">

<head>
  @include('../template/head')
  <link rel="stylesheet" href="../../css/admin-edit-recipe-desktop.css">
  <link rel="stylesheet" href="../../css/admin-edit-recipe-smaller.css">
  <script src="../../js/ajax.js"></script>
  <script src="../../js/edit.js"></script>
  <script src="../../js/urlap_validacio.js"></script>
  <title>Admin – Receptfelvitel | Recapt</title>
</head>

<body>
  <main>
    <header>
      @include('../template/header')
    </header>
    <div class="container">
    @if (Auth::check() and Auth::user()->is_admin)
    <form id="form-public" action="/admin/edit/{{$recipe->r_id}}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <article>
      <input class="w-100 -hidden" type="text" name="title" id="title" placeholder="Név" value="{{ $recipe->megnevezes }}" />
      <input class="d-none" id="slug" name="url_slug" value="{{ $recipe->url_slug }}">
      <div id="title-error"></div>
      <div id="image" style="background-image: url('../../{{ $recipe->kep }}');">
      </div>
      <section>
        <h2>Hozzávalók</h2>
        <div id="ingredients">
          <div class="d-none alapanyag-felvitel-template m-form__selectWrapper -colorBgTernary mb-3">
            <input class="-hidden m-form__input raw-material-name" id="material" list="materials" name="alapanyagok" placeholder="Alapanyag">
            <datalist id="materials">
              @foreach ($materials as $material)
                <option value="{{ $material -> megnevezes }}">{{ $material -> megnevezes}}</option>
              @endforeach
            </datalist>
            <input class="-hidden m-form__input raw-material-quantity" type="text" name="quantities" id="quantity" placeholder="mennyiség"/>
            <select class="m-form__select left-b raw-material-unit" name="units" id="unit">
             <option selected disabled>mértékegység</option>
            </select>
            <div class="right">
              <button type="button" class="-delete little-button">–</button>
            </div>
            <div id="quantity-error" class="w-100 quantity-hiba bgWhite"></div>
          </div>
          @foreach ($alkotjas as $alkotja)
          <div class="m-form__selectWrapper -colorBgTernary mb-3 ingredients">
            <input class="-hidden m-form__input raw-material-name" id="matedit-{{$alkotja->alk_id}}" list="matedit-{{$alkotja->alk_id}}" name="material[]" placeholder="Alapanyag" value="{{$alkotja->alapanyag}}">
            <datalist id="matedit-{{$alkotja->alk_id}}">
              @foreach ($materials as $material)
                <option value="{{ $material -> megnevezes}}">{{ $material -> megnevezes}}</option>
              @endforeach
            </datalist>
            <input class="-hidden m-form__input raw-material-quantity" type="text" name="quantity[]" id="quantityedit-{{$alkotja->alk_id}}"
              placeholder="mennyiség" value="{{$alkotja->mennyiseg}}" />
            <select class="m-form__select left-b raw-material-unit" name="unit[]" id="unitedit-{{$alkotja->alk_id}}">
              <option value="{{$alkotja->mertekegyseg}}" selected>{{$alkotja->mertekegyseg}}</option>
            </select>
            <div class="right">
                <button class="-delete little-button">–</button>
              </div>
            <div id="quantityedit-error-{{$alkotja->alk_id}}" class="w-100 quantity-hiba bgWhite"></div>
          </div>
          @endforeach
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
          <div class="d-none step-template steps w-100">
            <textarea class="step-txt" name="steps" id="step" cols="30" rows="1"></textarea>
            <div class="right">
              <button type="button" class="-delete little-button">–</button>
            </div>
          </div>
          @foreach ($steps as $step)
            <div class="steps w-100">
              <textarea class="step-txt" name="step[]" id="stepedit-{{$step->l_id}}" cols="30"
              rows="1">{{$step->lepes}}</textarea>
              <div class="right">
                <button class="-delete little-button">–</button>
              </div>
            </div>
          @endforeach
        </div>
        <div>
          <p class="right">
            további lépés hozzáadása <button id="adding-step" class="-adding little-button">+</button>
          </p>
        </div>
      </section>
      <section>
        <h2>Üzenet</h2>
        <p><?php if (isset($message->uzenet) && !is_null($message->uzenet)) {echo $message->uzenet;} else {echo 'Nincs üzenet';}?></p>
      </section>
    </article>

    <aside>
      <section>
        <h2>Jellemzők</h2>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="category" id="category">
            <option value="">Kategoria</option>
            @foreach ($kategorias as $kategoria)
            <option value="{{ $kategoria -> kategoria}}" <?php echo $recipe->kategoria == $kategoria->kategoria
                ? 'selected'
                : ''; ?>>{{ $kategoria -> kategoria}}</option>
            @endforeach
          </select>
        </div>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="kitchen" id="kitchen">
            <option value="">Konyha</option>
            @foreach  ($konyhas as $konyha)  
            <option value="{{ $konyha -> konyha}}" <?php echo $recipe->konyha == $konyha->konyha
                ? 'selected'
                : ''; ?>>{{ $konyha -> konyha}}</option>
            @endforeach
          </select>
        </div>
        <div class="-colorBgTernary mb-3 w-100 portion">
          <label for="portion">Adag(<span class="red">*</span>):</label>
          <input id="portion" type="text" class="align-center -hidden m-form__input" name="adag" required value="{{ $recipe->adag }}"/>
        </div>
        <div id="portion-error" class="w-100"></div>
      </section>
      <section>
        <h2>Értékek</h2>
        <div id="time-error"></div>
        <div class="-colorBgTernary mb-3 w-100 values">
          <label for="preparation">Előkészületi idő:</label>
          <input class="align-center -hidden m-form__input" type="text" name="preparation" id="preparation" min="1" value="{{ $recipe->elokeszitesi_ido }}"/>
          <span>perc</span>
        </div>
        <div id="preparation-error" class="w-100"></div>
        <div class="-colorBgTernary mb-3 w-100 values">
          <label for="cooking">Főzési idő:</label>
          <input class="align-center -hidden m-form__input" type="text" name="cooking" id="cooking" min="1" value="{{ $recipe->fozesi_ido }}"/>
          <span>perc</span>
        </div>
        <div id="cooking-error" class="w-100"></div>
        <div class="-colorBgTernary mb-3 w-100 values">
          <label for="baking">Sütési idő:</label>
          <input class="align-center -hidden m-form__input" type="text" name="baking" id="baking" min="1" value="{{ $recipe->sutesi_ido }}"/>
          <span>perc</span>
        </div>
        <div id="baking-error" class="w-100"></div>
      </section>
      <section>
        <h2>Mikor</h2>
        <label class="m-button -fontSize-16 p-3 mr-2 mb-1 -colorBgTernary" for="breakfast"><input class="d-none"
            type="checkbox" name="breakfast" id="breakfast" <?php echo $recipe->reggeli == 1
                ? 'checked'
                : ''; ?>/>reggeli</label>
        <label class="m-button -fontSize-16 p-3 mr-2 mb-1 -colorBgTernary" for="elevenses"><input class="d-none"
            type="checkbox" name="elevenses" id="elevenses" <?php echo $recipe->tizorai == 1
                ? 'checked'
                : ''; ?>/>tízórai</label>
        <label class="m-button -fontSize-16 p-3 mr-2 mb-1 -colorBgTernary" for="lunch"><input class="d-none" type="checkbox"
            name="lunch" id="lunch" <?php echo $recipe->ebed == 1
                ? 'checked'
                : ''; ?>/>ebéd</label>
        <label class="m-button -fontSize-16 p-3 mr-2 mb-1 -colorBgTernary" for="snack"><input class="d-none" type="checkbox"
            name="snack" id="snack" <?php echo $recipe->uzsonna == 1
                ? 'checked'
                : ''; ?>/>uzsonna</label>
        <label class="m-button -fontSize-16 p-3 mr-2 mb-1 -colorBgTernary" for="dinner"><input class="d-none" type="checkbox"
            name="dinner" id="dinner" <?php echo $recipe->vacsora == 1
                ? 'checked'
                : ''; ?>/>vacsora</label>
      </section>
      <section>
        <h2>Szezon</h2>
        <label class="m-button -fontSize-16 p-3 mr-2 mb-1 -colorBgTernary" for="winter"><input class="d-none" type="checkbox"
            name="winter" id="winter" <?php echo $recipe->tel == 1
                ? 'checked'
                : ''; ?>/>tél</label>
        <label class="m-button -fontSize-16 p-3 mr-2 mb-1 -colorBgTernary" for="spring"><input class="d-none" type="checkbox"
            name="spring" id="spring" <?php echo $recipe->tavasz == 1
                ? 'checked'
                : ''; ?>/>tavasz</label>
        <label class="m-button -fontSize-16 p-3 mr-2 mb-1 -colorBgTernary" for="summer"><input class="d-none" type="checkbox"
            name="summer" id="summer" checked <?php echo $recipe->nyar == 1
                ? 'checked'
                : ''; ?>/>nyár</label>
        <label class="m-button -fontSize-16 p-3 mr-2 mb-1 -colorBgTernary" for="autumn"><input class="d-none" type="checkbox"
            name="autumn" id="autumn" <?php echo $recipe->osz == 1
                ? 'checked'
                : ''; ?>/>ősz</label>
      </section>
      <section>
        <h2>Hasznos információk</h2>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="snacky" id="snacky">
            <option value="" <?php echo $recipe->fogas == null? 'selected' : ''; ?>>Fogás</option>
            <option value="hideg előétel" <?php echo $recipe->fogas == 'hideg előétel'? 'selected' : ''; ?>>hideg előétel</option>
            <option value="meleg előétel" <?php echo $recipe->fogas == 'meleg előétel'? 'selected' : ''; ?>>meleg előétel</option>
            <option value="amuse-bouche" <?php echo $recipe->fogas == 'amuse-bouche'? 'selected' : ''; ?>>amuse-bouche</option>
            <option value="egyéb fogás" <?php echo $recipe->fogas == 'egyéb fogás'? 'selected' : ''; ?>>egyéb fogás</option>
            <option value="desszert" <?php echo $recipe->fogas == 'desszert'? 'selected' : ''; ?>>desszert</option>
            <option value="köret" <?php echo $recipe->fogas == 'köret'? 'selected' : ''; ?>>köret</option>
            <option value="főétel" <?php echo $recipe->fogas == 'főétel'? 'selected' : ''; ?>>főétel</option>
            <option value="leves" <?php echo $recipe->fogas == 'leves'? 'selected' : ''; ?>>leves</option>
            <option value="ital" <?php echo $recipe->fogas == 'ital'? 'selected' : ''; ?>>ital</option>
          </select>
        </div>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="technology" id="technology">
            <option value="" <?php echo $recipe->konyhatechnologia == null? 'selected' : ''; ?>>Konyhatechnológia</option>
            <option value="bográcsos" <?php echo $recipe->konyhatechnologia == 'bográcsos'? 'selected' : ''; ?>>bográcsos</option>
            <option value="grill" <?php echo $recipe->konyhatechnologia == 'grill'? 'selected' : ''; ?>>grill</option>
            <option value="hidegkonyha" <?php echo $recipe->konyhatechnologia == 'hidegkonyha'? 'selected' : ''; ?>>hidegkonyha</option>
            <option value="kenyérsütő" <?php echo $recipe->konyhatechnologia == 'kenyérsütő'? 'selected' : ''; ?>>kenyérsütő</option>
            <option value="kukta" <?php echo $recipe->konyhatechnologia == 'kukta'? 'selected' : ''; ?>>kukta</option>
            <option value="rántott ételek" <?php echo $recipe->konyhatechnologia == 'rántott ételek'? 'selected' : ''; ?>>rántott ételek</option>
            <option value="római tál" <?php echo $recipe->konyhatechnologia == 'római tál'? 'selected' : ''; ?>>római tál</option>
            <option value="séker" <?php echo $recipe->konyhatechnologia == 'séker'? 'selected' : ''; ?>>séker</option>
            <option value="sörös" <?php echo $recipe->konyhatechnologia == 'sörös'? 'selected' : ''; ?>>sörös</option>
            <option value="süti sütés nélkül" <?php echo $recipe->konyhatechnologia == 'süti sütés nélkül'? 'selected' : ''; ?>>süti sütés nélkül</option>
            <option value="vadkovászos" <?php echo $recipe->konyhatechnologia == 'vadkovászos'? 'selected' : ''; ?>>vadkovászos</option>
            <option value="wok" <?php echo $recipe->konyhatechnologia == 'wok'? 'selected' : ''; ?>>wok</option>
          </select>
        </div>
        <div class="m-form__selectWrapper -colorBgTernary w-100 mb-3">
          <select class="w-100 m-form__select" name="baby" id="baby">
            <option value="" <?php echo $recipe->babakonyha == null? 'selected' : ''; ?>>Babakonyha</option>
            <option value="baba 18–24 hónap" <?php echo $recipe->babakonyha == 'baba 18–24 hónap'? 'selected' : ''; ?>>baba 18–24 hónap</option>
            <option value="baba 12–18 hónap" <?php echo $recipe->babakonyha == 'baba 12–18 hónap'? 'selected' : ''; ?>>baba 12–18 hónap</option>
            <option value="baba 8–12 hónap" <?php echo $recipe->babakonyha == 'baba 8–12 hónap'? 'selected' : ''; ?>>baba 8–12 hónap</option>
            <option value="baba 6–7 hónap" <?php echo $recipe->babakonyha == 'baba 6–7 hónap'? 'selected' : ''; ?>>baba 6–7 hónap</option>
            <option value="baba 5–6 hónap" <?php echo $recipe->babakonyha == 'baba 5–6 hónap'? 'selected' : ''; ?>>baba 5–6 hónap</option>
            <option value="baba-mama" <?php echo $recipe->babakonyha == 'baba-mama'? 'selected' : ''; ?>>baba-mama</option>
          </select>
        </div>
      </section>
      <section>
        <h2>Egyéb elnevezések</h2>
        <div id="names">
          <div class="d-none name-template -colorBgTernary mb-3 w-100 names">
            <input class="-hidden m-form__input w-80" name="name" id="name" placeholder="További elnevezés(*)" />
            <div class="right"><button type="button" class="-delete little-button">–</button></div>
          </div>
          @foreach ($elnevezesek as $elnevezes)
          <div class="-colorBgTernary mb-3 w-100 names">
            <input class="-hidden m-form__input w-80" name="name[]"
              placeholder="Egyéb elnevezés" value="{{ $elnevezes }}" />
            <div class="right">
              <button class="-delete little-button">–</button>
            </div>  
          </div>
          @endforeach
        </div>
          <div>
            <p class="right">
              elnevezés hozzáadása <button type="button" id="adding-name" class="-adding little-button">+</button>
            </p>
          </div>
      </section>
    </aside>
    <div class="align-center w-100" id="d-send">  
      <button class="-draft -sending w-100" type="submit" name="action" value="draft">Mentés vázlatként</button>     
      <button id="sending" class="-adding -sending w-100" type="submit" name="action" value="public">Publikálás</button>     
      <button onclick="return confirm('Biztosan törli?')" class="-rejection -sending w-100" type="submit" name="action" value="delete">Elvetés</button>     
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