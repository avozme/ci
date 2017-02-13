<html>
  <head>
    <title>Prueba PHP + Ajax</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style type="text/css">
	#mensajeAjax { color:red; }
    </style>

    <script language="javascript">

	peticionHttp = new XMLHttpRequest();

	function comprobarEmail()
	{
		var queryString;
		var email;

		email = document.getElementById('email');
		queryString = '&email=' + encodeURIComponent(email.value);

		peticionHttp.onreadystatechange = muestraResultadoComprobacionEmail;
		peticionHttp.open('POST', '<?php echo site_url("ajax/check_email");?>', true);
		peticionHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		peticionHttp.send(queryString);
	}

	function muestraResultadoComprobacionEmail()
	{
		if(peticionHttp.readyState == 4) {
			if(peticionHttp.status == 200) {
				document.getElementById("mensajeAjax").innerHTML = peticionHttp.responseText;
			}
		}
	}

    </script>
  </head>
  <body>
	<?php echo form_open("ajax/login"); ?>
	<table align="center">
		<tr>
			<td colspan="2" bgcolor="#ccc"><h3 align="center">Formulario de alta con Ajax</h1></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" id="email" onBlur="comprobarEmail()"/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"/></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input type="submit" value="Aceptar"/><input type="reset" value="Cancelar"/></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><div id="mensajeAjax"></div></td>
		</tr>
	</table>
	</form>
  </body>
</html>