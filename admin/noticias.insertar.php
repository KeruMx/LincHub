<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 04:03 PM
 */

include ('../core/linchub.class.php');

include ('header.php');
if (isset($_POST['enviar'])){
    $titulo=$_POST['titulo'];
    $noticia=$_POST['noticia'];
    $fecha=$_POST['fecha'];
    $imagen=$_FILES['imagen']['name'];
    $imagen_size=$_FILES['imagen']['size'];
    $imagen_tmp=$_FILES['imagen']['tmp_name'];
    $origen=$imagen_tmp;

    $cualquiera = substr(md5(rand()),20);
    $imagen=$cualquiera."_".$imagen;
    $destino="../images/".$imagen;
    if ($web->validarImagenNoti($_FILES['imagen'])){
        if (move_uploaded_file($origen,$destino)){
            $statement=$web->db->prepare("insert into noticia (titulo,noticia,fecha,foto) values (:titulo,:noticia,:fecha,:foto)");
            $statement->bindParam(":titulo",$titulo);
            $statement->bindParam(":noticia",$noticia);
            $statement->bindParam(":fecha",$fecha);
            $statement->bindParam(":foto",$imagen);
            $statement->execute();
            echo '<div class="alert alert-success" role="alert">La noticia se insertó correctamente.</div>';
        }else
            echo '<div class="alert alert-danger" role="alert">Error desconocido.</div>';
    }else
        '<div class="alert alert-danger" role="alert">Error, la imagen/archivo no cumple con las características.</div>';
}
?>
    <div class="container-fluid">
        <br><br>
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-6">
                <form action="noticias.insertar.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Título</label>
                        <input type="text" name="titulo" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Noticia</label>
                        <textarea class="form-control" rows="5" id="noti" name="noticia"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" name="fecha"  required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" name="imagen" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="enviar" value="Guardar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include ('footer.php'); ?>