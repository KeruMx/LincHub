<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 17/11/2018
 * Time: 03:04 PM
 */

class Linchub{
    var $db;
    function conexion(){
        $host='localhost';
        $db_user='Linc';
        $db_pass='1';
        $db_name='linch';
        $this->db = new PDO("mysql:host=$host;dbname=$db_name",$db_user,$db_pass);
    }
    function obtenerNoticias(){
        $this->conexion();
        $datos = array();
        $query = "select * from noticia order by fecha desc limit 3";
        $statement = $this->db->prepare($query);
        $statement->execute();

        while ($fila = $statement->fetch(PDO::FETCH_ASSOC))
            array_push($datos, $fila);

        return $datos;
    }
}