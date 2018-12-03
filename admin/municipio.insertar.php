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

    $idestado=$_POST['idestado'];
    $municipio = $_POST['municipio'];
    $statement=$web->db->prepare("insert into municipio(municipio,idestado) values (:municipio,:idestado)");
    $statement->bindParam(":municipio",$municipio);
    $statement->bindParam(":idestado",$idestado);
    $statement->execute();
    echo '<div class="alert alert-success" role="alert">El municipio se inserto correctamente</div>';
}
$estado=$web->queryArray("select * from estado");
?>
<div class="container-fluid">
    <br><br>
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-6">
            <form action="municipio.insertar.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Municipio</label>
                    <input type="text" name="municipio" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Selecciona el país </label>
                    <select class="form-control"  name="idestado">
                        <?php foreach ($estado as $key => $value) {
                            echo '<option value="'.$value['idestado'].'">'.$value['estado']."</option>";
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
