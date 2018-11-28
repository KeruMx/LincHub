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
    $pais = $_POST['pais'];
    $statement=$web->db->prepare("insert into pais(pais) values (:pais)");
    $statement->bindParam(":pais",$pais);
    $statement->execute();
    echo '<div class="alert alert-success" role="alert">El país se inserto correctamente</div>';
}
?>
<div class="container-fluid">
    <br><br>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-6">
            <form action="pais.insertar.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Pais</label>
                    <input type="text" name="pais" required class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>



<?php include ('footer.php'); ?>
