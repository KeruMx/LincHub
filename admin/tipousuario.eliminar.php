<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 11:33 AM
 */
include ('header.php');
include ('../core/linchub.class.php');

if(isset($_GET['idpais'])){
    $idpais = $_GET['idpais'];
    if(is_numeric($idpais)){
        $statement = $web->db->prepare("delete from pais where idpais = :idpais");
        $statement->bindParam(":idpais", $idpais, PDO::PARAM_INT);
        $statement->execute();
        echo '<div class="alert alert-success" role="alert">El país se elimino correctamente.</div>';
    }
}
?>

<h1 class="display-4">Eliminar País</h1>
<hr>

<a href="pais.php" class="btn btn-primary">Volver a País</a>

<?php include ('footer.php'); ?>
