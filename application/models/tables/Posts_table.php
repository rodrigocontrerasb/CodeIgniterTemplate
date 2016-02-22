<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_table extends CI_Model {

    //Atributos de Tabla
    public $id = null;
    public $post_title = null;
    public $gui = null;
    public $otro = null;

    // Getters
    function getId() {
        return $this->id;
    }

    function getPost_title() {
        return $this->post_title;
    }

    function getGui() {
        return $this->gui;
    }

    function getOtro() {
        return $this->otro;
    }

    // Setters
    function setId($id) {
        $this->id = $id;
    }

    function setPost_title($post_title) {
        $this->post_title = $post_title;
    }

    function setGui($gui) {
        $this->gui = $gui;
    }

    function setOtro($otro) {
        $this->otro = $otro;
    }

}
