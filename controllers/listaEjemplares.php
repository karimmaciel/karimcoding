<?php

// controllers/listaEjemplares.php 
session_start();
//si la variable de sesion no está logueada nos redirije a la pag. de logueo
if(!isset($_SESSION['logueado'])) {
    header("Location: Iniciar-sesion");
    exit;
}

require '../fw/fw.php';
require '../models/ejemplares.php';
require '../views/listadoEjemplares.php';
require '../models/libros.php';


if(isset($_POST['eliminar'])) {
    $en = new ejemplares();

    $actualizar = $en->eliminarEjemplar($_POST['eliminar']);

}
if(count($_POST)>2){
    $al = new libros();

    if(!isset($_POST['autor'])) throw new ValidacionException('Error listaejemplares 1');
    if(!isset($_POST['editorial'])) throw new ValidacionException('Error listaejemplares 2');
    if(!isset($_POST['titulo'])) throw new ValidacionException('Error listaejemplares 3');

    $al->altaLibro($_POST['autor'],
                   $_POST['editorial'],
                   $_POST['titulo']);
}

    $e = new ejemplares();
    $ejemplares = $e->getTodosConTitulo(); 

    $v = new listadoEjemplares();
    $v->ejemplares= $ejemplares;
    $v->render();

