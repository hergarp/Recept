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
                <form action="/results">
                    <input class="-hidden m-form__input" name="keyword" type="text" placeholder="keress # kipróbált recept között">
                    <select name="search_selector" id="search-selector" class="m-form__select">
                        <option value="name">Név szerint</option>
                        <option value="raw-material">Alapanyag szerint</option>
                    </select>
                    <button type="submit" class="m-button -adding">Keresés</button>
                </form>
            </div>
            <div id="recipes">
                @foreach($recipes as $recipe)
                <a href="./recipe/{{$recipe->url_slug}}?adag={{$recipe->adag}}">
                    <div class="recipe -colorBgTernary">
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