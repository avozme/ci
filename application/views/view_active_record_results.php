<?php 
    echo "<h2>$view_name</h2>";
    $tmpl = array ('table_open' => '<table border="1">');
    $this->table->set_template($tmpl); 
    array_unshift($datos, $table_header);
    echo $this->table->generate($datos);
    echo "<a href=".site_url("active_record")."/>Volver</a>";
?>