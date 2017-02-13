<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_ajax extends CI_Model {
     
    
        public function check_email($email) {
            $this->load->database();
            $this->db->where("email", $email);
            $this->db->get("users");
            if ($this->db->affected_rows() > 0) {
                $ok = 1;
            }
            else {
                $ok = 0;
            }
            return $ok;
        }
        
        
        public function get_all_users() {
            $r = $this->db->get("users");
            $result = array();
            foreach ($r->result_array() as $row) {
                  $result[] = $row;
            }
            return $result;
            
        }
        
        public function get_foto($email){
              $this->db->where("email", $email);
              $r = $this->db->get("users");
              foreach ($r->result_array() as $row) {
                  $foto = $row["img"];
              }
              return $foto;
        }        

        
        public function get_all_libros() {
            $r = $this->db->get("libros");
            $result = array();
            foreach ($r->result_array() as $row) {
                  $result[] = $row;
            }
            return $result;
            
        }
        
        
        
}
