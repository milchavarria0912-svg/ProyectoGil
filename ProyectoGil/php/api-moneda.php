<?php

require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/devuelveJson.php";

$url = "https://open.er-api.com/v6/latest/MXN";

$respuesta = file_get_contents($url);

$datos = json_decode($respuesta, true);

$usd = $datos["rates"]["USD"];

devuelveJson([
 "mxn" => 1,
 "usd" => $usd
]);