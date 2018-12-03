<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>AriplaneMX Login</title>
</head>
<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 20/11/2018
 * Time: 11:23 AM
 */
include ('core/linchub.class.php');
//print_r($_POST);
$email=(isset($_POST['email']))?$_POST['email']:null;
$contrasena=(isset($_POST['contrasena']))?$_POST['contrasena']:null;
$msg="";
if (!is_null($email)&&!is_null($contrasena)){
    if($web->login($email,$contrasena)){
        echo "no entro";
        $_SESSION['valido']=true;
        $_SESSION['email']=$email;
        $_SESSION['roles']=$web->obtenerRoles($email);
        $_SESSION['permisos']=$web->obtenerPermisos($email);
        header("Location: m_arch.php");
    }else{
        $web->logout();
        $msg= "<div class=\"alert alert-danger\" role=\"alert\">Login Incorrecto Usuario/contraseña Inválidos</div>";
    }
}else{
    $web->logout();
//    $msg= "<div class=\"alert alert-primary\" role=\"alert\">Ha salido del sistema</div>";
}

?>
<?php echo $msg; ?>
<div class="row">
    <div class="col-md-12">
        <div class="col-xl-12">
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-sm-4">
            
        </div>
        <div class="col-sm-3">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <a class="form" for="exampleCheck1" href="recuperar.php">Olvide mi contraseña</a>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
