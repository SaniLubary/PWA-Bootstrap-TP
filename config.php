<?php
header('Content-Type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate ");

/////////////////////////////
// CONFIGURACION APP//
/////////////////////////////

session_start();

$ROOT = $_SERVER['DOCUMENT_ROOT'] . '/';
require $ROOT . 'utils/functions.php';
