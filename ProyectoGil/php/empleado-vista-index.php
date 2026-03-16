<?php

require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

$bd = Bd::pdo();

$stmt = $bd->query(
 "SELECT EMP_ID, EMP_NOMBRE, EMP_PUESTO, EMP_HORAS, EMP_PAGO 
  FROM EMPLEADO 
  ORDER BY EMP_NOMBRE"
);

$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);

$render = "";

foreach ($lista as $modelo) {

 $encodeId = urlencode($modelo["EMP_ID"]);
 $id = htmlentities($encodeId);

 $nombre = htmlentities($modelo["EMP_NOMBRE"]);
 $puesto = htmlentities($modelo["EMP_PUESTO"]);
 $horas = htmlentities($modelo["EMP_HORAS"]);
 $pago = htmlentities($modelo["EMP_PAGO"]);

 $render .=
  "<li>
     <p>
      <a href='modifica.html?id=$id'>$nombre</a>
     </p>
     <p>Puesto: $puesto</p>
     <p>Horas: $horas</p>
     <p>Pago: $pago</p>
   </li>";
}

devuelveJson([
 "lista" => ["innerHTML" => $render]
]);