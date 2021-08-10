<?php

//models/administradores.php
require_once '../fw/ErrorException.php';

class administradores extends Model {

    public function logueo($email, $passwd) {
        
		if(strlen($passwd)<1) throw new ValidacionException('Error administradores 1');
        $passwd = substr($passwd, 0, 200);
        $passwd = $this->db->escape($passwd);
        

        if(strlen($email)<1) throw new ValidacionException('Error administradores 2');
        $email = substr($email, 0, 100);
        $email = $this->db->escape($email);

        $this->db->query( "SELECT *
						   FROM administradores a
						   WHERE a.email='$email' and a.password='$passwd' 
						   LIMIT 1");
        
		$res = $this->db->fetchAll();

		if($this->db->numRows($res) == 1) {
			
			$_SESSION['logueado'] = true; //variable de sesion(array), se distinguen por cookie(servidor)
			$fila = $this->db->fetch($res);
			$_SESSION['nombre'] = $fila['nombre'];
			header("Location: Iniciar-sesion");
			exit;
		}
	
    }
}
