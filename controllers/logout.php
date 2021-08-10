<?php
//controllers/logout.php

session_start();
unset($_SESSION['logueado']); //elimina la variable de sesion
header("Location: Iniciar-sesion");