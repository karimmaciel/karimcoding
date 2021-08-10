<?php

//controllers/listaPrestamos.php
session_start();
//si la variable de sesion no está logueada nos redirije a la pag. de logueo
if(!isset($_SESSION['logueado'])) {
    header("Location: Iniciar-sesion");
    exit;
}

require '../fw/fw.php';
require '../models/prestamos.php';
require '../views/listadoPrestamos.php';


if(!isset($_POST['devolver']) || !isset($_POST['buscar'])){
    $p = new prestamos();       
    $todos = $p->getPrestamos(); 
}   
if(isset($_POST['devolver'])){
    $p = new prestamos();
    $p->devolverPrestamo($_POST['devolver']);
    $todos = $p->getPrestamos(); 
}
if(isset($_POST['buscar'])){
    $p = new prestamos();
    $todos = $p->getBuscado($_POST['buscar']);
}

      

$v = new listadoPrestamos();  
$v->prestamos = $todos;        
$v->render();      

