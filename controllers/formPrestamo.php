<?php

//controllers/formPrestamo.php
session_start();
	//si la variable de sesion no está logueada nos redirije a la pag. de logueo
if(!isset($_SESSION['logueado'])) {
    header("Location: Iniciar-sesion");
    exit;
}

require '../fw/fw.php';
require '../models/socios.php';
require '../models/prestamos.php';
require '../models/ejemplares.php';
require '../models/ejemplaresEnPrestamo.php';
require '../views/formPrestamo.php';


if(!isset($_POST['prestar']) || !isset($_POST['tipo_prestamo'])){
    $nuevop = 0;
}
if(isset($_POST['tipo_prestamo'])) {
    $pm = new prestamos();

    if(!isset($_POST['socio'])) throw new ValidacionException('Error formprestamo 1');
    if(!isset($_POST['dia'])) throw new ValidacionException('Error formprestamo 2');
    if(!isset($_POST['mes'])) throw new ValidacionException('Error formPrestamo 3');
    if(!isset($_POST['anio'])) throw new ValidacionException('Error formprestamo 4');

    $nuevop = $pm->crearPrestamos($_POST['socio'], 
                                  $_POST['tipo_prestamo'],
                                  $_POST['dia'],
                                  $_POST['mes'],
                                  $_POST['anio'] );
                                  
 
}
if(isset($_POST['prestar'])) {
    $ep = new ejemplaresEnPrestamo();

    if(!isset($_POST['nuevop'])) throw new ValidacionException('Error formprestamo 5');

    $nuevop = $ep->crearEjemplaresEnPrestamo($_POST['nuevop'],$_POST['prestar']);

}

    $sm = new socios();
    $stodos = $sm->getTodos();

    $em = new ejemplares();
    $etodos = $em->getParaPrestamos();

    $v = new formPrestamo();
    $v->socios = $stodos;
    $v->ejemplares = $etodos;
    $v->nuevop = $nuevop;

    $v->render();

  
