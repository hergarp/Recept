<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <script src="../js/ajax.js"></script>
    <script src="../js/draft-recipe-list-table.js"></script>
    <script src="../js/draft-recipe-list.js"></script>
    <link rel="stylesheet" href="../css/admin-recipe-list-desktop.css">
    <title>Draft receptek | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
            <h2>Draft receptek</h2>
        </header>
        <div class="container">
            <div class="mb-2">
                <input type="text" placeholder="Szűrés név szerint">
                <label class="-fontSize-16 p-3 mr-2 mb-1" for="arrived">
                    <input class="d-none" type="checkbox" name="arrived" id="arrived" value="1"/>
                    beküldött
                </label>
                <label class="-fontSize-16 p-3 mr-2 mb-1" for="draft">
                    <input class="d-none" type="checkbox" name="draft" id="draft" value="1"/>
                    vázlat
                </label>
            </div>
            @if (Auth::check() and Auth::user()->is_admin)
            <article>
                <table>
                    <thead>
                        <th>Kép</th>
                        <th>Cím</th>
                        <th>Publikálás időpontja</th>
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