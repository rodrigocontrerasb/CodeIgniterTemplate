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
     * Descripcion: Genera la conexion con el motor de datos MySQL (mysqli)
     * @return $link
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-08
     * @since 2016-02-08
     */
    function Conexion() {

        $link = mysqli_connect("localhost", "root", "", "wordpress");
        //$link = mysqli_connect("localhost", "root", "zxcvbn", "wordpress");
        mysqli_select_db($link, 'wordpress');
        return $link;
    }

    /**
     * Funcion: ConexionComunidad   
     * Descripcion: Genera la conexion con el motor de datos MySQL (mysqli)
     * @return $link
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-03-07
     * @since 2016-03-07
     */
    function ConexionComunidad() {
        $link = mysqli_connect("localhost", "root", "", "micomunidad");
        //$link = mysqli_connect("localhost", "root", "zxcvbn", "wordpress");
        mysqli_select_db($link, 'tb_comunidad');
        return $link;
    }

}
