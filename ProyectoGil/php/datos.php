<?php

require_once __DIR__ . "/lib/manejaErrores.php";
require_once __DIR__ . "/lib/devuelveJson.php";

devuelveJson([
 "nombre" => ["value" => "Ana"],
 "puesto" => ["value" => "Diseñadora"],
 "horas" => ["valueAsNumber" => 8],
 "pagoHora" => ["value" => 120],
 "totalPago" => ["value" => 960],
 "activo" => ["checked" => true],
 "mensaje" => ["textContent" => "Empleado cargado correctamente"],
 "encabezado" => ["innerHTML" => "<em>Registro de <strong>empleado</strong></em>"],
 "direccion" => ["textContent" => "Av. Central 123\nColonia Centro"],
 "fotoEmpleado" => [
  "src" => "https://gilpgawoas.github.io/img/icono/maskable_icon_x48.png"
 ],
 "fotoEmpresa" => ["src" => "", "hidden" => true],
 "habilidades[]" => ["programación", "diseño"],
 "turno" => ["mañana"],
 "beneficios[]" => ["seguro", "bono"]
]);