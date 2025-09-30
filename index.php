<?php

header('Content-type: application/json');

require_once 'helpers/misc.php';

require_once "controladores/rutas.controlador.php";
require_once "controladores/usuarios.controlador.php";


require_once "modelos/usuarios.modelo.php";

$rutas = new ControladorRutas();
$rutas -> index();