<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller: Posts 
 * Descripcion: Controlador para la clase del tipo Posts
 * Objetivo: Disponibilizar los llamados de funciones en el controlador
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-02-24
 * @since 2016-02-24
 */
class Posts extends CI_Controller {

    /**
     * Funcion: index   
     * Descripcion: Genera el home del controlador
     * @param --
     * @return view
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    public function index() {
        $this->load->view('posts/index');
    }

    /**
     * Funcion: listarPosts   
     * Descripcion: Lista todos los posts
     * @param $id_tax
     * @return view $data
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    public function listarPosts($id_tax) {

        // Carga Modelos
        $this->load->model('Posts_model');
        $this->load->model('Postmeta_model');

        // Ejecucion funciones modelos
        $data['posts'] = $this->Posts_model->get_posts($id_tax);

        // Agregar Postmeta a Post
        for ($x = 0; $x < sizeof($data['posts']); $x++) {
            $id_post = $data['posts'][$x]->id;
            $data['posts'][$x]->meta = $this->Postmeta_model->get_postmetas($id_post);
        }

        // Vista
        $this->load->view('posts/listarposts', $data);
    }

    /**
     * Funcion: listarPost   
     * Descripcion: Lista un posts en particular
     * @param $id_post
     * @return view $data
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    public function listarPost($id_post) {

        // Carga Modelos
        $this->load->model('Posts_model');
        $this->load->model('Postmeta_model');

        // Ejecucion funciones modelos
        $data['posts'] = $this->Posts_model->get_post($id_post);
        $data['posts']->meta = $this->Postmeta_model->get_postmetas($id_post);

        // Vista
        $this->load->view('posts/listarposts', $data);
    }

}
