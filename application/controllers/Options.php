<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller: Options 
 * Descripcion: Controlador para la clase del tipo Options
 * Objetivo: Disponibilizar los llamados de funciones en el controlador
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-02-24
 * @since 2016-02-24
 */
class Options extends CI_Controller {

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
     * Funcion: listarOptions   
     * Descripcion: Lista todas las options
     * @param --
     * @return view $data
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    public function listarOptions() {

        // Carga Modelos
        $this->load->model('Options_model');

        // Ejecucion funciones modelos
        $data['posts'] = $this->Options_model->get_options();

        // Vista
        $this->load->view('posts/listarposts', $data);
    }

    /**
     * Funcion: listarOption   
     * Descripcion: Lista una option en particular
     * @param $id_option
     * @return view $data
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-02-24
     * @since 2016-02-24
     */
    public function listarOption($id_option) {

        // Carga Modelos
        $this->load->model('Options_model');

        // Ejecucion funciones modelos
        $data['posts'] = $this->Options_model->get_option($id_option);

        // Vista
        $this->load->view('posts/listarposts', $data);
    }

}
