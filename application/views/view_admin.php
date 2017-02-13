<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>

<script type="text/javascript" language="javascript">
    $(document).ready( function () {
        $("#tabla_usuarios").click( function() {
		$("#titulo").html("Administración de usuarios");

                $.get("<?php echo site_url('ajax/tabla_usuarios'); ?>", null, function(tabla) {
                    $("#tabla_html").empty();
                    for (i = 0; i < tabla.length; i++) {
                        $("#tabla_html").append('<tr><td>' + tabla[i].id + "</td><td>" + tabla[i].username + "</td><td>" + tabla[i].email + "</td></tr>");
                    }
	         }, "json");
        });
	
	$("#tabla_libros").click( function() {
		$("#titulo").html("Administración de libros");
		$.get("<?php echo site_url('ajax/tabla_libros'); ?>", null, function(tabla) {
                    $("#tabla_html").empty();
                    for (i = 0; i < tabla.length; i++) {
                        $("#tabla_html").append('<tr><td>' + tabla[i].idLibro + "</td><td>" + tabla[i].titulo + "</td><td>" + tabla[i].editorial + "</td></tr>");
                    }
	         }, "json");
	});
     
    });
        
		
</script>

<h4 align="center">Práctica de PHP+Ajax - Carga de tablas completas con Ajax</h4>
<h1 align="center" id="titulo">Panel de administración</h1>
<h4 align="center"><a href="#"><span id="tabla_usuarios">Usuarios</span></a> :: <span id="tabla_libros" onclick="get_libros()">Libros</span></h4>
<p>&nbsp;</p>
<table border="1" align="center" id="tabla_html"> 
</table>

<?php
    echo "<p align='center'><a href='".site_url('users/show_add_user')."'>Nuevo</a></p>";
?>
