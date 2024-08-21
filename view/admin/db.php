<?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "muni";
try{
	$basededatos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
	$basededatos->query("set names utf8;");
    $basededatos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $basededatos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $basededatos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
};

?>