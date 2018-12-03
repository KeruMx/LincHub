<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 21/10/2018
 * Time: 09:13 AM
 */
include ('header.php');
include ('../core/linchub.class.php');
if (isset($_GET)) {
//    $idpais = $_GET['idpais'];
    $parametros['idpais'] = $_GET['idpais'];
}
$estado = $web->queryArray('Select * from estado join pais using (idpais) where idpais=:idpais',$parametros);
?>
    <h1 class="display-4">Estado</h1>
    <a href="estado.insertar.php" class="btn btn-success">Nuevo Estado</a>
    <table class="table">
        <tr>
            <?php
            if ($estado==array()){
                echo '<div class="alert alert-danger" role="alert">No hay Estados</div>';
            }else{
                    foreach (array_keys($estado[0]) as $index => $array_key) {
                        echo "<th>".$array_key."</th>";
                    }
                    echo "<th>Actualizar</th>";
                    echo "<th>Eliminar</th>";
                    echo "<th>Ver Municipio/City</th>";
            }?>

        </tr>
        <?php
        if ($estado==array()){

        }else{
            foreach ($estado as $index => $value) {
                echo "<tr>";
                foreach ($value as $key => $value2) {
                    echo "<td>".$value2."</td>";
                }
                echo "<td><a href=\"estado.actualizar.php?idestado=".$value['idestado']."\" class=\"btn btn-warning\">Actualizar</a></td>";
                echo "<td><a href=\"estado.eliminar.php?idestado=".$value['idestado']."\" class=\"btn btn-danger\">Eliminar</a></td>";
                echo "<td><a href=\"municipio.php?idestado=".$value['idestado']."\" class=\"btn btn-success\">Ver Municipios</a></td>";
                echo '</tr>';
            }
        }
            ?>
    </table>
<?php include ('footer.php'); ?>