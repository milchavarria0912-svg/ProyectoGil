<?php

require_once __DIR__ . "/lib/recibeTexto.php";
require_once __DIR__ . "/lib/devuelveJson.php";

$nombre = recibeTexto("nombre");
$horas = recibeTexto("horas");
$pagoHora = recibeTexto("pagoHora");

$total = $horas * $pagoHora;

$resultado = [
 "nombre" => $nombre,
 "total" => $total
];

devuelveJson($resultado);