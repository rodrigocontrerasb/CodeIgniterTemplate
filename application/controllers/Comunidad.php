<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller: Comunidad 
 * Descripcion: Controlador para la clase del tipo Comunidad
 * Objetivo: Disponibilizar los llamados de funciones en el controlador
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-03-07
 * @since 2016-03-07
 */
class Comunidad extends CI_Controller {

    /**
     * Funcion: index   
     * Descripcion: Genera el home del controlador
     * @param --
     * @return view
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-03-07
     * @since 2016-03-07
     */
    public function index() {

        // Load Vista
        //$this->load->view('posts/index');
        // Redireccion a carpeta web
        header('Location: ./web');
    }

    /**
     * Funcion: listarPosts   
     * Descripcion: Lista todos los posts
     * @param --
     * @return view $data
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-03-07
     * @since 2016-03-07
     */
    public function listarComunidades() {

        // Carga Modelos
        $this->load->model('Comunidad_model');

        // Ejecucion funciones modelos
        $data['posts'] = $this->Comunidad_model->get_comunidades();

        // Vista
        $this->load->view('posts/listarposts', $data);
    }

    /**
     * Funcion: listarComunidad   
     * Descripcion: Lista una comunidad por suj id
     * @param $id_comunidad
     * @return view $data
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-03-07
     * @since 2016-03-07
     */
    public function listarComunidad($id_comunidad) {

        // Carga Modelos
        $this->load->model('Comunidad_model');

        // Ejecucion funciones modelos
        $data['posts'] = $this->Comunidad_model->get_comunidad();

        // Vista
        $this->load->view('posts/listarposts', $data);
    }

}
