<?php
// -------------
// Solo se puede usar este script 
//   si fue llamado con el metodo $_GET
// -------------

include '../../config.php';

/**
 * Devuelve todas las Categorias
 */
if (
  $_SERVER['REQUEST_METHOD'] = 'GET' && !$_GET
) {
  $estacionController = new EstacionController();
  $estaciones = $estacionController->buscar(null, true);

  print json_encode(['response' => true, 'payload' => $estaciones]);

  exit();
}

// Si la request vino con parametros, se avisa que esto no es requerido
if ($_GET) {
  print json_encode(['response' => false, 'mensaje' => 'Esta no requiere parametros.']);
  exit();
}

// Si el request no entro a ninguna condicion anterior, respuesta default:
print json_encode(['response' => false, 'mensaje' => 'Metodo no aceptado.']);
exit();
