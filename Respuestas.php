<?php
require_once('Funciones.php');

$objFunciones= new Funciones();
$proyecto = 'servicioweb-847de-default-rtdb';
$res999 = $objFunciones ->getData($proyecto, 'respuestas','999');
$res200 = $objFunciones ->getData($proyecto, 'respuestas','200');
$res202 = $objFunciones ->getData($proyecto, 'respuestas','202');
$res203 = $objFunciones ->getData($proyecto, 'respuestas','203');
$res204 = $objFunciones ->getData($proyecto, 'respuestas','204');
$res300 = $objFunciones ->getData($proyecto, 'respuestas','300');
$res501 = $objFunciones ->getData($proyecto, 'respuestas','501');
$res500 = $objFunciones ->getData($proyecto, 'respuestas','500');
$res201= $objFunciones ->getData($proyecto, 'respuestas','201');
?>