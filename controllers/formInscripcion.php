<?php

//controllers/formInscripcion.php
session_start();
//si la variable de sesion no está logueada nos redirije a la pag. de logueo
if(!isset($_SESSION['logueado'])) {
    header("Location: Iniciar-sesion");
    exit;
}

require '../fw/fw.php';
require '../models/inscripciones.php';
require '../views/formInscripcion.php';


if(count($_POST)> 0) {
    $in = new inscripciones();

    if(!isset($_POST['apellidos'])) throw new ValidacionException('Error forminscripcion 1');
    if(!isset($_POST['nombres'])) throw new ValidacionException('Error forminscripcion 2');
    if(!isset($_POST['dni'])) throw new ValidacionException('Error forminscripcion 3');
    if(!isset($_POST['direccion'])) throw new ValidacionException('Error forminscripcion 4');
    if(!isset($_POST['email'])) throw new ValidacionException('Error forminscripcion 5');

    $in->crearInscripcion($_POST['apellidos'], 
                          $_POST['nombres'],
                          $_POST['dni'],
                          $_POST['direccion'],
                          $_POST['email'] );

    $v = new formInscripcionOk();
}
else {
    $v = new formInscripcion();
}

$v->render();

