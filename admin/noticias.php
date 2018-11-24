<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 03:15 PM
 */

include ('../core/linchub.class.php');
$noti=$web->obtenerNoticias(false);
include ('header.php');
?>
<h1 class="display-4">Noticias(Ordenadas por fecha)</h1>
<a href="noticias.insertar.php" class="btn btn-success">Nueva Noticia</a>
<table class="table">
    <tr>
        <?php foreach (array_keys($noti[0]) as $index => $array_key) {
                echo '<th>'.$array_key.'</th>';

        }
                echo '<th> Actualizar</th>';
                echo '<th> Eliminar</th>';?>
    </tr>
        <?php foreach ($noti as $key => $value) {
            echo '<tr>';
            foreach ($value as $key => $item) {
                echo '<td>'.$item.'</td>';
            }
            echo "<td><a href=\"noticias.actualizar.php?idnoticia=".$value['idnoticia']."\" class=\"btn btn-warning\">Actualizar</a></td>";
            echo "<td><a href=\"noticias.eliminar.php?idnoticia=".$value['idnoticia']."\" class=\"btn btn-danger\">Eliminar</a></td>";
            echo '</tr>';
        } ?>
</table>

<?php include ('footer.php'); ?>
