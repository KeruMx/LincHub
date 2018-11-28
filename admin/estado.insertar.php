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
    $idpais=$_POST['idpais'];
    $estado = $_POST['estado'];
    $statement=$web->db->prepare("insert into estado(estado,idpais) values (:estado,:idpais)");
    $statement->bindParam(":estado",$estado);
    $statement->bindParam(":idpais",$idpais);
    $statement->execute();
    echo '<div class="alert alert-success" role="alert">El estado se inserto correctamente</div>';
}
$pais=$web->queryArray("select * from pais");
?>
<div class="container-fluid">
    <br><br>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-6">
            <form action="estado.insertar.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Estado</label>
                    <input type="text" name="estado" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Selecciona el país </label>
                    <select class="form-control"  name="idpais">
                        <?php foreach ($pais as $key => $value) {
                            echo '<option value="'.$value['idpais'].'">'.$value['pais']."</option>";
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
</div>



<?php include ('footer.php'); ?>
