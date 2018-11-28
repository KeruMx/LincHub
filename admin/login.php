<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 09:13 AM
 */
include ('header.php');
?>

<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 20/11/2018
 * Time: 11:23 AM
 */
include ('../core/airplane.class.php');
//print_r($_POST);
$web=new AirPlane;
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
        header("Location: index.php");
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


<?php include ('footer.php'); ?>
