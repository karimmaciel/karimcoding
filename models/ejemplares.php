<?php

// models/ejemplares.php
require_once '../fw/ErrorException.php';

class ejemplares extends Model {

      public function getTodos() {
        $this->db->query("SELECT * FROM ejemplares");
        return $this->db->fetchAll();
      }
      public function getTodosConTitulo() {
        $this->db->query("SELECT ejem.id_ejemplar, lib.titulo, ejem.estado_ejem
                          FROM ejemplares ejem JOIN libros lib on ejem.id_libro=lib.id_libro
                          ORDER BY ejem.estado_ejem");
        return $this->db->fetchAll();
      }
      public function getParaPrestamos(){
        $this->db->query("SELECT  lib.titulo, lib.autor, lib.editorial ,ejem.id_ejemplar, ejem.estado_ejem
                          FROM ejemplares ejem JOIN libros lib on ejem.id_libro=lib.id_libro
                          WHERE ejem.estado_ejem = 'disponible'
                          GROUP BY ejem.id_ejemplar
                          ORDER BY lib.titulo");
        return $this->db->fetchAll();
      }
      public function eliminarEjemplar($id_ejemplar) {

        if(!ctype_digit($id_ejemplar)) throw new ValidacionException('Error ejemplares 1');
        if($id_ejemplar < 0) throw new ValidacionException('Error ejemplares 2');

        $this->db->query("DELETE FROM ejemplares
                          WHERE id_ejemplar = '$id_ejemplar'");
      
      }
     
}
