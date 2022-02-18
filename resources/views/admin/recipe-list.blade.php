<!DOCTYPE html>
<html lang="hu">
<head>
    @include('../template/head')
    <title>Publikált receptek | Recapt</title>
</head>
<body>
    <main>
        <header>
            @include('../template/header')
            <h2>Publikált receptek</h2>
        </header>
        <article>
            <input type="text" placeholder="Szűrés név alapján">
            <table>
                <thead>
                    <th>Kép</th>
                    <th>Cím</th>
                    <th>Publikálás időpontja</th>
                </thead>
            </table>
        </article>
        <footer>
            @include('../template/footer')
        </footer>
    </main>
</body>
</html>