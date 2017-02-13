<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mi_controlador extends CI_Controller {
    public function index() {
        $this->load->view("hola_mundo");
    }
    public function otro_metodo() {
        $this->load->view("otra_vista");
    }
    public function formulario_nuevo_usuario() {
        $this->load->helper("form");
        $this->load->view("usuario/form_nuevo_usuario");
    }
    public function procesar_nuevo_usuario() {
        $email = $this->input->post("email");
        $pass = $this->input->post("pass");
        $foto = $this->input->post("foto");
        $this->load->Model("Usuario");
        $resultado = $this->Usuario->insertar($email, $pass, $foto);
        if ($resultado == 1) {
            $this->load->view("usuario/insertado_con_exito");
        }
        else {
            $data["mensaje"] = "Error al insertar el usuario";
            $this->load->view("usuario/form_nuevo_usuario", $data);
        }
        
        
    }
}
