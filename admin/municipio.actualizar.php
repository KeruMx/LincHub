<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 00:13 AM
 */
include ('../core/linchub.class.php');
include ('header.php');
if (isset($_GET['idmunicipio'])){
    $idmunicipio = $_GET['idmunicipio'];
    if (is_numeric($idmunicipio)){
        if (isset($_POST['enviar'])){
            print_r($_POST);
            $nombre = $_POST['municipio'];
            $idestado = $_POST['idestado'];
            $statement = $web->db->prepare("update municipio set municipio=:municipio, idestado=:idestado where idmunicipio = :idmunicipio");
            $statement->bindParam(":municipio",$nombre );
            $statement->bindParam(":idmunicipio",$idmunicipio );
            $statement->bindParam(":idestado",$idestado );
            $statement->execute();
            echo '<div class="alert alert-success" role="alert">El municipio se actualizó correctamente.</div>';
        }
        $parametros[':idmunicipio']   = $idmunicipio;
        $sql = "select * from municipio join estado using (idestado) where idmunicipio = :idmunicipio";
        $municipio = $web->queryArray($sql, $parametros);
        $estado = $web->queryArray("Select * from estado");
    }

}
?>
<h1 class="display-4">Modificar municipio</h1>
<div class="row">
    <div class="col-sm-1">

    </div>
    <div class="col-sm-6">
        <form action="municipio.actualizar.php?idmunicipio=<?php echo $idmunicipio; ?>" method="post" class="form container" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Municipio</label>
                <input
                        type="text"
                        class="form-control" name="municipio" value="<?php echo $municipio[0]['municipio']; ?>" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="">Selecciona el Estado </label>
                <select class="form-control"  name="idestado">
                    <?php foreach ($estado as $key => $value) {
                        echo '<option value="'.$value['idestado'].'">'.$value['estado']."</option>";
                    } ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="enviar" id="" aria-describedby="helpId" placeholder="" >
            </div>
        </form>
    </div>
</div>


<?php include ('footer.php'); ?>
