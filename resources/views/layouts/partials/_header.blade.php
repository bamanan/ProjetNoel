<header id="header" class="header" style="height: 100%">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul id="indicator" class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">

                <img src="{{asset('images/christmas 4.jpg')}}" alt="Los Angeles" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/christmas 5.jpg')}}" alt="Chicago" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/christmas 3.jpg')}}" alt="New York" width="1100" height="500">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div id="caption" class="carousel-caption description text-center">
        <h1> Joyeux Noêl ! </h1>
        <p> Quelle est ta lettre au père Noel cette année ?
        </p>
        <button class="btn btn-outline-secondary btn-lg" data-toggle="modal" data-target="#letterModal">Ecris une lettre</button>
    </div>
</header>
