<?php

require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeTextoObligatorio.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";

$nombre = recibeTextoObligatorio("nombre");
$puesto = recibeTextoObligatorio("puesto");
$horas = recibeEnteroObligatorio("horas");
$pago = recibeEnteroObligatorio("pago");

$bd = Bd::pdo();

$stmt = $bd->prepare(
 "INSERT INTO EMPLEADO (
  EMP_NOMBRE,
  EMP_PUESTO,
  EMP_HORAS,
  EMP_PAGO
 ) VALUES (
  :EMP_NOMBRE,
  :EMP_PUESTO,
  :EMP_HORAS,
  :EMP_PAGO
 )"
);

$stmt->execute([
 ":EMP_NOMBRE" => $nombre,
 ":EMP_PUESTO" => $puesto,
 ":EMP_HORAS" => $horas,
 ":EMP_PAGO" => $pago
]);

$id = $bd->lastInsertId();

devuelveCreated(
 "/php/empleado-vista-modifica.php?id=$id",
 [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
 ]
);