<?php

//controllers/login.php
session_start();
require '../fw/fw.php';
require '../views/login.php';
require '../models/administradores.php';


if(count($_POST)>0) {

    if(!isset($_POST['email'])) throw new ValidacionException('Error login 1');
    if(!isset($_POST['passwd'])) throw new ValidacionException('Error login 2');

    $passwd = sha1($_POST['passwd']);

    $am = new administradores();
    $am->logueo($_POST['email'],$passwd);
}

$v = new login();
$v->render();

