<?php

//models/socios.php
require_once '../fw/ErrorException.php';

class socios extends Model {

    public function getTodos() {
        $this->db->query("SELECT * FROM socios");
        return $this->db->fetchAll();

    }
}
