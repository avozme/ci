<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    class Usuario extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function insertar($email, $pass, $foto) {
            $data = array('email' => $email, 'pass' => $pass, 'foto' => foto);
            $this->db->insert('usuarios', $data);             
            return $this->db->affected_rows();
        }
        
        public function borrar($email) {
        }
    }
