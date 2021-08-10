<?php

//controllers/listaInscripciones.php
session_start();
//si la variable de sesion no está logueada nos redirije a la pag. de logueo
if(!isset($_SESSION['logueado'])) {
    header("Location: Iniciar-sesion");
    exit;
}

require '../fw/fw.php';
require '../models/inscripciones.php';
require '../views/listadoInscripciones.php';
//1 er paso para ver inscripciones
$i = new inscripciones();       //hablo con model inscripciones
$todas = $i->getTodas();        //paso a $todas un array con los datos

//var_dump($todas);

$v = new listadoInscripciones();  //hablo con la vista, la instancio
$v->inscripciones = $todas;         //se envian los datos a la vista en la variable propia de la clase
$v->render();                        //dibuja la lista 
                                    
