<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ajax extends CI_Controller {
    
        /** Carga la vista del formulario de alta (con Ajax clásico)
         */
        public function comprobar_email_clasico() {
            $this->load->view('view_ajax_clasico');
        }
        
        /** Carga la vista del formulario de alta (con Ajax y jQuery)
         */
        public function comprobar_email_jquery() {
            $this->load->view('view_ajax_jquery');
        }

        /** Recibe la petición de Ajax, con el email del usuario por POST.
         *  Devuelve un texto (email OK o email en uso)
         */
        public function check_email($email) {
            $this->load->model("model_ajax");
            $email = urldecode($email);
            $r = $this->model_ajax->check_email($email);
            $this->output->set_output($r);
        }

       /* -------------------------------------------------------------------------------------- */
       /* -------------------------------------------------------------------------------------- */
       /* -------------------------------------------------------------------------------------- */

        /** Muestra una lista de usuarios sin fotos de perfil, que se cargarán por Ajax
         */
        public function foto_perfil() {
            $this->load->model("model_ajax");
            $data["list_users"] = $this->model_ajax->get_all_users();
            $this->load->view('view_foto_perfil', $data);
        }

        /** Recibe la petición de Ajax. El email del usuario le llega por POST.
         *  Devuelve la URL donde está alojada la imagen de perfil del usuario.
         */
        public function get_foto_perfil() {
            $this->load->model("model_ajax");
            $foto = $this->model_ajax->get_foto($this->input->get_post("email"));
            $this->output->set_output(base_url("assets/imgs")."/".$foto);
        }

       /* -------------------------------------------------------------------------------------- */
       /* -------------------------------------------------------------------------------------- */
       /* -------------------------------------------------------------------------------------- */
        
       /** Muestra un panel de administración vacío, donde se cargarán después por Ajax
         *  las tablas maestras del sistema.
         */
        public function tabla() {
            $this->load->view("view_admin");
        }
        
        /** Recibe la petición de Ajax para devolver la tabla de usuarios completa.
         *  La devuelve codificada en JSON.
         */
        public function tabla_usuarios() {
            $this->load->model("model_ajax");
            $list_users = $this->model_ajax->get_all_users();
            $this->output->set_output(json_encode($list_users));
        }

        /** Recibe la petición de Ajax para devolver la tabla de libros completa.
         *  La devuelve codificada en JSON.
         */
        public function tabla_libros() {
            $this->load->model("model_ajax");
            $list_libros = $this->model_ajax->get_all_libros();
            $this->output->set_output(json_encode($list_libros));
        }

    
        
    
}
