<?php
include('core/linchub.class.php');
$web->validarRol(array("Cliente"));
$web->validarPermiso(array("Almacenar"));
include ('header.php');
$carpeta=$web->queryArray("Select idarchivo as ID, archivo as 'Nombre archivo', tamano as Tamano, atributo as Atributo from carpetadetalle join archivo using (idarchivo) join atributo using (idatributo) where idusuario=1");
print_r($carpeta);
$tipoarchivo = $web->queryArray('Select tipoarchivo from  tipoarchivo');
if (isset($_POST['subir'])){
    print_r($carpeta    );
    $size=$web->getfilesize($_FILES['archivo']['size']);
    echo $size;
}
//die();
?>

    <section>
        <hr class="featurette-divider">
        <div class="row">
            <div class="col-sm-5">
                <form method="post" action="m_arch.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control" name="archivo" id=""  lang="es">
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="submit"
                               name="subir" value="Subir Archivo" id="" class="btn btn-primary" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Archivos Permitidos: <?php foreach ($tipoarchivo as $index => $value) {
                                echo $value['tipoarchivo'].", ";
                        } ?> </small>
                    </div>
                </form>
            </div>
        </div>

        <hr class="featurette-divider">
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <?php foreach (array_keys($carpeta[0]) as $index => $array_key) {
                echo '<th>'.$array_key.'</th>';

                }?>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php $i=1;

                foreach ($carpeta as $key => $value) {
                    echo '<tr>';
                    echo "<th scope=\"row\">$i</th>";
                    $j=0;
                    foreach ($value as $key => $item) {
                        print_r($value);
                        if ($j==2)
                            echo '<td>'.$web->getfilesize($item).'</td>';
                        else
                            echo '<td>'.$item.'</td>';
                        $j++;
                    }
                    echo "<td><a href=\"archivo.descargar.php?idarchivo=".$value['ID']."\" class=\"btn btn-outline-warning\">Descargar</a></td>";
                    echo "<td><a href=\"archivo.eliminar.php?idarchivo=".$value['ID']."\" class=\"btn btn-outline-danger\">Eliminar</a></td>";
                   echo '</tr>';
                    $i++;
                }?>


            </tr>

            </tbody>
        </table>
        <hr class="featurette-divider">
    </section>
<?php include ('footer.php'); ?>