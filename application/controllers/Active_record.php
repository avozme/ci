<?php
    class Active_record extends CI_Controller
    {
         /** 
          * Constructor. Carga el modelo y la clase HTML table
          */
        public function __construct()
        {
            parent::__construct();
            $this->load->model("Model_active_record");
            $this->load->library("table");
            
        }
        
          /** 
          * Carga la vista por defecto con las diferentes opciones del ejercicio
          */
       public function index()
        {
            $this->load->view("view_active_record");
        }

         /** 
          * Lanza la consulta de la tabla libros y muestra el resultado
          */
        public function consulta_libros()
        {
            $data["view_name"] = "Mostrar todos los libros";
            $data["table_header"] = array("idLibro", "Titulo", "Editorial");
            $data["datos"] = $this->Model_active_record->get_all_libros();
            $this->load->view("view_active_record_results", $data);
        }
        
         /** 
          * Lanza la consulta de autores por país y muestra el resultado
          */
        public function consulta_autores($pais)
        {
            $data["view_name"] = "Mostrar autores del pais: $pais";
            $data["table_header"] = array("idAutor", "Nombre", "Apellidos", "Pais", "Fecha nacimiento");
            $data["datos"] = $this->Model_active_record->get_autores($pais);
            $this->load->view("view_active_record_results", $data);
        }
        
          /** 
          * lanza la consulta de libros por autor y muestra el resultado
          */
       public function consulta_libros_por_autor($nombre, $apellidos)
        {
           echo "NOMBRE = $nombre";
            $data["view_name"] = "Mostrar libros del autor: $nombre $apellidos";
            $data["table_header"] = array("Titulo", "Editorial");
            $data["datos"] = $this->Model_active_record->get_libros_por_autor($nombre, $apellidos);
            $this->load->view("view_active_record_results", $data);
        }
        
          /** 
          * Lanza la consulta de libros por editorial no escritos por un autor, y muestra el resultado
          */
      public function consulta_libros_por_editorial($editorial, $nombre, $apellidos)
        {
            $data["view_name"] = "Mostrar libros de la editorial $editorial que NO son del autor: $nombre $apellidos";
            $data["table_header"] = array("idLibro", "Titulo", "Editorial");
            $data["datos"] = $this->Model_active_record->get_libros_por_editorial($editorial, $nombre, $apellidos);
            $this->load->view("view_active_record_results", $data);
        }
        
          /** 
          * lanza la inserción de un libro en la BD y muestra el resultado
          */
       public function inserta_libro()
        {
            $result = $this->Model_active_record->inserta_libro($this->input->get_post('idLibro'), $this->input->get_post('titulo'), $this->input->get_post('editorial'), $this->input->get_post('idAutor'));
            $data["view_name"] = "Insertar nuevo libro";
            $data["table_header"] = array($result);
            $data["datos"] = array();
            $this->load->view("view_active_record_results", $data);
        }
        
    }