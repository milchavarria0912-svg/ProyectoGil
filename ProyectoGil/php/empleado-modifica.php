<?php

require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/recibeTextoObligatorio.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

$id = recibeEnteroObligatorio("id");
$nombre = recibeTextoObligatorio("nombre");
$puesto = recibeTextoObligatorio("puesto");
$horas = recibeEnteroObligatorio("horas");
$pago = recibeEnteroObligatorio("pago");

$bd = Bd::pdo();

$stmt = $bd->prepare(
 "UPDATE EMPLEADO
  SET
   EMP_NOMBRE = :EMP_NOMBRE,
   EMP_PUESTO = :EMP_PUESTO,
   EMP_HORAS = :EMP_HORAS,
   EMP_PAGO = :EMP_PAGO
  WHERE
   EMP_ID = :EMP_ID"
);

$stmt->execute([
 ":EMP_NOMBRE" => $nombre,
 ":EMP_PUESTO" => $puesto,
 ":EMP_HORAS" => $horas,
 ":EMP_PAGO" => $pago,
 ":EMP_ID" => $id
]);

devuelveJson([
 "id" => ["value" => $id]
]);