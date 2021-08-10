<?php

//models/libros.php
require_once '../fw/ErrorException.php';

class libros extends Model {

    public function getTodos() {
        $this->db->query("SELECT * FROM libros");
        return $this->db->fetchAll();
    }
    
    public function altaLibro($autor, $editorial, $titulo) {

        //Validaciones
        if(strlen($autor)<1) throw new ValidacionException('Error libros 1');
        $autor = substr($autor, 0, 50);
        $autor = $this->db->escape($autor);
        
        if(strlen($editorial)<1) throw new ValidacionException('Error libros 2');
        $editorial = substr($editorial, 0, 50);
        $editorial = $this->db->escape($editorial);
        
        if(strlen($titulo)<1) throw new ValidacionException('Error libros 3');
        $titulo = substr($titulo, 0, 100);
        $titulo = $this->db->escape($titulo);

        $this->db->query("INSERT INTO libros
        (autor, editorial, titulo) VALUES
        ('$autor', '$editorial', '$titulo')");

        $nuevo = $this->db->insertId();

        $this->db->query("INSERT INTO ejemplares
        (id_libro) VALUES
        ('$nuevo')");

    }
}
