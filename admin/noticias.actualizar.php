<?php
include ('../core/linchub.class.php');
include ('header.php');
if (isset($_GET['idnoticia'])){
    $idnoticia=$_GET['idnoticia'];
    if (is_numeric($idnoticia)){
        if (isset($_POST['enviar'])){
            $datos = $_POST['datos'];
            $foto = $_FILES['foto']['name'];
            $sql = "update noticia set fecha=:fecha, noticia=:noticia,titulo=:titulo";
            $arch = false;
            $valid = true;
            if($foto != ""){
                $foto_size = $_FILES['foto']['size'];
                $foto_tmp = $_FILES['foto']['tmp_name'];
                $origen = $foto_tmp;
                $cualquiera = substr(md5(rand()), 20);
                $foto = $cualquiera . "_" . $foto;
                $foto = str_replace(" ", "_", $foto);
                $destino = "../images/" . $foto;

                if ($web->validarImagenNoti($_FILES['foto'])) {
                    if(move_uploaded_file($origen, $destino)){
                        $arch = true;
                        $sql = $sql . ", foto = :foto ";
                    } else
                        echo '<div class="alert alert-danger" role="alert">Error desconocido.</div>';
                } else {
                    $valid = false;
                    echo '<div class="alert alert-danger" role="alert">Error, la imagen/archivo no cumple con las características.</div>';
                }
            }
            $sql = $sql ." where idnoticia = :idnoticia";
            $statement = $web->db->prepare($sql);
            $statement->bindParam(":titulo", $datos['titulo']);
            $statement->bindParam(":noticia", $datos['noticia']);
            $statement->bindParam(":fecha", $datos['fecha']);
            if($arch){
                $statement->bindParam(":foto", $foto);
            }
            $statement->bindParam(":idnoticia", $idnoticia, PDO::PARAM_INT);
            if($statement->execute() && $valid)
                echo '<div class="alert alert-success" role="alert">La noticia se actualizó.</div>';
        }
        $parametros[':idnoticia']   = $idnoticia;
        $sql = "select * from noticia where idnoticia = :idnoticia";
        $noticia = $web->queryArray($sql, $parametros);
    }
}

?>
<h1 class="display-4">Modificar Noticias</h1>
<div class="row">
    <div class="col-sm-1">

    </div>
    <div class="col-sm-6">
        <form action="noticias.actualizar.php?idnoticia=<?php echo $idnoticia; ?>" method="post" class="form container" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Titulo </label>
                <input
                    type="text"
                    class="form-control" name="datos[titulo]" value="<?php echo $noticia[0]['titulo']; ?>" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="">Noticia</label>
                <textarea class="form-control" name="datos[noticia]"  rows="3"><?php echo $noticia[0]['noticia']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="date">Fecha </label>
                <input
                    type="date"
                    class="form-control" name="datos[fecha]" id="date" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Fecha de modificación</small>
            </div>
            <div class="form-group">
                <label>Foto actual (Tamaño máximo de 200kb)</label>
                <img src="../images/<?php echo $noticia[0]['foto']; ?>" class="img-fluid" style="max-height: 300px; margin-left: 20px;">
            </div>
            <div class="form-group">
                <label>Nueva foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="enviar" value="Actualizar">
            </div>

        </form>
    </div>

    <div class="col-sm-3">

    </div>
</div>
<?php include ('footer.php');?>
