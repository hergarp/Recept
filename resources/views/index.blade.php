<!DOCTYPE html>
<html lang="hu">
<head>
    @include('template/head')
    <link rel="stylesheet" href="css/index-desktop.css">
    <link rel="stylesheet" href="css/index-smaller.css">
    <title>Főoldal | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('template/header')
        </header>
        <div class="container">
        <article>
            <div class="mb-3 w-100">
                <form id="search" action="/results">
                    <input id="search_input" class="-colorBgTernary -hidden m-form__input" name="keyword" type="text" placeholder="keress {{$ennyiRecept}} kipróbált recept között">
                    <select name="search_selector" id="search_selector" class="-colorBgTernary m-form__select">
                        <option value="name">Név szerint</option>
                        <option value="raw-material">Alapanyag szerint</option>
                    </select>
                    <button type="submit" class="-salmon m-button">Keresés</button>
                </form>
            </div>
            <div id="recipes">
                @foreach($recipes as $recipe)
                <a href="./recipe/{{$recipe->url_slug}}?adag={{$recipe->adag}}">
                    <div class="recipe">
                    <div class="image" style="background-image: url(./{{$recipe->kep}});"></div>
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