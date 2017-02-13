<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style type="text/css">
	#mensajeAjax { color:red; }
    </style>

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>

    <script type="text/javascript" language="javascript">

            function comprobarEmail()
            {
                    email = $('#email').val();
                    $.get('<?php echo site_url("ajax/check_email/");?>' + encodeURIComponent(email),
                                           null,
                                           function(respuesta) {
                                               if (respuesta == 0) {
                                                   $("#mensajeId").html("Ese email está libre");
                                                }
                                                else {
                                                   $("#mensajeId").html("Ese email NO PUEDES USARLO porque ya está en uso");
                                                }
                                               
                                           });
            }

    </script>
  </head>
  <body>
	<?php echo form_open("ajax/login"); ?>
	<table align="center">
		<tr>
			<td colspan="2" bgcolor="#ccc"><h3 align="center">Prueba formulario de alta con Ajax + jQuery</h1></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" id="email" onChange="comprobarEmail()"/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"/></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" value="Aceptar"/><input type="button" value="Registro"/></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><div id="mensajeAjax"></div></td>
		</tr>
	</table>
	</form>
  </body>
</html>