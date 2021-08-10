<?php

// models/ejemplaresEnPrestamo.php
require_once '../fw/ErrorException.php';

class ejemplaresEnPrestamo extends Model {

      public function getTodos() {
        $this->db->query("SELECT * FROM ejemplares_enprestamo");
        return $this->db->fetchAll();
    }

      public function crearEjemplaresEnPrestamo($id_prestamo, $id_ejemplar) {

        if(!ctype_digit($id_prestamo)) throw new ValidacionException('Error ejemplares_prestamo 1');
        if($id_prestamo < 0) throw new ValidacionException('Error ejemplares_prestamo 2');

        if(!ctype_digit( $id_ejemplar))throw new ValidacionException('Error ejemplares_prestamo 3');
        if( $id_ejemplar < 0) throw new ValidacionException('Error ejemplares_prestamo 4');
    
        
        $this->db->query("INSERT INTO ejemplares_enprestamo
                              (id_ejemplar, id_prestamo) VALUES
                              ($id_ejemplar, $id_prestamo)");
        
        $this->db->query("UPDATE ejemplares
                          SET estado_ejem = 'en prestamo'
                          WHERE id_ejemplar = $id_ejemplar ");

       return $id_prestamo;
    }

}
