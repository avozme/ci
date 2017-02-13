<style>
    .msg { color: green; text-align: center; }
    .error { color: red; text-align: center; }
</style>

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>

    <script type="text/javascript" language="javascript">

    function get_foto_perfil(email)
	{
            $.get('<?php echo site_url("ajax/get_foto_perfil");?>', {email: email }, 
                              function(ruta) { 
                                  $("#foto").attr("src",ruta); 
                              }
                          );
	}

    </script>

<h4 align="center">Cargando fotos de perfil con Ajax</h4>
<h1 align="center">Administración de usuarios</h1>
<?php
    // Si el controlador nos envía algún mensaje, lo mostramos
    if (isset($result))
         echo "<table align='center' ><tr><td><p class='msg'>$result</p></td></tr></table>";
?>
<p>&nbsp;</p>


<table border="1" align="center"> 
    <tr bgcolor="#bbb">
        <td>Username</td><td>Email</td><td>Teléfono</td><td colspan="2" align="center">Acciones</td>
    </tr>
    <tr>
 <?php
      echo "\n";
      foreach ($list_users as $user) {
          echo "<tr>";
          echo "<td onmouseover=\"get_foto_perfil('".$user['email']."')\" >".$user['username']."</td><td>".$user['email']."</td><td>".$user['telef']."</td>";
          echo "<td><a href='users/update_user/".$user['id']."'>Modificar</a></td>";
          echo "<td><a href='users/delete_user/".$user['id']."'>Eliminar</a></td>";
          echo "</tr>";
      }
      
 ?>
    </tr>
</table>
<p align="center"><img id="foto" align="center" src="http://[::1]/ci/assets/imgs/foto4.jpg"/></p>

<?php
    echo "<p align='center'><a href='".site_url('users/show_add_user')."'>Nuevo</a></p>";
?>