<?php


$archivoConfig = "config2.ini";
$configuracion = parse_ini_file($archivoConfig, true);

$host = $configuracion["bd"]["host"];
$usuario = $configuracion["bd"]["usuario"];
$clave = $configuracion["bd"]["clave"];
$bd = $configuracion["bd"]["basededatos"];

$conexion = new mysqli($host, $usuario, $clave, $bd);
if ($conexion->connect_error) { // connect error me da el num del error
    echo $conexion->connect_error . "<br>";//SI DA CERO ENTRA CORRECTAMENTE EN EL IF OPCION FALSA DSP DEL ELSE.
    die("Ha ocurrido un error");
} else {
    echo "Me conecte correctamente <br>";
}
/*hago la primer consulta*/
$sql = "SELECT * FROM  noticias";

if (!$resultado = $conexion->query($sql)) {
    echo "Ha ocurrido un error al ejecutar la query";
} else {
    echo "La query se ejecuto correctamente y tuvo" . $conexion->affected_rows . "filas de resultado<br>";
    echo "<br>";
    $fila = $resultado->fetch_assoc();
    echo $fila["id"];

}
echo "<br><br>";
/*hago el primer insert*/
$sql = "INSERT INTO  usuario(nombreUsuario,claveUsuario) values ('peter','1254')";

$resultado = $conexion->query($sql);

if ($conexion->errno) {
    echo "ha ocurrido un error";
    echo $conexion->errno . " - " . $conexion->error;
} else {
    echo "filas afectadas" . $conexion->affected_rows . "<br>";
    $last_id = $conexion->insert_id;
    echo "Id insertado " . $last_id;
}
/*hago el primer update
$sql = "update usuario set nombreUsuario  = 'pedro' where id= 1";

$resultado = $conexion->query($sql);

if ($conexion->errno) {
    echo "ha ocurrido un error";
    echo $conexion->errno . " - " . $conexion->error;
} else {
    echo "filas afectadas" . $conexion->affected_rows . "<br>";
}*/
/*hago el primer delete
$sql = "delete from noticias set= nombreUsuario = 'pedro' where id= 1";

$resultado = $conexion->query($sql);

if ($conexion->errno) {
    echo "ha ocurrido un error";
    echo $conexion->errno . " - " . $conexion->error;
} else {
    echo "filas afectadas" . $conexion->affected_rows . "<br>";
}
/*
$nombre = "Prueba de store";
$clave = "clave1";

$stmt = $conexion->prepare("INSERT INTO usuario(nombreUsuario,claveUsuario) values ('','05-10-2000' )";
$stmt->bind_param("ss", $nombre, $clave);
$stmt ->execute();

$nombre = "Prueba de store2";
$clave = "clave2";

$stmt = $conexion->prepare("INSERT INTO usuario(nombreUsuario,claveUsuario) values ('','05-10-2000' )";
$stmt->bind_param("ss", $nombre, $clave);
$stmt ->execute();
*/