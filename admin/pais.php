<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 09:13 AM
 */
include ('../core/linchub.class.php');
include ('header.php');
$pais = $web->queryArray('Select * from pais');
?>
<h1 class="display-4">Países</h1>
<a href="pais.insertar.php" class="btn btn-success">Nuevo País</a>
<table class="table">
    <tr>
        <?php foreach (array_keys($pais[0]) as $index => $array_key) {
           echo "<th>".$array_key."</th>";
        }?>
        <th>Actualizar</th>
        <th>Eliminar</th>
        <th>Ver estados</th>
    </tr>
    <?php foreach ($pais as $index => $value) {
       echo "<tr>";
            foreach ($value as $key => $value2) {
                echo "<td>".$value2."</td>";
            }
        echo "<td><a href=\"pais.actualizar.php?idpais=".$value['idpais']."\" class=\"btn btn-warning\">Actualizar</a></td>";
        echo "<td><a href=\"pais.eliminar.php?idpais=".$value['idpais']."\" class=\"btn btn-danger\">Eliminar</a></td>";
        echo "<td><a href=\"estado.php?idpais=".$value['idpais']."\" class=\"btn btn-success\">Ver Estados</a></td>";
        echo '</tr>';
    }?>
</table>



<?php include ('footer.php'); ?>
