<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo: Posts
 * Descripcion: Representación en clase para tabla posts
 * Objetivo: Controlar las llamadas de asignacion y retorno de valores para objetos del tipo
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-02-24
 * @since 2016-02-24
 */
class Posts_table extends CI_Model {

    //Atributos de Tabla
    public $id = null;
    public $post_author = null;
    public $post_date = null;
    public $post_modified = null;
    public $post_title = null;
    public $post_content = null;
    public $post_name = null;
    public $gui = null;
    public $meta = null;

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

    function getPost_content() {
        return $this->post_content;
    }

    function getPost_date() {
        return $this->post_date;
    }

    function getPost_author() {
        return $this->post_author;
    }

    function getPost_modified() {
        return $this->post_modified;
    }

    function getPost_name() {
        return $this->post_name;
    }

    function getMeta() {
        return $this->meta;
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

    function setPost_content($post_content) {
        $this->post_content = $post_content;
    }

    function setPost_date($post_date) {
        $this->post_date = $post_date;
    }

    function setPost_author($post_author) {
        $this->post_author = $post_author;
    }

    function setPost_modified($post_modified) {
        $this->post_modified = $post_modified;
    }

    function setPost_name($post_name) {
        $this->post_name = $post_name;
    }

    function setMeta($meta) {
        $this->meta = $meta;
    }

}
