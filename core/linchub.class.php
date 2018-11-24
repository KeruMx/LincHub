<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 17/11/2018
 * Time: 03:04 PM
 */

class linchub{
    var $db;
    function conexion(){
        $host='localhost';
        $db_user='Linc';
        $db_pass='1';
        $db_name='linch';
        $this->db = new PDO("mysql:host=$host;dbname=$db_name",$db_user,$db_pass);
    }
    function queryArray($query,$parametros=array()){
        $this->conexion();
        $datos=array();
        $statment=$this->db->prepare($query);
        if (count($parametros)>0){
            $etiquetas=array_keys($parametros);
            for ($i=0;$i<count($etiquetas);$i++){
                $statment->bindParam($etiquetas[$i],$parametros[$etiquetas[$i]]);
            }
        }
        $statment->execute();
        while ($fila=$statment->fetch(PDO::FETCH_ASSOC)) {
            //printf ("%s (%s)\n",$fila["marca"], $fila["modelo"]);
            array_push($datos,$fila);

        }

        return $datos;
    }
    function obtenerNoticias($control=true){
        $this->conexion();
        $datos = array();
        if ($control)
            $query = "select * from noticia order by fecha desc limit 3";
        else
            $query = "select * from noticia order by fecha desc ";
        $statement = $this->db->prepare($query);
        $statement->execute();

        while ($fila = $statement->fetch(PDO::FETCH_ASSOC))
            array_push($datos, $fila);

        return $datos;
    }
    function validarImagenNoti($archivo){
        switch ($archivo['error']){
            case 0:
                $tipos=array("image/jpeg","image/png");
                if (in_array($archivo['type'],$tipos)){
                    if ($archivo['size']<204800){
                        return true;
                    }else{
                        echo "error en el if 1";
                        return false;
                    }
                }else{
                    echo "error en el if 2";
                    return false;
                }

                break;
            default: false;
        }
    }
}
$web= new linchub;
$web->conexion();
?>