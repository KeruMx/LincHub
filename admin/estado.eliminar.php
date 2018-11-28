<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 11:33 AM
 */
include ('header.php');
include ('../core/linchub.class.php');

if(isset($_GET['idestado'])){
    $idestado = $_GET['idestado'];
    if(is_numeric($idestado)){
        $statement = $web->db->prepare("delete from estado where idestado = :idestado");
        $statement->bindParam(":idestado", $idestado, PDO::PARAM_INT);
        $statement->execute();
        echo '<div class="alert alert-success" role="alert">El estado se elimino correctamente.</div>';
    }
}
?>

<h1 class="display-4">Eliminar Estado</h1>
<hr>

<a href="estado.php" class="btn btn-primary">Volver a Estados</a>

<?php include ('footer.php'); ?>
