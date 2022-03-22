<!DOCTYPE html>
<html lang="hu">
<head>
    @include('template/head')
    <link rel="stylesheet" href="css/index.css">
    <title>Főoldal | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('template/header')
        </header>
        <div class="container">
        <article>
            <div id="search" class="-colorBgTernary mb-3 w-100">
                <input class="-hidden m-form__input" type="text" placeholder="keress # kipróbált recept között">
                <select name="search-selector" id="search-selector" class="m-form__select">
                    <option value="name">Név szerint</option>
                    <option value="raw-material">Alapanyag szerint</option>
                </select>
                <button type="submit" class="m-button -adding -sending">Keresés</button>
            </div>
            <div id="recipes">
                @foreach($recipe as $recipe)
                <a href="./recipe/{{$recipe->url_slug}}">
                    <div class="recipe -colorBgTernary">
                        <img src="./{{$recipe->kep}}" alt="">
                        <h3>{{$recipe->megnevezes}}</h3>
                    </div>
                </a>
                @endforeach
            </div>
        </article>
        </div>
        <footer>
            @include('template/footer')
        </footer>
    </main>
</body>
</html>