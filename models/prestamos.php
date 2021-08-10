<?php

//models/prestamos.php
require_once '../fw/ErrorException.php';

class prestamos extends Model  {

    public function getTodos() {
        $this->db->query("SELECT * FROM prestamos");
        return $this->db->fetchAll();

    }
    public function getPrestamos() {
        $this->db->query("SELECT p.id_socio, i.nombres, i.apellidos, p.tipo_prestamo, p.fecha_prestamo, p.id_prestamo
                          FROM ((prestamos p JOIN socios s ON s.id_socio=p.id_socio)
                                             JOIN inscripciones i ON i.id_dni=s.id_dni)
                          GROUP BY p.id_prestamo
                          ORDER BY p.fecha_prestamo");
        return $this->db->fetchAll();

    }
    public function getbuscado($bus) {
        
        if(!ctype_digit($bus)) throw new ValidacionException('Error prestamos 1');
        if($bus < 0) throw new ValidacionException('Error prestamos 2');

        $this->db->query("SELECT p.id_socio, i.nombres, i.apellidos, p.tipo_prestamo, p.fecha_prestamo, p.id_prestamo
                          FROM ((prestamos p JOIN socios s ON s.id_socio=p.id_socio)
                                             JOIN inscripciones i ON i.id_dni=s.id_dni)
                          WHERE p.id_socio = '$bus'
                          GROUP BY p.id_prestamo
                          ");
        return $this->db->fetchAll();

    }
    public function crearPrestamos($socio, $tipo_prestamo, $dia, $mes, $anio ) {

    if(!ctype_digit($socio)) throw new ValidacionException('Error prestamos 3');
    if($socio < 0) throw new ValidacionException('Error prestamos 4');
    
    if(strlen($tipo_prestamo)<1) throw new ValidacionException('Error prestamos 5');
    $tipo_prestamo = substr($tipo_prestamo, 20);
    $tipo_prestamo = $this->db->escape($tipo_prestamo);
    
    if(!ctype_digit($dia)) throw new ValidacionException('Error prestamos 6');
    if($dia < 0) throw new ValidacionException('Error prestamos 7');
    if($dia > 31) throw new ValidacionException('Error prestamos 8');

    if(!ctype_digit($mes)) throw new ValidacionException('Error prestamos 9');
    if($mes < 0) throw new ValidacionException('Error prestamos 10');
    if($mes > 12) throw new ValidacionException('Error prestamos 11');

    if(!ctype_digit($anio)) throw new ValidacionException('Error prestamos 12');
    if($anio < date("Y")-1) throw new ValidacionException('Error prestamos 13');
    if($anio > date("Y")) throw new ValidacionException('Error prestamos 14');

    if(!checkdate($mes, $dia, $anio)) throw new ValidacionException('Error prestamos 15');
   
      
        $this->db->query("INSERT INTO prestamos
        (id_socio, tipo_prestamo, fecha_prestamo) VALUES
        ('$socio', '$tipo_prestamo', '$anio-$mes-$dia')");

        $nuevo = $this->db->insertId();    
        return $nuevo;
    

    }
    public function devolverPrestamo($dev) {
        
        if(!ctype_digit($dev)) throw new ValidacionException('Error prestamos 16');
        if($dev < 0) throw new ValidacionException('Error prestamos 17');

        
      $this->db->query("SELECT id_ejemplar 
                        FROM ejemplares_enprestamo
                        WHERE id_prestamo = '$dev' ");
      $ejemplares = $this->db->fetchAll();

        foreach($ejemplares as $e){
            $valor = $e['id_ejemplar'];
            $this->db->query("UPDATE ejemplares
                              SET estado_ejem = 'disponible'
                              WHERE id_ejemplar = $valor ");
        }
       
        $this->db->query("DELETE FROM ejemplares_enprestamo
                          WHERE id_prestamo = '$dev' ");
        
        $this->db->query("DELETE FROM prestamos
                          WHERE id_prestamo = '$dev' ");

    }

} 
