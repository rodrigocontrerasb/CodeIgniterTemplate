<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo: Options
 * Descripcion: Representación en clase para tabla options
 * Objetivo: Controlar las llamadas de asignacion y retorno de valores para objetos del tipo
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-02-24
 * @since 2016-02-24
 */
class Options_table extends CI_Model {

    //Atributos de Tabla
    public $id = null;
    public $option_name = null;
    public $option_value = null;
    public $autoload = null;

    // Getters
    function getId() {
        return $this->id;
    }

    function getOption_name() {
        return $this->option_name;
    }

    function getOption_value() {
        return $this->option_value;
    }

    function getAutoload() {
        return $this->autoload;
    }

    // Setters
    function setId($id) {
        $this->id = $id;
    }

    function setOption_name($option_name) {
        $this->option_name = $option_name;
    }

    function setOption_value($option_value) {
        $this->option_value = $option_value;
    }

    function setAutoload($autoload) {
        $this->autoload = $autoload;
    }

}
