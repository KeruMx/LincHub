<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 00:13 AM
 */
include ('../core/linchub.class.php');
include ('header.php');
if (isset($_GET['idestado'])){
    $idestado = $_GET['idestado'];
    if (is_numeric($idestado)){
        if (isset($_POST['enviar'])){
            print_r($_POST);
            $nombre = $_POST['estado'];
            $idpais = $_POST['idpais'];
            $statement = $web->db->prepare("update estado set estado=:estado, idpais=:idpais where idestado = :idestado");
            $statement->bindParam(":estado",$nombre );
            $statement->bindParam(":idestado",$idestado );
            $statement->bindParam(":idpais",$idpais );
            $statement->execute();
            echo '<div class="alert alert-success" role="alert">El estado se actualizó correctamente.</div>';
        }
        $parametros[':idestado']   = $idestado;
        $sql = "select * from estado join pais using (idpais)where idestado = :idestado";
        $estado = $web->queryArray($sql, $parametros);
        $pais = $web->queryArray("Select * from pais");
    }

}
?>
<h1 class="display-4">Modificar estado</h1>
<div class="row">
    <div class="col-sm-1">

    </div>
    <div class="col-sm-6">
        <form action="estado.actualizar.php?idestado=<?php echo $idestado; ?>" method="post" class="form container" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Estado</label>
                <input
                    type="text"
                    class="form-control" name="estado" value="<?php echo $estado[0]['estado']; ?>" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted"></small>
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
                <input type="submit" class="btn btn-primary" name="enviar" id="" aria-describedby="helpId" placeholder="" >
            </div>
        </form>
    </div>
</div>


<?php include ('footer.php'); ?>
