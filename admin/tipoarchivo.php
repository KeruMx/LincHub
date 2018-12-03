<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 28/11/2018
 * Time: 03:49 PM
 */
include ('../core/linchub.class.php');
include ('header.php');
$tipoarchivo = $web->queryArray('Select * from  tipoarchivo');
print_r($tipoarchivo);
?>
<h1 class="display-4">Tipo de archivo</h1>
<a href="tipoarchivo.insertar.php" class="btn btn-success">Nuevo Tipo archivo</a>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-7">
            <table class="table">
                <tr>
                    <?php foreach (array_keys($tipoarchivo[0]) as $index => $array_key) {
                        echo "<th>".$array_key."</th>";
                    }?>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                <?php foreach ($tipoarchivo as $index => $value) {
                    echo "<tr>";
                    foreach ($value as $key => $value2) {
                        echo "<td>".$value2."</td>";
                    }
                    echo "<td><a href=\"tiparchivo.actualizar.php?idtipo=".$value['idtipoarchivo']."\" class=\"btn btn-warning\">Actualizar</a></td>";
                    echo "<td><a href=\"tiparchivo.eliminar.php?idtipo=".$value['idtipoarchivo']."\" class=\"btn btn-danger\">Eliminar</a></td>";
                    echo '</tr>';
                }?>
            </table>
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
