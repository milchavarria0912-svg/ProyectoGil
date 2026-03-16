<?php

require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeEnteroObligatorio.php";
require_once __DIR__ . "/lib/devuelveNoContent.php";
require_once __DIR__ . "/Bd.php";

$id = recibeEnteroObligatorio("id");

$bd = Bd::pdo();

$stmt = $bd->prepare(
 "DELETE FROM EMPLEADO WHERE EMP_ID = :EMP_ID"
);

$stmt->execute([
 ":EMP_ID" => $id
]);

devuelveNoContent();