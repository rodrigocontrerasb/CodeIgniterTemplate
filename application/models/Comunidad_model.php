<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comunidad_model extends CI_Model {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    /**
     * Funcion: get_comunidades   
     * Descripcion: lista las Comunidades
     * @param --
     * @return $salida
     * @throws --
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-08
     * @since 2016-02-08
     */
    function get_comunidades() {

        // Include Modelos DB
        $this->load->model('tables/Comunidad_table');

        // Conexion
        $this->load->model('Conn_model');
        $link = $this->Conn_model->ConexionComunidad();

        // Consulta
        $ssql = "select id, nombre from tb_comunidad";

        // Ejecucion Consulta
        $result = mysqli_query($link, $ssql);

        // Arreglo Consulta
        $x = 0;
        $salida = array();
        while ($row = mysqli_fetch_assoc($result)) {

            // Creacion de Objeto
            $comunidad = new Comunidad_table();
            $comunidad = $this->toComunidad($comunidad, $row);

            // Agregar al array de salida;
            $salida[$x] = $comunidad;

            $x++;
        }

        // Cerrar Conexion
        mysqli_close($link);

        // Retorno
        return $salida;
    }

    // ToComunidad
    function toComunidad(Comunidad_table $comunidad, $row) {

        try {

            if (isset($row['id'])) {
                $comunidad->setId(utf8_encode($row['id']));
            }
        } catch (Exception $ex) {
            
        }

        try {
            if (isset($row['nombre'])) {
                $comunidad->setNombre(utf8_encode($row['nombre']));
            }
        } catch (Exception $ex) {
            
        }

        try {
            if (isset($row['server'])) {
                $comunidad->setServer(utf8_encode($row['server']));
            }
        } catch (Exception $ex) {
            
        }

        try {
            if (isset($row['user'])) {
                $comunidad->setUser(utf8_encode($row['user']));
            }
        } catch (Exception $ex) {
            
        }

        try {
            if (isset($row['pass'])) {
                $comunidad->setPass(utf8_encode($row['pass']));
            }
        } catch (Exception $ex) {
            
        }
        try {
            if (isset($row['id_estado'])) {
                $comunidad->setId_estado(utf8_encode($row['id_estado']));
            }
        } catch (Exception $ex) {
            
        }

        try {
            if (isset($row['id_estado'])) {
                $comunidad->setDb(utf8_encode($row['db']));
            }
        } catch (Exception $ex) {
            
        }

        return $comunidad;
    }

}
