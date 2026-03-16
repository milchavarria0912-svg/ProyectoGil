<?php

require_once __DIR__ . "/lib/recibeJson.php";
require_once __DIR__ . "/lib/devuelveJson.php";

$json = recibeJson();

$nombre = $json->nombre;
$puesto = $json->puesto;
$horas = $json->horas;
$pagoHora = $json->pagoHora;

$total = $horas * $pagoHora;

$resultado = [
 "nombre" => $nombre,
 "puesto" => $puesto,
 "total" => $total
];

devuelveJson($resultado);