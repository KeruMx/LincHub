<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 28/11/2018
 * Time: 03:49 PM
 */
include ('../core/linchub.class.php');
include ('header.php');
$tipousuario = $web->queryArray('Select * from tipouser');
?>
<h1 class="display-4">Tipo de usuarios</h1>
<a href="tipousuario.insertar.php" class="btn btn-success">Nuevo Tipo Usuario</a>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-7">
            <table class="table">
                <tr>
                    <?php foreach (array_keys($tipousuario[0]) as $index => $array_key) {
                        echo "<th>".$array_key."</th>";
                    }?>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
                <?php foreach ($tipousuario as $index => $value) {
                    echo "<tr>";
                    foreach ($value as $key => $value2) {
                        echo "<td>".$value2."</td>";
                    }
                    echo "<td><a href=\"tipousuario.actualizar.php?idtipo=".$value['idtipo']."\" class=\"btn btn-warning\">Actualizar</a></td>";
                    echo "<td><a href=\"tipousuario.eliminar.php?idtipo=".$value['idtipo']."\" class=\"btn btn-danger\">Eliminar</a></td>";
                    echo '</tr>';
                }?>
            </table>
        </div>
    </div>
</div>

<?php include ('footer.php'); ?>
