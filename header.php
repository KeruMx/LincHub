<?php


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LincHub</title>
    <meta name="author" content="Emmanuel Anaya Luna"/>
    <meta name="description" content="Página de descargas"/>
    <meta name="keywords" content="descarga busca 50gb almacenamiento gratuito"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
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
                    <a href="m_arch.php" class="btn btn-sm btn-outline-success my-2 my-sm-0" style="color: honeydew">&nbsp; Mis archivos &nbsp;</a>
                </li>
            </ul>
            <?php
                if ($_SESSION==array()){
                    echo "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"button\" data-toggle=\"modal\" data-target=\"#login\" style=\"color: honeydew\">Iniciar sesión</button>";
                    echo "&nbsp";
                    echo " <a href=\"reg.html\"  class=\"btn btn-sm btn-outline-warning my-2 my-sm-0\" style=\"color: honeydew\">Registrate</a>";
                }
                    else{
                    echo "<form action='index.php' method='post'> ";
                    echo "<button class=\"btn btn-outline-danger my-2 my-sm-0\"  style=\"color: honeydew\" name='logout'>Cerrar Sesión</button>";
                    echo "</form>";
                }
                      ?>

            &nbsp;
            &nbsp;

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
    <div class="container-fluid">
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

</body>