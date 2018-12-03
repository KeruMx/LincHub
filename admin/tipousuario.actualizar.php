<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 00:13 AM
 */
include ('../core/linchub.class.php');
include ('header.php');
if (isset($_GET['idtipo'])){
    $idtipo = $_GET['idtipo'];
    if (is_numeric($idtipo)){
        if (isset($_POST['enviar'])){
            $nombre = $_POST['tipo'];
            $statement = $web->db->prepare("update tipouser set tipo=:tipo where idtipo = :idtipo");
            $statement->bindParam(":tipo",$nombre );
            $statement->bindParam(":idtipo",$idtipo );
            $statement->execute();
            echo '<div class="alert alert-success" role="alert">El tipo de usuario se actualizó correctamente.</div>';
        }
        $parametros[':idtipo']   = $idtipo;
        $sql = "select * from tipouser where idtipo = :idtipo";
        $tipouser = $web->queryArray($sql, $parametros);
    }

}
?>
<h1 class="display-4">Modificar Tipo Usuario</h1>
<div class="row">
    <div class="col-sm-1">

    </div>
    <div class="col-sm-6">
        <form action="tipousuario.actualizar.php?idtipo=<?php echo $idtipo; ?>" method="post" class="form container" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Tipo</label>
                <input
                        type="text"
                        class="form-control" name="tipo" value="<?php echo $tipouser[0]['tipo']; ?>" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="enviar" id="" aria-describedby="helpId" placeholder="" >
            </div>
        </form>
    </div>
</div>


<?php include ('footer.php'); ?>
