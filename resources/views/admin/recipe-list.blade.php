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
        <div class="container">
            @if (Auth::check() and Auth::user()->is_admin)
            <article>
                <input type="text" placeholder="Szűrés név alapján">
                <table>
                    <thead>
                        <th>Kép</th>
                        <th>Cím</th>
                        <th>Publikálás időpontja</th>
                        <th>Státusz</th>
                    </thead>
                    <tbody>
                        @foreach ($recipes as $recipe)
                            <tr>
                                <td><img src="../../{{ $recipe->kep}}" alt=""></td>
                                <td><a href="/admin/edit/{{$recipe->r_id}}">{{ $recipe->megnevezes}}</a></td>
                                <td>{{ $recipe->updated_at}}</td>
                                <td>{{ $recipe->statusz}}</td>
                            </tr>
                        @endforeach
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