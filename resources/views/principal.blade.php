@extends ('welcome')

@section ('encabezado')
	<br>
	<h2>Bienvenido a Pókemon Go</h2>
    <link rel="stylesheet" href="{{ asset("css/principal.css") }}">
@stop

@section ('contenido')
        <div id="StefTastan">
            <!-- pokeball container -->
            <div id="moving-container">
                <div id="pokeball-container">
                <!-- pokeball -->
                    <div id="pokeball">
                        <div class="pokeball-details"></div>
                    </div>
                </div>              
            </div>

            <!-- charmander -->
            <div id="charmander">
                <div id="arms"></div>
                <div id="feet"></div>
                <div id="body">
                    <div id="eyes"></div>
                    <div id="pupils"></div>
                    <div id="nostrils"></div>
                    <div id="mouth"></div>
                    <div id="belly"></div>
                </div>
                <div id="tail"></div>
                <div id="flame"></div>
            </div>

            <!-- bulbasaur -->
            <div id="bulbasaur">
                <div id="head">
                    <div id="eyes"></div>
                    <div id="pupils"></div>
                    <div id="nostrils"></div>
                    <div class="mouth"></div>
                </div>
                <div class="ears"></div>
                <div id="body">
                    <div class="spots spot1"></div>
                    <div class="spots spot2"></div>
                    <div class="spots spot3"></div>
                </div>
                <div id="front-feet"></div>
                <div id="back-feet"></div>
                <div id="bulb"></div>
            </div>
    
            <!-- squirtle -->
            <div id="squirtle">
                <div id="arms"></div>
                <div id="feet"></div>
                <div id="head">
                    <div id="eyes"></div>
                    <div id="pupils"></div>
                    <div id="nostrils"></div>
                    <div id="mouth"></div>
                </div>
                <div id="body"></div>
                <div id="shell"></div>
                <div id="tail"></div>
            </div>
        </div>

<section class="our-team" id="team">
    <h3 class="text-center slideanim">Nuestro Equipo</h3>
    <div class="container-fluid" align="center">
        <div class="main">
            <div class="view view-first slideanim">
                <img src="img/team1.jpg" />
                <div class="mask">
                    <h4>Starky Miranda</h4>
                        <ul class="social-icons1">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    <a href="" class="info">Web developer</a>
                </div>
            </div>  
            <div class="view view-first slideanim">
                <img src="img/team2.jpg" />
                <div class="mask">
                    <h4>Priscila Plaza</h4>
                        <ul class="social-icons1">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    <a href="" class="info">Web developer</a>
                </div>
            </div>  
            <div class="view view-first slideanim">
                <img src="img/team3.jpg" />
                <div class="mask">
                    <h4>Gerardo Ortiz</h4>
                        <ul class="social-icons1">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    <a href="" class="info">Web developer</a>
                </div>
            </div>  
            <div class="view view-first slideanim">
                <img src="img/team4.jpg" />
                <div class="mask">
                    <h4>Oscar Sandoval</h4>
                        <ul class="social-icons1">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    <a href="" class="info">Web developer</a>
                </div>
            </div>  
        </div>
    </div>
</section>
@stop