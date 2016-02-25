<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Postmeta_model extends CI_Model {

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    /**
     * Funcion: get_posts   
     * Descripcion: lista los Posts
     * @param --
     * @return $salida
     * @throws --
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-08
     * @since 2016-02-08
     */
    function get_postmetas($id_post) {

        // Include Modelos DB
        $this->load->model('tables/Postmeta_table');

        // Conexion
        $this->load->model('Conn_model');
        $link = $this->Conn_model->Conexion();

        // Consulta
        $ssql = "SELECT * FROM wp_postmeta where post_id = " . $id_post;

        // Ejecucion Consulta
        $result = mysqli_query($link, $ssql);

        // Arreglo Consulta
        $x = 0;
        $salida = array();
        while ($row = mysqli_fetch_assoc($result)) {

            // Creacion de Objeto
            $postmeta = new Postmeta_table();
            $postmeta = $this->toPostmeta($postmeta, $row);

            // Agregar al array de salida;
            $salida[$x] = $postmeta;
            $x++;
        }

        // Cerrar Conexion
        mysqli_close($link);

        // Retorno
        return $salida;
    }

    /**
     * Funcion: get_post   
     * Descripcion: Obtiene un post desde la BD
     * @param $id_post
     * @return $salida
     * @throws --
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    function get_postmeta($meta_id) {


        // Include Modelos DB
        $this->load->model('tables/Postmeta_table');

        // Conexion
        $this->load->model('Conn_model');
        $link = $this->Conn_model->Conexion();

        // Consulta
        $ssql = "SELECT * FROM wp_postmeta where meta_id = " . $meta_id;

        // Ejecucion Consulta
        $result = mysqli_query($link, $ssql);

        // Arreglo Consulta
        $row = mysqli_fetch_assoc($result);

        // Creacion de Objeto
        $postmeta = new Postmeta_table();
        $postmeta = $this->toPostmeta($postmeta, $row);

        // Cerrar Conexion
        mysqli_close($link);

        // Retorno
        return $postmeta;
    }

    /**
     * Funcion: toPosts   
     * Descripcion: Rellena el objeto del tipo desde la BD
     * @param Posts_table $post, $row
     * @return $option
     * @throws --
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    function toPostmeta(Postmeta_table $postmeta, $row) {

        try {
            $postmeta->setId(utf8_encode($row['meta_id']));
        } catch (Exception $ex) {
            
        }

        try {
            $postmeta->setPost_id(utf8_encode($row['post_id']));
        } catch (Exception $ex) {
            
        }

        try {
            $postmeta->setMeta_key(utf8_encode($row['meta_key']));
        } catch (Exception $ex) {
            
        }

        try {
            $postmeta->setMeta_value(utf8_encode($row['meta_value']));
        } catch (Exception $ex) {
            
        }

        return $postmeta;
    }

}
