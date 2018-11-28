<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 00:13 AM
 */
include ('../core/linchub.class.php');
include ('header.php');
if (isset($_GET['idpais'])){
    $idpais = $_GET['idpais'];
    if (is_numeric($idpais)){
        if (isset($_POST['enviar'])){
            $nombre = $_POST['pais'];
            $statement = $web->db->prepare("update pais set pais=:pais where idpais = :idpais");
            $statement->bindParam(":pais",$nombre );
            $statement->bindParam(":idpais",$idpais );
            $statement->execute();
            echo '<div class="alert alert-success" role="alert">El país se actualizó correctamente.</div>';
        }
        $parametros[':idpais']   = $idpais;
        $sql = "select * from pais where idpais = :idpais";
        $pais = $web->queryArray($sql, $parametros);
    }

}
?>
<h1 class="display-4">Modificar País</h1>
<div class="row">
    <div class="col-sm-1">

    </div>
    <div class="col-sm-6">
        <form action="pais.actualizar.php?idpais=<?php echo $idpais; ?>" method="post" class="form container" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">País</label>
                <input
                    type="text"
                    class="form-control" name="pais" value="<?php echo $pais[0]['pais']; ?>" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="enviar" id="" aria-describedby="helpId" placeholder="" >
            </div>
        </form>
    </div>
</div>


<?php include ('footer.php'); ?>
