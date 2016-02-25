<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Options_model extends CI_Model {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    /**
     * Funcion: get_options   
     * Descripcion: lista los Posts
     * @param --
     * @return $salida
     * @throws --
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-08
     * @since 2016-02-08
     */
    function get_options() {

        // Include Modelos DB
        $this->load->model('tables/Options_table');

        // Conexion
        $this->load->model('Conn_model');
        $link = $this->Conn_model->Conexion();

        // Consulta
        $ssql = "SELECT * FROM wp_options";

        // Ejecucion Consulta
        $result = mysqli_query($link, $ssql);

        // Arreglo Consulta
        $x = 0;
        $salida = array();
        while ($row = mysqli_fetch_assoc($result)) {

            // Creacion de Objeto
            $option = new Options_table();
            $option = $this->toOptions($option, $row);

            // Agregar al array de salida;
            $salida[$x] = $option;
            $x++;
        }

        // Cerrar Conexion
        mysqli_close($link);

        // Retorno
        return $salida;
    }

    /**
     * Funcion: get_option   
     * Descripcion: Obtiene un option desde la BD
     * @param $id_option
     * @return $salida
     * @throws --
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    function get_option($id_option) {


        // Include Modelos DB
        $this->load->model('tables/Options_table');

        // Conexion
        $this->load->model('Conn_model');
        $link = $this->Conn_model->Conexion();

        // Consulta
        $ssql = "SELECT * FROM wp_options where option_id = " . $id_option;

        // Ejecucion Consulta
        $result = mysqli_query($link, $ssql);

        // Arreglo Consulta
        $row = mysqli_fetch_assoc($result);

        // Creacion de Objeto
        $option = new Options_table();
        $option = $this->toOptions($option, $row);

        // Cerrar Conexion
        mysqli_close($link);

        // Retorno
        return $option;
    }

    /**
     * Funcion: toOptions   
     * Descripcion: Rellena el objeto del tipo desde la BD
     * @param Options_table $option, $row
     * @return $option
     * @throws --
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    function toOptions(Options_table $option, $row) {

        try {
            $option->setId(utf8_encode($row['option_id']));
        } catch (Exception $ex) {
            
        }

        try {
            $option->setOption_name(utf8_encode($row['option_name']));
        } catch (Exception $ex) {
            
        }

        try {
            //$option->setOption_value(utf8_encode($row['option_value']));
            $option->setOption_value(html_escape($row['option_value']));
        } catch (Exception $ex) {
            
        }

        try {
            $option->setAutoload(utf8_encode($row['autoload']));
        } catch (Exception $ex) {
            
        }

        return $option;
    }

}
