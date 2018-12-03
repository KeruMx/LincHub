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
    $parametros['idestado'] = $_GET['idestado'];
}
$municipio = $web->queryArray('Select idmunicipio, municipio,estado, pais from municipio join estado using (idestado) join pais p on estado.idpais = p.idpais where idestado=:idestado',$parametros);
?>
    <h1 class="display-4">Municipio</h1>
    <a href="municipio.insertar.php" class="btn btn-success">Nuevo Municipio</a>
    <table class="table">
        <tr>
            <?php
            if ($municipio==array()){
                echo '<div class="alert alert-danger" role="alert">No hay Municpio</div>';

            }else{
                foreach (array_keys($municipio[0]) as $index => $array_key) {
                    echo "<th>".$array_key."</th>";
                }
                echo "<th>Actualizar</th>";
                echo "<th>Eliminar</th>";
            }?>
        </tr>
        <?php
        if ($municipio==array()){

        }else{
            foreach ($municipio as $index => $value) {
                echo "<tr>";
                foreach ($value as $key => $value2) {
                    echo "<td>".$value2."</td>";
                }
                echo "<td><a href=\"municipio.actualizar.php?idmunicipio=".$value['idmunicipio']."\" class=\"btn btn-warning\">Actualizar</a></td>";
                echo "<td><a href=\"municipio.eliminar.php?idmunicipio=".$value['idmunicipio']."&&idestado=".$_GET['idestado']."\" class=\"btn btn-danger\">Eliminar</a></td>";
                echo '</tr>';
            }
        }
        ?>
    </table>
<?php include ('footer.php'); ?>