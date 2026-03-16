<?php

require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/BAD_REQUEST.php";
require_once __DIR__ . "/lib/recibeTexto.php";
require_once __DIR__ . "/lib/ProblemDetailsException.php";
require_once __DIR__ . "/lib/devuelveJson.php";

$nombre = recibeTexto("nombre");
$horas = recibeTexto("horas");

if ($nombre === false || $nombre === "")
 throw new ProblemDetailsException([
  "status" => BAD_REQUEST,
  "title" => "Falta el nombre del empleado.",
  "type" => "/errors/faltanombre.html"
 ]);

if ($horas === false || $horas === "")
 throw new ProblemDetailsException([
  "status" => BAD_REQUEST,
  "title" => "Faltan las horas trabajadas.",
  "type" => "/errors/faltahoras.html"
 ]);

$resultado = "Empleado registrado: $nombre";

devuelveJson($resultado);