<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Residentes extends CI_Controller {

    public function index() {
        $this->load->view('residentes/index');
    }

    public function listarResidentes() {
        // Carga Modelos
        $this->load->model('Posts_model');

        // Ejecucion funciones modelos
        $data['posts'] = $this->Posts_model->get_posts();
        
        // Vista
        $this->load->view('residentes/listarresidentes', $data);
    }

}
