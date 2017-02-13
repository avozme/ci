<script>
    function enviar_ajax() {
        peticion_http = new XMLHttpRequest();
        peticion_http.onreadystatechange = procesa_respuesta;
        peticion_http.open('GET', 'http://localhost/ci/index.php/Ajax/insertar_asignatura', true);
        //query_string = "&asignatura=" + document.getElementsByName("asig")[0].value + "&curso=" + document.getElementsByName("curso")[0].value
        peticion_http.send(null);
    }

    function procesa_respuesta() {
        if (peticion_http.readyState == 4) {
            if (peticion_http.status == 200) {
                alert(peticion_http.responseText);
            }
        }
    }

</script>


<?php
if (isset($mensaje)) {
    echo "<p>$mensaje</p>";
}
if (isset($error)) {
    echo "<p style='color:red'>$error</p>";
}

$this->load->helper("form");

//echo form_open("Ajax/insertar_asignatura");
echo form_label("Asignatura");
echo form_input("asig");
echo form_label("Curso");
echo form_input("curso");
echo "<a href='#' onClick = 'enviar_ajax()'>Insertar</a>";
//echo form_submit("enviar", "Insertar");
//echo form_close();
?>

