<?php

require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/validaEntidadObligatoria.php";
require_once __DIR__ . "/lib/devuelveJson.php";
require_once __DIR__ . "/Bd.php";

$id = recibeEnteroObligatorio("id");

$bd = Bd::pdo();

$stmt = $bd->prepare(
 "SELECT * FROM EMPLEADO WHERE EMP_ID = :EMP_ID"
);

$stmt->execute([
 ":EMP_ID" => $id
]);

$modelo = $stmt->fetch(PDO::FETCH_ASSOC);

$modelo = validaEntidadObligatoria("Empleado", $modelo);

devuelveJson([
 "id" => ["value" => $id],
 "nombre" => ["value" => $modelo["EMP_NOMBRE"]],
 "puesto" => ["value" => $modelo["EMP_PUESTO"]],
 "horas" => ["value" => $modelo["EMP_HORAS"]],
 "pago" => ["value" => $modelo["EMP_PAGO"]],
]);