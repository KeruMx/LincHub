<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 10:13 AM
 */
include ('../core/linchub.class.php');
include ('header.php');
if (isset($_POST['enviar'])){
    $tipouser = $_POST['tipo'];
    $statement=$web->db->prepare("insert into tipouser(tipo) values (:tipo)");
    $statement->bindParam(":tipo",$tipouser);
    $statement->execute();
    echo '<div class="alert alert-success" role="alert">El tipo de usuario se inserto correctamente</div>';
}
?>
<div class="container-fluid">
    <br><br>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-6">
            <form action="tipousuario.insertar.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tipo Usuario</label>
                    <input type="text" name="tipo" required class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>



<?php include ('footer.php'); ?>
