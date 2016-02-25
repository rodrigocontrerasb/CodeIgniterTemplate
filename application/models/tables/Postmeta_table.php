<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo: Postmeta
 * Descripcion: Representación en clase para tabla postmeta
 * Objetivo: Controlar las llamadas de asignacion y retorno de valores para objetos del tipo
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-02-24
 * @since 2016-02-24
 */
class Postmeta_table extends CI_Model {

    //Atributos de Tabla
    public $id = null;
    public $post_id = null;
    public $meta_key = null;
    public $meta_value = null;

    // Getters
    function getId() {
        return $this->id;
    }

    function getPost_id() {
        return $this->post_id;
    }

    function getMeta_key() {
        return $this->meta_key;
    }

    function getMeta_value() {
        return $this->meta_value;
    }

    // Setters
    function setId($id) {
        $this->id = $id;
    }

    function setPost_id($post_id) {
        $this->post_id = $post_id;
    }

    function setMeta_key($meta_key) {
        $this->meta_key = $meta_key;
    }

    function setMeta_value($meta_value) {
        $this->meta_value = $meta_value;
    }

}
