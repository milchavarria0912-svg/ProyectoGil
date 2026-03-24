<?php

require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/recibeJson.php";
require_once __DIR__ . "/lib/devuelveJson.php";

$json = recibeJson();

$cantidad = $json->cantidad;

// API
$url = "https://open.er-api.com/v6/latest/MXN";
$respuesta = file_get_contents($url);

$datos = json_decode($respuesta);

$usd = $datos->rates->USD;

$resultado = $cantidad * $usd;

devuelveJson([
 "mxn" => $cantidad,
 "tipoCambio" => $usd,
 "usd" => $resultado
]);
