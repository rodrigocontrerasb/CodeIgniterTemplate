<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model {

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
    function get_posts() {
        
        // Include Modelos DB
        $this->load->model('tables/Posts_table');
        
        // Conexion
        $this->load->model('Conn_model');
        $link = $this->Conn_model->Conexion();

        // Consulta
        $ssql = "select * from wp_posts where post_status = 'publish' and post_type = 'post' order by id desc";

        // Ejecucion Consulta
        $result = mysqli_query($link, $ssql);

        // Arreglo Consulta
        $x = 0;
        $salida = array();
        while ($row = mysqli_fetch_assoc($result)) {

            //$salida[$x]['id'] = utf8_encode($row['ID']);
            //$salida[$x]['post_title'] = utf8_encode($row['post_title']);
            //$salida[$x]['guid'] = utf8_encode($row['guid']);
            //$x++;
            
            // Creacion de Objeto
            $post = new Posts_table();
            $post = $this->toPosts($post, $row);
            
            // Agregar al array de salida;
            $salida[$x] = $post;
            $x++;
        }
        
        // Cerrar Conexion
        mysqli_close($link);

        // Retorno
        return $salida;
    }

    // Antiguos ----------------------------------------------------------------

    function existe_email($email) {
        $this->db->select('email_usuario');
        $this->db->where('email_usuario', $email);
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {
            return 1;
        }
        return 0;
    }

    function usuario_login($email) {
        $this->db->where('email_usuario', $email);
        //$this->db->where('clave', md5($clave));
        $query = $this->db->get('usuario');
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return 0;
    }

    function inserta_usuario($datos = array()) {
        if (!$this->_required(array("email_usuario", "clave"), $datos)) {
            return FALSE;
        }
        //clave, encripto
        $datos['clave'] = md5($datos['clave']);

        $this->db->insert('usuario', $datos);
        return $this->db->insert_id();
    }

    // Test
    function test() {

        $salida = 'Solo un test';

        return $salida;
    }

    // ToPosts
    function toPosts(Posts_table $post, $row) {

        try {
            $post->setId(utf8_encode($row['ID']));
        } catch (Exception $ex) {
            
        }

        try {
            $post->setPost_title(utf8_encode($row['post_title']));
        } catch (Exception $ex) {
            
        }

        try {
            $post->setGui(utf8_encode($row['guid']));
        } catch (Exception $ex) {
            
        }

        return $post;
    }

}
