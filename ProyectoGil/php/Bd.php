<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    "sqlite:" . __DIR__ . "/empleados.db",
    null,
    null,
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS EMPLEADO (
      EMP_ID INTEGER PRIMARY KEY AUTOINCREMENT,
      EMP_NOMBRE TEXT NOT NULL,
      EMP_PUESTO TEXT NOT NULL,
      EMP_HORAS INTEGER NOT NULL,
      EMP_PAGO REAL NOT NULL
     )"
   );
  }

  return self::$pdo;
 }
}