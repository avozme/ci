<!--<form action="index.php/Mi_controlador/procesar_nuevo_usuario">-->

<h1>Alta de usuario</h1>
<?php
if (isset($mensaje)) {
    echo "<p style='color:red'>$mensaje</p>";
}
echo form_open("Mi_controlador/procesar_nuevo_usuario");
echo "Email: ".form_input("email")."<br>";
echo "Password: ".form_input("pass")."<br>";
echo "Foto: ".form_input("foto")."<br>";
echo form_submit("enviar", "Insertar");
echo form_close();

?>