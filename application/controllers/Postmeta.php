<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller: Postmeta 
 * Descripcion: Controlador para la clase del tipo Postmeta
 * Objetivo: Disponibilizar los llamados de funciones en el controlador
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-02-24
 * @since 2016-02-24
 */
class Postmeta extends CI_Controller {

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
     * Descripcion: Lista todos los postsmetas de un post
     * @param $id_post
     * @return view $data
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    public function listarPostmetas($id_post) {

        // Carga Modelos
        $this->load->model('Postmeta_model');

        // Ejecucion funciones modelos
        $data['posts'] = $this->Postmeta_model->get_postmetas($id_post);

        // Vista
        $this->load->view('posts/listarposts', $data);
    }

    /**
     * Funcion: listarPostmeta   
     * Descripcion: Lista la postsmeta de un meta
     * @param $id_meta
     * @return view $data
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    public function listarPostmeta($id_meta) {

        // Carga Modelos
        $this->load->model('Postmeta_model');

        // Ejecucion funciones modelos
        $data['posts'] = $this->Postmeta_model->get_postmeta($id_meta);

        // Vista
        $this->load->view('posts/listarposts', $data);
    }

}
