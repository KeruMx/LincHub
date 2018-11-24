<?php

include('header.php');
include ('../core/linchub.class.php');
if(isset($_GET['idnoticia'])){
    $idnoticia = $_GET['idnoticia'];
    if(is_numeric($idnoticia)){
        $statement = $web->db->prepare("delete from noticia where idnoticia = :idnoticia");
        $statement->bindParam(":idnoticia", $idnoticia, PDO::PARAM_INT);
        $statement->execute();
        echo '<div class="alert alert-success" role="alert">La noticia se eliminó correctamente.</div>';
    }
}
?>

    <h1 class="display-4">Eliminar Noticia</h1>
    <hr>

    <a href="noticias.php" class="btn btn-primary">Volver a Noticias</a>

<?php
include('footer.php');
?>