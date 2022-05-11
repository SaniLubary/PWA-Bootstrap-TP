<?php
// -------------
// Solo se puede usar este script 
//   si fue llamado con el metodo $_GET
// -------------

include '../../config.php';

/**
 * Devuelve todos los contactos de la DB
 */
if (
  $_SERVER['REQUEST_METHOD'] === 'GET' && empty($_GET)
) {
  $contactoController = new ContactoController();
  $contactos = $contactoController->buscar(null, true);

  print json_encode(['response' => true, 'payload' => $contactos]);

  exit();
}

/**
 * Para cargar un nuevo contacto
 */
$json_response = file_get_contents('php://input');
$json_arr = json_decode($json_response, true);
if (
  $json_arr
) {
  $contactoController = new ContactoController();
  $contactoObj = $contactoController->alta($json_arr);

  if ($contactoObj) {
    $contactoArr = $contactoController->buscar(['id' => $contactoObj->getId()], true)[0];
    print json_encode(['response' => true, 'payload' => $contactoArr]);
  } else {
    print json_encode(['response' => false, 'payload' => []]);
  }

  exit();
}

// Si la request GET vino CON parametros, se avisa que esto no es requerido
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
  print json_encode(['response' => false, 'mensaje' => 'Esta request no requiere parametros.']);
  exit();
}

// Si la request POST vino SIN Body JSON, se avisa que requiere parametros
if (!$json_arr) {
  print json_encode(['response' => false, 'mensaje' => 'Esta request requiere un body con nombre, empresa, telefono, mail y comentario.']);
  exit();
}

// Si el request no entro a ninguna condicion anterior, respuesta default:
print json_encode(['response' => false, 'mensaje' => 'Metodo no aceptado.']);
exit();
