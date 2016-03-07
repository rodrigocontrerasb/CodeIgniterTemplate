<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Modelo: Comunidad
 * Descripcion: Representación en clase para tabla comunidad
 * Objetivo: Controlar las llamadas de asignacion y retorno de valores para objetos del tipo
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-03-07
 * @since 2016-03-07
 */
class Comunidad_table extends CI_Model {

    //Atributos de Tabla
    public $id = null;
    public $nombre = null;
    public $server = null;
    public $db = null;
    public $user = null;
    public $pass = null;
    public $id_estado = null;

    // Getters
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getServer() {
        return $this->server;
    }

    function getUser() {
        return $this->user;
    }

    function getPass() {
        return $this->pass;
    }

    function getId_estado() {
        return $this->id_estado;
    }
    
    function getDb() {
        return $this->db;
    }

        

    // Setters
    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setServer($server) {
        $this->server = $server;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }

    function setId_estado($id_estado) {
        $this->id_estado = $id_estado;
    }
    
    function setDb($db) {
        $this->db = $db;
    }



}
