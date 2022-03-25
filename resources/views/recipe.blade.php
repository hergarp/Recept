<!DOCTYPE html>
<html lang="hu">
<head>
    @include('template/head')
    <link rel="stylesheet" href="../css/recipe-desktop.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/91f36679fc.js" crossorigin="anonymous"></script>
    <script src="../js/recipe.js"></script>
    <title>Recept | Recapt</title>
</head>
<body>
    <main>
        <header>
        @include('template/header')
</header>
        <div id="recipe-container">
            <h2 class="align-center" >{{$recipe->megnevezes}}</h2>
            <section id="free-from-div">
                <figure class="align-center">
                    <img class="w-20" src="../img/sugar-cube-free.png" alt="">
                    <figcaption>cukormentes</figcaption>
                </figure>
                <figure class="align-center">
                    <img class="w-20" src="../img/laktose-free.png" alt="">
                    <figcaption>laktózmentes</figcaption>
                </figure>
                <figure class="align-center">
                    <img class="w-20" src="../img/gluten-free.png" alt="">
                    <figcaption>gluténmentes</figcaption>
                </figure>
                <figure class="align-center">
                    <img class="w-20" src="../img/milk-free.png" alt="">
                    <figcaption>tejmentes</figcaption>
                </figure>
                <figure class="align-center">
                    <img class="w-20" src="../img/egg-free.png" alt="">
                    <figcaption>tojásmentes</figcaption>
                </figure>
            </section>
            <section class="align-center">
                <div id="main-pic" style="background-image: url('../{{$recipe->kep}}');"></div>
            </section>
            <section id="icons">
                <div>
                    <div>
                        <i class="fas fa-print"></i>
                    </div>
                    <div>
                        <i class="far fa-bookmark"></i>
                    </div>
                </div>
                <div class="right">
                    <div>
                        <a id="facebookArticle-btn" href=""><i class="fab fa-facebook-f"></i></a>
                    </div>
                    <div>
                        <a href=""><i class="fab fa-facebook-messenger"></i></a>
                    </div>
                </div>
            </section>
            <section id="times" class="align-center">
                <div>
                    <p>Előkészítés</p>
                    <p><span class="times" id="preparation-time">{{$recipe->elokeszitesi_ido}}</span> perc</p>
                </div>
                <div>
                    <p>Főzés</p>
                    <p><span class="times" id="cooking-time">{{$recipe->fozesi_ido}}</span> perc</p>
                </div>
                <div>
                    <p>Sütés</p>
                    <p><span class="times" id="baking-time">{{$recipe->sutesi_ido}}</span> perc</p>
                </div>
                <div>
                    <p>Összesen</p>
                    <p><span id="sum-time"></span> perc</p>
                </div>
            </section>
            <section>
                <h3 class="order-md-1 w-80">Hozzávalók</h3>
                <div id="hozzavalok-adag">
                    <ul>
                        @foreach($alkotjas as $alkotja)
                        <li><spam class="quantity" value="{{$alkotja->mennyiseg}}"></spam> 
                        <spam class="unit">{{$alkotja->mertekegyseg}}</spam> {{$alkotja->alapanyag}}</li>
                       @endforeach
                    </ul>
                    <div class="right">
                        <div class="order-md-2">
                            <form method="GET">
                                <a href=""><i class="fas fa-minus"></i></a>
                                <input id="adag" class="m-form__input w-10 -fontSize-16" type="text" name="adag" value="4">
                                <label for="adag">adag</label>
                                <a href=""><i class="fas fa-plus"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <h3>Elkészítés</h3>
                <ol>
                    @foreach($steps as $step)
                    <li class="m-list__item -fontSize-16 -number -selectable">{{$step->lepes}}</li>
                    @endforeach
                </ol>
                
            </section>
            <section>
                <p>Receptkönyvben: <span id="recipebook">{{$recipe->receptkonyvben}}</span></p>
                <p>Össznézettség: <span id="total-views">{{$recipe->ossznezettseg}}</span></p>
                <p>Feltöltés dátuma: <span id="date-of-upload">{{$recipe->created_at}}</span></p>
            </section>
        </div>
        <footer>
            @include('template/footer')
        </footer>
    </main>
</body>
</html>