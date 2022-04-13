<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <link rel="stylesheet" href="../css/admin-recipe-list-desktop.css">
    <link rel="stylesheet" href="../css/admin-recipe-list-smaller.css">
    <script src="../js/ajax.js"></script>
    <script src="../js/recipe-list-table.js"></script>
    <script src="../js/recipe-list.js"></script>
    <title>Publikált receptek | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
            <h2>Publikált receptek</h2>
        </header>
        <div class="container">
            @if (Auth::check() and Auth::user()->is_admin)
            <article>
                <input class="-hidden m-form__input -colorBgTernary mb-3" id="szuresNevre" type="text" placeholder="Szűrés név alapján">
                <table>
                    <thead>
                        <th>Kép</th>
                        <th>Cím</th>
                        <th>Beküldés időpontja</th>
                        <th>Státusz</th>
                    </thead>
                    <tbody id="body">
                    </tbody>
                </table>
            </article>
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