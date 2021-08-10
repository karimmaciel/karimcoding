<?php

//models/inscripciones.php
require_once '../fw/ErrorException.php';

class inscripciones extends Model {

      public function getTodas() {
        $this->db->query("SELECT * FROM inscripciones");
        return $this->db->fetchAll();
    }

      public function crearInscripcion($apellidos, $nombres, $dni, $direccion, $email) {

        //Validaciones
        if(strlen($apellidos)<1) throw new ValidacionException('Error inscripciones 1');
        $apellidos = substr($apellidos, 0, 50);
        $apellidos = $this->db->escape($apellidos);
       

        if(strlen($nombres)<1) throw new ValidacionException('Error inscripciones 2');
        $nombres = substr($nombres, 0, 50);
        $nombres = $this->db->escape($nombres);
        

        if(!ctype_digit($dni)) throw new ValidacionException('Error inscripciones 3');
        if($dni < 0) throw new ValidacionException('Error inscripciones 4');

        if(strlen($direccion)<1) throw new ValidacionException('Error inscripciones 5');
        $direccion = substr($direccion, 0, 200);
        $direccion = $this->db->escape($direccion);
        

        if(strlen($email)<1) throw new ValidacionException('Error inscripciones 6');
        $email = substr($email, 0, 100);
        $email = $this->db->escape($email);
        

        $this->db->query("INSERT INTO inscripciones
                            (apellidos, nombres, id_dni, direccion_postal, email) VALUES
                            ('$apellidos', '$nombres', $dni, '$direccion', '$email')");
    }
}

