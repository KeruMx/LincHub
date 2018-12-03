<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 11:33 AM
 */
include ('header.php');
include ('../core/linchub.class.php');

if(isset($_GET['idmunicipio'])){
    $idestado=$_GET['idestado'];
    $idmunicipio = $_GET['idmunicipio'];
    if(is_numeric($idmunicipio)){
        $statement = $web->db->prepare("delete from municipio where idmunicipio = :idmunicipio");
        $statement->bindParam(":idmunicipio", $idmunicipio, PDO::PARAM_INT);
        $statement->execute();
        echo '<div class="alert alert-success" role="alert">El municipio se elimino correctamente.</div>';
    }
}
?>

<h1 class="display-4">Eliminar municipio</h1>
<hr>

<a href="municipio.php?idestado=<?php echo $idestado; ?>" class="btn btn-primary">Volver a municipios</a>

<?php include ('footer.php'); ?>
