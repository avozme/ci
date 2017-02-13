<?php
    class Model_active_record extends CI_Model
    {
         /** 
          * Recupera todos los libros de la BD.
          * @return Un array PHP con la tabla de libros completa.
          */
        public function get_all_libros()
        {
            $query = $this->db->get("libros");
            $libros = $this->convertir_en_array($query);
            return $libros;
        }
            
         /** 
          * Recupera los nombres y apellidos de los autores de un país
          * @param pais String con el nombre del país.
          * @return Una tabla PHP con los nombres y apellidos de los autores.
          */
        public function get_autores($pais)
        {
            $this->db->where("pais", $pais);
            $query =$this->db->get("autores");
            $autores = $this->convertir_en_array($query);
            return $autores;
        }
    
         /** 
          * Recupera los títulos y editoriales de los libros escritos por un autor.
          * @param nombre Nombre del autor (string)
          * @param apellidos Apellidos del autor (string)
          * @return Una tabla PHP con los títulos y editoriales de los libros.
          */
        public function get_libros_por_autor($nombre, $apellidos)
        {
            $this->db->select('titulo, editorial');
            $this->db->from('libros');
            $this->db->join('libros_autores', 'libros.idLibro = libros_autores.idLibro');
            $this->db->join('autores', 'libros_autores.idAutor = autores.idAutor');
            $this->db->where("nombre", $nombre);
            $this->db->where("apellidos", $apellidos);
            $query = $this->db->get();
            $libros = $this->convertir_en_array($query);
            return $libros;
        }

         /** 
          * Recupera los libros de una editorial NO escritos por un autor
          * @param editorial Nombre de la editorial
          * @param nombre Nombre del autor
          * @param apellidos Apellidos del autor
          * @return Una tabla PHP con los libros que cumplen la condición.
          */
        public function get_libros_por_editorial($editorial, $nombre, $apellidos)
        {
            // Primero montamos la subconsulta
            $this->db->select('libros.idLibro');
            $this->db->from('libros');
            $this->db->join('libros_autores', 'libros.idLibro = libros_autores.idLibro');
            $this->db->join('autores', 'libros_autores.idAutor = autores.idAutor');
            $this->db->where("nombre", $nombre);
            $this->db->where("apellidos", $apellidos);
            $subquery = $this->db->get();
            // Convertimos el resultado de la subconsulta en un string con los valores separados por comas
            $subquery_string = $this->convertir_en_string($subquery);
            
            
            // Ahora montamos la consulta principal, usando el resultado de la subconsulta
            $this->db->where("editorial", $editorial);
            echo "Subquery = $subquery_string<br>";
            if ($subquery_string != "") {
                $this->db->where_not_in("idLibro", $subquery_string);
            }
            $query = $this->db->get("libros");
            
            $libros = $this->convertir_en_array($query);
            return $libros;
        }

         /** 
          * Inserta un libro en las tablas de libros y libros-autores
          * @param idLibro El ID del nuevo libro
          * @param titulo Titulo del nuevo libro
          * @param editorial Editorial del nuevo libro
          * @param idAutor El ID del autor del nuevo libro
          * @return Un string describiendo el resultado de la operación
          */
        public function inserta_libro($idLibro, $titulo, $editorial, $idAutor)
        {
            $dataLibro = array ('idLibro' => $idLibro, 'titulo' => $titulo, 'editorial' => $editorial);
            $dataAutor = array ('idLibro' => $idLibro, 'idAutor' => $idAutor);
            
            // Intentamos la inserción en la tabla libros
            $this->db->insert('libros', $dataLibro);
            $r1 = $this->db->affected_rows();
            if ($r1 == 1) {
                // Si todo ha ido bien, hacemos la inserción en la tabla libros-autores
                $this->db->insert('libros_autores', $dataAutor);
                $r2 = $this->db->affected_rows();
            }
            else {
                // Ha fallado la inserción en libros
                $r2 = 0;
            }
            if (($r1 != 1) || ($r2 != 1)) {
                // Ha ocurrido algún error al insertar en libros o en libros-autores
                $r = "Error al insertar el libro";
            }
            else {
                // No ha ocurrido ningún error en ninguna de las dos inserciones
                $r = "El libro ($idLibro, $titulo, $editorial, $idAutor) se ha insertado correctamente";
            }
            return $r;
        }
         
         /** 
          * Convierte un recordset en una tabla PHP
          * @param query El recordset de CI
          * @return Una tabla PHP con los datos del recordset
          */
        private function convertir_en_array($query)
        {
            $mi_array = array();
            foreach ($query->result_array() as $row)
            {
                $mi_array[] = $row;
            }
            return $mi_array;
        }

         /** 
          * Convierte un recordset de la tabla libros en un string con los ids separados por comas
          * @param query El recordset original de CI
          * @return Un string con los IDs de libros separados por comas
          */
        private function convertir_en_string($query)
        {
            $mi_array = array();
            foreach ($query->result_array() as $row)
            {
                $mi_array[] = $row["idLibro"];
            }
            $mi_string = implode(",", $mi_array);
            //$mi_string = $mi_array;
            return $mi_string;
            
        }
        
        
    }