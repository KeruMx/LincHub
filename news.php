<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LincHub</title>
    <meta name="author" content="Emmanuek Anaya Luna"/>
    <meta name="description" content="Página de descargas"/>
    <meta name="keywords" content="descarga busca 50gb almacenamiento gratuito"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>
<body>
<div class="container-fluid">
    <!-- Image and text -->
    <header>

    </header>
    <nav class="navbar navbar-expand-lg navbar-dark"  style="background-color: #005073;">
        <a class="navbar-brand" href="#">
            <img id="logo" src="images/500px.png" width="60" height="67" class="d-inline-block align-top" alt="LincHub">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="privacy.html">Politica de privacidad</a>
                </li>
                <li class="nav-item">
                    <a href="m_arch.html"  class="btn btn-sm btn-outline-success my-2 my-sm-0" style="color: honeydew">&nbsp; Mis archivos &nbsp;</a>
                </li>
            </ul>
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="modal" data-target="#login" style="color: honeydew">Iniciar sesión</button>
            &nbsp;
            <a href="reg.html"  class="btn btn-sm btn-outline-warning my-2 my-sm-0" style="color: honeydew">Registrate</a>
            &nbsp;
            &nbsp;

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
    <!-- Modal para login -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tlogin">Iniciar sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="email1">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Correo@Correo.mx">
                            <small id="emailHelp" class="form-text text-muted">No compartas tu correo ni tu contraseña con NADIE.</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Entrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->
    <section>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">LincHub  te regala 50GB<span class="text-muted"> Solo registrate y disfrutálos</span></h2>
                <p class="lead">Nuestro plan FREE, te da 50GB de almacenamiento, ¡Registrate con nostros!</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 300px; height: 300px;" src="images/50GB.jpg" data-holder-rendered="true">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Sale la versión 1.1021<span class="text-muted"> Lee las notas de la versión para que veas que tenemos para ti</span></h2>
                <p class="lead">Buscar archivos ahora funciona de manera eficiente.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 300px; height: 300px;" src="images/1.0.jpg" data-holder-rendered="true">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">1 mes gratis platino por probar el beta<span class="text-muted"> Gracias por colaborar con nosotros</span></h2>
                <p class="lead">Estamos agradecidos por corregir los primeros errores del beta, al participar ya obtendrás tu cuenta platinum por un mes totalmente gratis</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 300px; height: 300px;" src="images/platinum.jpg" data-holder-rendered="true">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Sale la beta abierta, 0.14b<span class="text-muted"> Ayudanos a probar este maravilloso servidor de descargas</span></h2>
                <p class="lead">Ayudanos a corregir errores, al registrarte ya estás en la beta, solo manda tus errores en el <a href="help.html">Centro de ayuda</a></p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" style="width: 300px; height: 300px;" src="images/beta.jpg" data-holder-rendered="true">
            </div>
        </div>

        <hr class="featurette-divider">

    </section>
    <footer>
        <div class="row">
            <div class="col-sm">
                <h1>Acerca de nosotros</h1>
                <ul>
                    <li><a href="news.php">Últimas noticias</a></li>
                    <li><a href="help.html">Centro de ayuda</a></li>
                    <li><a href="whoweare.html">¿Quienes somos?</a></li>
                    <li><a href="looking.html">Te estamos buscando</a></li>
                    <li><a href="prices.html">Planes y precios</a></li>
                </ul>
            </div>
            <div class="col-sm">
                <h1>Contacto</h1>
                <ul>
                    <li><a href="contact.html">¿Donde están los servidores?</a></li>
                </ul>
            </div>
            <div class="col-sm">
                <h1>Redes Sociales</h1>
                <div class="twitter"></div>
                <div class="facebook"></div>
                <div class="youtube"></div>
            </div>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>