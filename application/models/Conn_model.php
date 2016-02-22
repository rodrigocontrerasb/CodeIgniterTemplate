<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model: Conn 
 * Descripcion: Acceso a datos para conexion
 * Objetivo: Controlar la conexion a la BD
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-02-08
 * @since 2016-02-08
 */
class Conn_model extends CI_Model {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    /**
     * Funcion: Conexion   
     * Descripcion: Genera la conexion con el motor de datos MySQL
     * @return $link
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-08
     * @since 2016-02-08
     */
    function Conexion() {

        $link = mysqli_connect("localhost", "root", "zxcvbn", "wordpress");
        mysqli_select_db($link, 'wordpress');

        return $link;
    }

}
