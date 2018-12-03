<?php
/**
 * Created by PhpStorm.
 * User: queru
 * Date: 17/11/2018
 * Time: 03:04 PM
 */
session_start();
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
    public function obtenerPermisos($email){
        $this->conexion();
        $permisos=array();
        $query="select p.permiso from usuario u
                  join rol_usuario r using(idusuario)
                  join rol_permiso rp USING(id_rol)
                  join permiso p using(id_permiso)
                  where u.correo = :email";
        $statement=$this->db->prepare($query);
        $statement->bindParam(":email",$email);
        $statement->execute();
        while ($fila=$statement->fetch(PDO::FETCH_ASSOC)){
            array_push($permisos,$fila['permiso']);
        }

        return $permisos;
    }
    public function obtenerRoles($email){
        $this->conexion();
        $roles = array();
        $query = "select r.rol from usuario u
		join rol_usuario ru using(idusuario)
		join rol r using(id_rol)
		where u.correo = :email";
        $statement = $this->db->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->execute();
        while ($fila = $statement->fetch(PDO::FETCH_ASSOC))
            array_push($roles, $fila['rol']);

        return $roles;
    }
    public function login($email,$contrasena){
        $this->conexion();
        $contrasena=md5($contrasena);
        $sql="Select * from usuario where correo=:email and contrasena=:contrasena";
        $statetment=$this->db->prepare($sql);
        $statetment->bindParam(":email",$email);
        $statetment->bindParam(":contrasena",$contrasena);
        $statetment->execute();
        if ($statetment->fetch(PDO::FETCH_ASSOC)){
            return true;
        }else
            return false;
    }
    public function validarRol($roles_permitidos){
        $roles=$this->obtenerRoles($this->obtenerUsuario());
        $valido=false;
        foreach ($roles as $key => $value)
            if(in_array($value,$roles_permitidos)){
                $valido=true;
            }
        if (!$valido)
            header("Location: login.php");
    }
    public function validarPermiso($permisos_permitidos){
        $permisos=$this->obtenerPermisos($this->obtenerUsuario());
        $valido=false;
        foreach ($permisos as $key => $vlaue){
            if (in_array($vlaue,$permisos_permitidos))
                $valido=true;
        }
        if (!$valido)
            die('Seguridad Activada, no se encontro un permiso valido');
    }
    public function obtenerUsuario(){

        return $_SESSION['email'];
    }
    public function logout(){
        session_destroy();
    }
    public function validarArchivo(){

    }
    function extname($file) {
        $file = explode(".",basename($file));
        return $file[count($file)-1];
    }

    function getfilesize($size) {
        //if ($size < 2) return "$size byte";
        $units = array(' B', ' KiB', ' MiB', ' GiB', ' TiB');
        for ($i = 0; $size > 1024; $i++) { $size /= 1024; }
        return round($size, 2).$units[$i];
    }
//if (isset($_GET['download']))
//downloadfile($_GET['download']);

    function downloadfile($file){
//        global $config, $lang;
//        $file = $config['storage_path'].'/'.basename($file);
        if (!is_file($file)) { return; }
        header("Content-Type: application/octet-stream");
        header("Content-Size: ".filesize($file));
        header("Content-Disposition: attachment; filename=\"".basename($file)."\"");
        header("Content-Length: ".filesize($file));
        header("Content-transfer-encoding: binary");
        @readfile($file);
//        if ($config['log_download']) logadm($lang['DOWNLOAD'].' '.$file);
//        exit;
    }
}
$web= new linchub;
$web->conexion();
?>