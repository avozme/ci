<html>
  <head>
    <title>Mi carro me lo robaron</title>
    <script language="javascript">
        function add_pais() {
            document.getElementById("pais_link").href = "<?php echo site_url("active_record/consulta_autores");?>" + "/" + document.getElementById("pais").value;
        }
        function add_nombre_apellidos() {
            document.getElementById("nombre_apellidos_link").href = "<?php echo site_url("active_record/consulta_libros_por_autor");?>" + "/" + document.getElementById("nombre").value + "/" + document.getElementById("apellidos").value;
        }
        function add_editorial() {
            document.getElementById("editorial_link").href = "<?php echo site_url("active_record/consulta_libros_por_editorial");?>" + "/" + document.getElementById("editorial").value + "/" + document.getElementById("nombre2").value + "/" + document.getElementById("apellidos2").value;
        }
    </script>
  </head>
  <body>
    <h3>Ejercicio de ActiveRecord</h3>
    <ul>
       <li>
           <a href="<?php echo site_url("active_record/consulta_libros");?>">
               Consultar libros</a>
       </li>
       <li>
               <a href="." onClick="add_pais()" id="pais_link"> 
               Consultar autores del pais</a>: 
               <input type="text" name="pais" id="pais"/>
       </li>
       <li>
           <a href="." onClick="add_nombre_apellidos()" id="nombre_apellidos_link">
               Consultar libros del autor</a>: 
               nombre:<input type="text" id="nombre"/> 
               apellidos:<input type="text" id="apellidos"/> 
       </li>
       <li>
           <a href="." onClick="add_editorial()" id="editorial_link">
               Consultar libros de la editorial</a>: 
               <input type="text" id="editorial"/> que no sean del autor: 
               nombre:<input type="text" id="nombre2"/> 
               apellidos:<input type="text" id="apellidos2"/> 
       </li>
       <li>
           <?php
               $this->load->helper("form");
               echo "Insertar libro:<br/>";
               echo form_open("active_record/inserta_libro");
               echo form_label("Id","idLibro").form_input("idLibro")."<br/>";
               echo form_label("Titulo", "titulo").form_input("titulo")."<br/>";
               echo form_label("Editorial", "editorial").form_input("editorial")."<br/>";
               echo form_label("Id-Autor", "idAutor").form_input("idAutor")."<br/>";
               echo form_submit("Guardar", "Guardar");
               echo form_close();
           ?>
       </li>
     </ul>
  </body>
</html>
